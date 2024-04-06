<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем выбранный тип диаграммы
    $chart_type = $_POST['chart_type'];

    // Массив с данными для диаграммы (пример данных)
    $students = [
        [
            "name" => "Joan",
            "surname" => "Joanson",
            "year" => 2005,
            "marks" => [
                "PHP" => 6,
                "JS" => 4,
                "HTML" => 2,
            ],
        ],
        [
            "name" => "Jack",
            "surname" => "Smith",
            "year" => 2003,
            "marks" => [
                "PHP" => 1,
                "JS" => 8,
                "HTML" => 4,
            ],
        ],
        [
            "name" => "Martin",
            "surname" => "Miller",
            "year" => 2004,
            "marks" => [
                "PHP" => 5,
                "JS" => 2,
                "HTML" => 8,
            ],
        ],
        [
            "name" => "Peater",
            "surname" => "Smith",
            "year" => 2003,
            "marks" => [
                "PHP" => 2,
                "JS" => 6,
                "HTML" => 2,
            ],
        ],
        [
            "name" => "Steve",
            "surname" => "Joanson",
            "year" => 2004,
            "marks" => [
                "PHP" => 4,
                "JS" => 7,
                "HTML" => 3,
            ],
        ],
    ];

    if ($chart_type === "bar") {
        $average = [];
        foreach ($students as $student) {
            $marks = array_sum($student['marks']);
            $marks_count = count($student['marks']);
            $average_mark = $marks / $marks_count;
            $average[] = $average_mark;
        }
        // Количество столбцов диаграммы:
        $columns = count($average);
        // Задаем щирину и высоту всего изображения
        $width = 300;
        $height = 200;
        // Задаем пространство между колонками:
        $padding = 2;
        // Получаем ширину одной колонки:
        $column_width = $width / $columns;
        // Создаем переменные
        $im = imagecreate($width, $height);
        $gray = imagecolorallocate($im, 204, 204, 204);
        $gray_lite = imagecolorallocate($im, 238, 238, 238);
        $gray_dark = imagecolorallocate($im, 127, 127, 127);
        $white = imagecolorallocate($im, 255, 255, 255);

        // Заполняем фон картинки
        imagefilledrectangle($im, 0, 0, $width, $height, $white);
        $maxv = 0;
        // Вычисляем максимум
        for ($i = 0; $i < $columns; $i++) {
            $maxv = max($average[$i], $maxv);
        }

        // Рисуем каждую колонку
        for ($i = 0; $i < $columns; $i++) {
            $column_height = ($height / 100) * (($average[$i] / $maxv) * 100);
            $x1 = $i * $column_width;
            $y1 = $height - $column_height;
            $x2 = (($i + 1) * $column_width) - $padding;
            $y2 = $height;
            imagefilledrectangle($im, $x1, $y1, $x2, $y2, $gray);
            //для 3D эффекта
            imageline($im, $x1, $y1, $x1, $y2, $gray_lite);
            imageline($im, $x1, $y2, $x2, $y2, $gray_lite);
            imageline($im, $x2, $y1, $x2, $y2, $gray_dark);
        }
        // Посылаем информацию заголовку, можно заменить на JPEG или GIF
        header("Content-type: image/png");
        imagepng($im);
    } elseif ($chart_type === "pie") {
        // Создаем диаграмму-пирог
        $image = imagecreatetruecolor(200, 200);
        $white = imagecolorallocate($image, 255, 255, 255);
        imagefilledrectangle($image, 0, 0, 200, 200, $white);

        // Определяем цвета для каждого предмета
        $colors = [
            "PHP" => imagecolorallocate($image, 255, 0, 0), // Красный для PHP
            "JS" => imagecolorallocate($image, 0, 255, 0), // Зеленый для JS
            "HTML" => imagecolorallocate($image, 0, 0, 255), // Синий для HTML
        ];

        // Считаем суммарные баллы по каждому предмету
        $subject_totals = array_fill_keys(array_keys($colors), 0);
        foreach ($students as $student) {
            foreach ($student['marks'] as $subject => $mark) {
                $subject_totals[$subject] += $mark;
            }
        }

        // Рисуем секции пирога
        $start_angle = 0;
        foreach ($subject_totals as $subject => $total) {
            $percentage = ($total / array_sum($subject_totals)) * 360;
            imagefilledarc($image, 100, 100, 200, 200, $start_angle, $start_angle + $percentage, $colors[$subject], IMG_ARC_PIE);
            $start_angle += $percentage;
        }

        // Отправляем изображение пользователю
        header("Content-type: image/png");
        imagepng($image);
        imagedestroy($image);
    }

}
