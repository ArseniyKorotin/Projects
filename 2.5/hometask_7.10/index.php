<?php
require 'strings_functions.php';

$str = "PHP — C-подобный скриптовый язык общего назначения, интенсивно применяемый для разработки веб-приложений.";

$reversedStr = reverseWords($str);
echo "Строка с измененным порядком букв: $reversedStr <br>\n";

$removedWordsStr = removeOddWords($str);
echo "Строка с удаленными словами через одно: $removedWordsStr";
