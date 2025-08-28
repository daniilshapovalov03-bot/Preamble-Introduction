<?php

require_once __DIR__ . '/../../part1_basic.php';
require_once __DIR__ . '/../../part2_oop.php';


test('calculateTotalPrice function calculates the correct sum', function () {

    $testProducts = [
        ['name' => 'Ноутбук', 'price' => 1200, 'category' => 'Электроника', 'quantity' => 10],
        ['name' => 'Клавиатура', 'price' => 80, 'category' => 'Электроника', 'quantity' => 50],
        ['name' => 'Книга "Чистый код"', 'price' => 25, 'category' => 'Книги', 'quantity' => 30],
        ['name' => 'Кофе', 'price' => 15, 'category' => 'Продукты', 'quantity' => 0],
        ['name' => 'Мышь', 'price' => 40, 'category' => 'Электроника', 'quantity' => 5],
    ];

    $total = calculateTotalPrice($testProducts);
    expect($total)->toBe(16950.0);
});

test('filterProductsByCategory function filters correctly', function () {

    $testProducts = [
        ['name' => 'Ноутбук', 'price' => 1200, 'category' => 'Электроника', 'quantity' => 10],
        ['name' => 'Клавиатура', 'price' => 80, 'category' => 'Электроника', 'quantity' => 50],
        ['name' => 'Книга "Чистый код"', 'price' => 25, 'category' => 'Книги', 'quantity' => 30],
    ];

    $electronics = filterProductsByCategory($testProducts, 'Электроника');
    expect($electronics)->toHaveCount(2);
    expect($electronics[0]['name'])->toBe('Ноутбук');
});

test('isAvailable method on Product class works correctly', function () {
    $notebook = new Product('Ноутбук', 1200, 'Электроника', 10);
    $coffee = new Product('Кофе', 15, 'Продукты', 0);
    expect($notebook->isAvailable())->toBeTrue();
    expect($coffee->isAvailable())->toBeFalse();
});
