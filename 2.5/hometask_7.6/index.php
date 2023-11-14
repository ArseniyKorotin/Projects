<?php

function createDashes($carry, $item)
{
    return $carry === '' ? $item : $carry . "-" . $item;
}

$arr = [2, 4, 6, 8, 35, 9];
$result = array_reduce($arr, "createDashes", '');
echo $result;
