<?php
// Загрузка рисунка фона
$im = imageCreateFromjpeg("images/image1.jpg");
if ($im === false) {
    echo "Ошибка загрузки изображения";
    exit;
}

// Создание в палитре нового цвета — черного.
$string = "Unsplash.com";
$textcolor = imageColorallocate($im, 235, 46, 150);
$font = dirname(__FILE__) . '/Roboto-Bold.ttf';
$size = 50;

// Вычисление x для расположения текста по ширине
$offset = strlen($string) / 2 * $size;
$x = (imagesx($im) - strlen($string)) / 2 - $offset;
$y = 500;

// Вывод строки поверх загруженного изображения.
imagettftext($im, $size, 0, $x, $y, $textcolor, $font, $string);

// Вывод картинки в стандартный выходной поток - в браузер
header("Content-type: image/jpg");
imagejpeg($im);

// Освобождение памяти, занятой картинкой
imageDestroy($im);

// Создание новой папки для результатов
$new_path = "new_images/";
if (!is_dir($new_path)) {
    mkdir($new_path, 0755, true);
}

$new_image_path = $new_path . $image_file;