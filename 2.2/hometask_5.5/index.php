<?php
$m = 3;
$n = 4;
$a = [];

function func($num) {
    if($num >= 0) {
        return true;
    } else {
        return false;
    }
}

for ($k = 0; $k < $m; $k++) {
    for ($x = 0; $x < $n; $x++) {
        $a[$k][$x] = floatval(rand(-9, 9)); // Заполняем массив $a случайными значениями
    }
}

$positive = array_filter(array_merge(...$a), 'func');
$sum = array_sum($positive);

print_r($a);
echo $sum;
