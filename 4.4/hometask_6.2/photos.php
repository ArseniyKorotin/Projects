<?php
header('Content-Type: text/html; charset=utf-8');

$imgDir = "img"; // каталог для хранения изображений

// Проверяем, нажата ли кнопка добавления фотографии
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['doUpload'])) {
    if (!is_dir($imgDir)) {
        mkdir($imgDir, 0777, true); // создаем каталог, если его еще нет
    }

    $data = $_FILES['file'];

    // Проверяем, принят ли файл
    if ($data['error'] === UPLOAD_ERR_OK) {
        $tmp = $data['tmp_name'];
        $info = getimagesize($tmp);

        // Проверяем, является ли файл изображением
        if ($info !== false) {
            $extension = pathinfo($data['name'], PATHINFO_EXTENSION);
            $name = "$imgDir/" . time() . ".$extension";

            // Добавляем файл в каталог с фотографиями
            if (move_uploaded_file($tmp, $name)) {
                echo "<h2>Фотография успешно загружена!</h2>";
            } else {
                echo "<h2>Ошибка при перемещении файла!</h2>";
            }
        } else {
            echo "<h2>Попытка добавить файл недопустимого формата!</h2>";
        }
    } else {
        echo "<h2>Ошибка при загрузке файла: #{$data['error']}!</h2>";
    }
}

// Проверяем, нажата ли кнопка удаления фотографии
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $photo_to_delete = $_POST['url'];

    // Проверяем существование файла перед удалением
    if (file_exists($photo_to_delete)) {
        if (unlink($photo_to_delete)) {
            echo "<h2>Файл успешно удален!</h2>";
        } else {
            echo "<h2>Невозможно удалить файл</h2>";
        }
    } else {
        echo "<h2>Файл не существует!</h2>";
    }
}

// Считываем в массив фотоальбом
$photos = [];
foreach (glob("$imgDir/*") as $path) {
    $sz = getimagesize($path); // размер
    $tm = filemtime($path); // время добавления

    // Вставляем изображение в массив $photos
    $photos[$tm] = [
        'time' => $tm, // время добавления
        'name' => basename($path), // имя файла
        'url' => $path, // его URI
        'w' => $sz[0], // ширина картинки
        'h' => $sz[1], // ее высота
        'wh' => $sz[3], // "width=xxx height=yyy"
    ];
}

// Ключи массива $photos — время в секундах, когда была добавлена
// та или иная фотография. Сортируем массив: наиболее новые
// фотографии располагаем ближе к его началу.
krsort($photos);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        img {
            width: 223px;
            height: 246px;
        }
    </style>
</head>

<body>
    <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="file"><br>
        <input type="submit" name="doUpload" value="закачать новую фотографию">
        <hr>
    </form>

    <?php foreach ($photos as $img) : ?>
        <div>
            <img src="<?php echo $img['url'] ?>" <?php echo $img['wh'] ?> alt="Добавлена <?php echo date("d.m.Y H:i:s", $img['time']) ?>" />
            <p>Добавлена <?php echo date("d.m.Y H:i:s", $img['time']) ?></p>
            <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
                <input type="hidden" name="url" value="<?php echo $img['url'] ?>">
                <input type="submit" name="delete" value="Удалить">
            </form>
        </div>
    <?php endforeach; ?>
</body>

</html>
