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
    if(!is_array($words[$value])) {
        $result[] = array_flip($words[$value]);
    }
    // else {
    //     foreach ($value as $v => $val) {
            
    //     }
    // }
}

print_r($result);