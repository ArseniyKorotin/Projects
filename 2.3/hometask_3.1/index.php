<?php

$str = "[   34  555   8 9 9  ]";

$strs = preg_replace("/\s+/", " ", $str);

print_r($strs);