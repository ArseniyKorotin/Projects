<?php

function sum($carry, $item)
{
    return $carry += $item;
}

$array = [6, -7, -8, 9, -10, 11, 12];

echo "Сума всіх елементів массива:\n";
print_r(array_reduce($array, "sum"));
