<?php
function square_root($n)
{
    return (sqrt($n));
}

$a = [4, 49, 900, 169, 196];

$b = array_map('square_root', $a);
foreach ($b as $key => $value) {
    echo $value . "\n";
}