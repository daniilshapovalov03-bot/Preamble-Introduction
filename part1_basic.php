<?php

error_reporting(-1);

$products = [
    ['name' => 'Ноутбук', 'price' => 1200, 'category' => 'Электроника', 'quantity' => 10],
    ['name' => 'Клавиатура', 'price' => 80, 'category' => 'Электроника', 'quantity' => 50],
    ['name' => 'Книга "Чистый код"', 'price' => 25, 'category' => 'Книги', 'quantity' => 30],
    ['name' => 'Кофе', 'price' => 15, 'category' => 'Продукты', 'quantity' => 0],
    ['name' => 'Мышь', 'price' => 40, 'category' => 'Электроника', 'quantity' => 5],
];

function calculateTotalPrice(array $items): float {
    $totalPrice = 0.0;
    foreach ($items as $item) {
        if (isset($item['price']) && isset($item['quantity'])) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
    }
    return $totalPrice;
}

function filterProductsByCategory(array $items, string $category): array {
    $filteredItems = [];
    foreach ($items as $item) {
        if ($item['category'] == $category) {
            $filteredItems[] = $item;
        }
    }
    return $filteredItems;
}

echo "--- Результаты ---\n\n";

$totalStockValue = calculateTotalPrice($products);
echo "1. Общая стоимость всех товаров на складе: " . $totalStockValue . " у.е.\n\n";

$categoryToFilter = 'Электроника';
$electronics = filterProductsByCategory($products, $categoryToFilter);

echo "2. Список названий товаров из категории '" . $categoryToFilter . "':\n";

foreach ($electronics as $product) {
    echo "- " . $product['name'] . "\n";
}
