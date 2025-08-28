<?php

error_reporting(-1);

class Product {
    public string $name;
    public float $price;
    public string $category;
    public int $quantity;

    public function __construct(string $name,float $price,string $category, int $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->quantity = $quantity;
    }
    public function isAvailable(): bool {
        return $this->quantity > 0;
    }
}

$products = [
        new Product('Ноутбук', 1200, 'Электроника', 10),
        new Product('Клавиатура', 80, 'Электроника', 50),
        new Product('Книга "Чистый код"', 25, 'Книги', 30),
        new Product('Кофе', 15, 'Продукты', 0),
        new Product('Мышь', 40, 'Электроника', 5),
    ];

function getProductInfo(Product $product): string {
    $availability = $product->isAvailable() ? 'Да' : 'Нет';

    return "{$product->name} ({$product->category}) - Цена: {$product->price}. В наличии: {$availability}";
}

echo "--- Информация о всех товарах ---\n";

foreach ($products as $product) {
    echo getProductInfo($product) . "\n";
}

