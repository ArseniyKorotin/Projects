<?php

$text = "The quick brown fox jumped over the lazy dog.";
$newtext = " > ".wordwrap($text, 20, "\n > ");
echo $newtext;