<?php
// Загрузка рисунка фона
$im = imageCreateFromjpeg("images/image2.jpg");
// Создание в палитре нового цвета — черного.
$string = "Unsplash.com";
$textcolor = imageColorAllocate($im, 0, 0, 0);
$font = dirname(__FILE__) . '/Roboto-Bold.ttf'; // Добавлен слэш перед именем файла шрифта и исправлено объявление пути к файлу шрифта
$size = 50; // Увеличил размер шрифта для лучшей видимости
$offset = strlen($string) / 2 * $size;
// Вычисление x для расположения текста по ширине
$x = (imageSX($im) - strlen($string)) / 2 - $offset;
$y = 500;
// Вывод строки поверх загруженного изображения.
// imagettftext($im, $size, 0, $x, $y, $textcolor, $font, $string); // Ошибка в параметрах
imagettftext($im, $size, 0, $x, $y, $textcolor, $font, $string); // Параметры были исправлены
// Вывод картинки в стандартный выходной поток - в браузер
header("Content-type: image/jpg");
image($im); // освобождение памяти, занятой картинкой 
imageDestroy($im);