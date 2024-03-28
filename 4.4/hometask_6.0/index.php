<?php
$image_folder = "images/";
$image_files = scandir($image_folder);

// Перебор каждого файла изображения
foreach ($image_files as $image_file) {
    // Полный путь к файлу изображения
    $full_image_path = $image_folder . $image_file;

    // Проверка, является ли файл изображением
    if (is_file($full_image_path) && exif_imagetype($full_image_path) !== false) {
        // Загрузка рисунка фона
        $im = imageCreateFromString(file_get_contents($full_image_path));
        
        // Проверка, удалось ли создать изображение
        if ($im !== false) {
            $string = "Unsplash.com";
            $textcolor = imageColorAllocate($im, 0, 0, 0);
            $font = dirname(__FILE__) . './roboto/Roboto-Regular.ttf';
            $size = 20;
            // Вычисление ширины и высоты изображения
            $image_width = imagesx($im);
            $image_height = imagesy($im);
            // Вычисление размеров текста
            $text_box = imagettfbbox($size, 0, $font, $string);
            $text_width = $text_box[2] - $text_box[0];
            $text_height = $text_box[1] - $text_box[7];
            // Вычисление координат для размещения текста в правом нижнем углу
            $x = $image_width - $text_width - 10; // Отступ справа
            $y = $image_height - 10; // Отступ снизу
            // Вывод строки поверх загруженного изображения.
            imagettftext($im, $size, 0, $x, $y, $textcolor, $font, $string);
            // Сохранение изменённого изображения
            imagepng($im, $full_image_path);
            // Освобождение памяти, занятой картинкой
            imagedestroy($im);
        } else {
            echo "Не удалось загрузить изображение: $image_file <br>";
        }
    }
}
?>
