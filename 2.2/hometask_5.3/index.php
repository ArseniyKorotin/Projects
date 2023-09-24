<?php

$a = ["Nicole" => 1982, "Martha" => 1936, "Ujin" => 1985];

ksort($a);
print_r($a);
echo "<br>";

sort($a);
print_r($a);
echo "<br>";

asort($a);
print_r($a);