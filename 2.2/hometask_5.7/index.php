<?php

$words = [
    'Apple' => 'Яблуко',
    'Book' => ['Книга', 'Замовити'],
    'Peach' => 'Персик',
    'Potato' => 'Картопля',
    'Table' => ['Стіл', 'Таблиця'],
    'World' => 'Світ'
];

echo "Eng-Ukr Dictionary\n\n";
foreach ($words as $key => $value) {
    if (!is_array($value)) {
        echo "$value: $key\n";
    } else {
        $count = count($value);
        foreach ($value as $i => $v) {
            echo $v;
            if ($i < $count -1) {
                echo ", ";
            } else {
                echo ": ";
            }
        }
        echo "$key \n";

    }
    echo "\n";
}
echo "\n\n";
