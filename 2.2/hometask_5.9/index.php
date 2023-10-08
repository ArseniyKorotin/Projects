<?php

$films = [
    'The Lord of the Rings' => [
        'Tolkien',
        1950,
    ],
    'Game of Thrones' => [
        'Martin',
        2011,
    ],
    'Star Wars' => [
        'Lucas',
        1977,
    ],
];

function sortByNames($a, $b)
{
    if ($a == $b) {
        return 0;
    }

    return ($a < $b) ? -1 : 1;
}

function sortByYear($a, $b)
{
    return $a[1] - $b[1];
}

function sortVariants($k)
{
    global $films;

    if ($k == 1) {
        ksort($films); // Сортируем массив по ключам
        print_r($films);
    } elseif ($k == 2) {
        uasort($films, "sortByNames"); // Сортируем массив по значениям
        print_r($films);
    } else {
        usort($films, "sortByYear"); // Сортируем массив по годам
        print_r($films);
    }
}

sortVariants(1);
