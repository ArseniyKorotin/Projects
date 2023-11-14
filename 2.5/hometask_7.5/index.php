<?php

function sum($carry, $item)
{
    $carry *= $item;
    return $carry;
}

$array = [6, -7, -8, 9, 6, 4, 12];

echo "Сума всіх елементів массива: \n";
print_r(array_reduce($array, "sum", 1));
