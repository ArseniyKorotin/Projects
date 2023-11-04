<?php
$str = "The quick $ green fox $ jumped over $ the lazy dog";

$st = preg_replace('/(\$ \w+)/', '<b>\1</b>', $str);

echo $st;