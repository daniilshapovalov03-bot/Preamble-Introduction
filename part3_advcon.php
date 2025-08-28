<?php

error_reporting(-1);

class Product {

    public function __construct(
        public string $name,
        public float $price,
        public string $category,
        public int $quantity
    ) {}

    public function isAvailable(): bool {
        return $this->quantity > 0;
    }
}

function getCategoryDiscount(Product $product): int {
    return match ($product->category) {
        'Электроника' => 10,
        'Книги' => 20,
        default => 0,
    };
}

$products = [
    new Product('Ноутбук', 1200, 'Электроника', 10),
    new Product('Клавиатура', 80, 'Электроника', 50),
    new Product('Книга "Чистый код"', 25, 'Книги', 30),
];

function applyDiscount(array &$items, float $discountPercentage): void {
    foreach ($items as $item) {
        $discountValue = $item->price * ($discountPercentage / 100);
        $item->price -= $discountValue;
    }
}

echo "--- Задача 1: Применение скидки ---\n";
echo "Исходные цены:\n";
foreach ($products as $product) {
    echo "- {$product->name}: {$product->price} у.е.\n";
}

applyDiscount($products, 20);

echo "\nЦены после применения скидки 20%:\n";
foreach ($products as $product) {
    echo "- {$product->name}: {$product->price} у.е.\n";
}
echo "\n" . str_repeat('-', 40) . "\n\n";

$productsPart1 = [
    ['name' => 'Ноутбук', 'price' => 1200, 'category' => 'Электроника', 'quantity' => 10],
    ['name' => 'Клавиатура', 'price' => 80, 'category' => 'Электроника', 'quantity' => 50],
    ['name' => 'Книга "Чистый код"', 'price' => 25, 'category' => 'Книги', 'quantity' => 30],
];

echo "--- Задача 2: Функциональный подход ---\n";

$totalPrice = array_reduce(
    $productsPart1,
    fn($sum, $item) => $sum + $item['price'] * $item['quantity'],
    0
);
echo "1. Общая стоимость (array_reduce): " . $totalPrice . " у.е.\n\n";

$electronics = array_filter(
    $productsPart1,
    fn($item) => $item['category'] === 'Электроника'
);

$electronicNames = array_map(
    fn($item) => $item['name'],
    $electronics
);

echo "2. Список названий товаров из категории 'Электроника':\n";
foreach ($electronicNames as $name) {
    echo "- " . $name . "\n";
}

