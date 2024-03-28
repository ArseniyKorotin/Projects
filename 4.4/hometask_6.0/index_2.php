<?php
// Загрузка рисунка фона
$im = imageCreateFromPng("images/image4.png");
// Создание в палитре нового цвета — черного.
$string = "Unsplash.com";
$textcolor = imageColorAllocate($im, 0, 0, 0) ;
$size = 5;
$offset = strlen($string) / 2 * $size;
// Вычисление x для расположения текста по ширине
$x = (imageSX($im) - strlen($string)) / 2 - $offset;
$y = 500;
// Вывод строки поверх загруженного изображения.
// imageString($im, $size, $x, $y, $string, $textcolor);
imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);

// Вывод картинки в стандартный выходной поток - в браузер
header("Content-type: image/png");
imagePng($im); // освобождение памяти, занятой картинкой 
imageDestroy($im);