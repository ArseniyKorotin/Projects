<?php
$words1 = [
    'apricot' => 'Абрикос',
    'banana' => 'Банан',
    'book' =>  'Книга',
    'plum' => 'Слива',
    'table' => 'Стіл'
];

$words2 = [
    'book' =>  'Замовити',
    'pepper' => 'Перець',
    'table' => 'Таблиця'
];

$result = [];

foreach ($words1 as $key => $value) {
    if (isset($words2[$key])) {
        $result[$key] = $words2[$key];
        unset($words2[$key]);
    }
}

$dictionary = $words1 + $words2;

print_r($dictionary);

print_r($result);