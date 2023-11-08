<?php

$r1 = '/\b\w+(?=:)/';
$r2 = '/\b(?<!\$)\w+\b/';

$str = '$Work $hard: Dream big:';
if (preg_match_all($r1, $str, $arr)) {
    echo "Words that are not followed by colon in the text: ";
    foreach ($arr[0] as $k) {
        echo $k . "; ";
    }
    echo "\t\n";
}

if (preg_match_all($r2, $str, $arr)) {
    echo "Words that are not followed by $ in the text: ";
    foreach ($arr[0] as $k) {
        echo $k . "; ";
    }
    echo "\t";
}
