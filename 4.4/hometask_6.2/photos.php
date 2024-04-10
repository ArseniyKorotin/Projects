<?php # Фотоальбом с возможностью закачки.
header('Content-Type: text/html; charset=utf-8');
$imgDir = "img"; // каталог для хранения изображений
if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) { // Проверяем, нажата ли кнопка добавления фотографии,
    if (!file_exists($imgDir)) {
        mkdir($imgDir, 0777);
    }
    // создаем каталог, если его еще нет

    $data = $_FILES['file'];
    $tmp = $data['tmp_name'];

    if (file_exists($tmp)) { // Проверяем, принят ли файл,
        $info = getimagesize($_FILES['file']['tmp_name']); //Функция вернет размер изображения, тип файла, height, width, а также тип содержимого HTTP
        // Проверяем, является ли файл изображением,
        if (preg_match('{image/(.*)}is', $info['mime'], $p)) {
            // Имя берем равным текущему времени в секундах, а
            // расширение — как часть MIME-типа после "image/".
            $name = "$imgDir/" . time() . "." . $p[1];
            // Добавляем файл в каталог с фотографиями.
            move_uploaded_file($tmp, $name);
        } else {
            echo "<h2>Попытка добавить файл недопустимого формата!</h2>";
        }
    } else {
        echo "<h2>Ошибка закачки #{$data['error']}!</h2>";
    }
}
// Считываем в массив фотоальбом.
$photos = [];
foreach (glob("$imgDir/*") as $path) {
    $sz = getimagesize($path); // размер
    $tm = filemtime($path); // время добавления
    // Вставляем изображение в массив $photos.
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
// Страница:
?>
<style>
	img {
		width: 223px;
		height: 246px;
	}
</style>
 <body>
 <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST" enctype="multipart/form-data">
 	<input type="file" name="file"><br>
 	<input type="submit" name="doUpload" value="закачать новую фотографию">
	<hr>
 </form>

 <?php foreach ($photos as $img) { ?>
        <div>
            <img src="<?php echo $img['url'] ?>" <?php echo $img['wh'] ?> alt="Добавлена <?php echo date("d.m.Y H:i:s", $img['time']) ?>"/>
            <p>Добавлена <?php echo date("d.m.Y H:i:s", $img['time']) ?></p>
            <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
                <input type="hidden" name="url" value="<?php echo $img['url'] ?>">
                <input type="submit" name="delete" value="Удалить">
            </form>
        </div>
    <?php } ?>

    <?php
    if (isset($_POST['delete'])) {
        $photo_to_delete = $_POST['url'];
        if (unlink($photo_to_delete)) {
            echo "<h2>Файл успешно удален!</h2>";
        } else {
            echo "<h2>Невозможно удалить файл</h2>";
        }
    }
    ?>

 </body>