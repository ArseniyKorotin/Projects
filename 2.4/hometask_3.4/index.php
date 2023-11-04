<?php

$str = "blue berries grows in blue garden garden";

$strings = preg_split("/[\s,]+/", $str);

$keys = array_unique($strings); 
print_r($keys);