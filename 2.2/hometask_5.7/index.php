<?php

$words = [
    'Apple' => 'Яблуко',
    'Book' => ['Книга', 'Замовити'],
    'Peach' => 'Персик',
    'Potato' => 'Картопля',
    'Table' => ['Стіл', 'Таблиця'],
    'World' => 'Світ'
];

$result = [];

foreach ($words as $key => $value) {
    if (is_array($value)) {
        $result[implode(', ', $value)] = $key;
        unset($words[$key]);
    }
}

$w = array_flip($words) + $result;
ksort($w);
print_r($w);
