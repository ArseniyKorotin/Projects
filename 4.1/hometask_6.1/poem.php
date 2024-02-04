<?php

$str_d = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your HTML Page</title>
</head>
<body>';

$str_f = '
</body>
</html>
';

$f = fopen("poem.txt", "r");
$content = fread($f, filesize("poem.txt"));

$content_2 = "";

$arr = file("poem.txt");
foreach ($arr as $i => $a) {

    if ($i == 0) {
        $content_2 .= "<h1>$a</h1>\n";
    } else {
        $content_2 .= "<p>$a</p>\n";
    }
}

$h = fopen("poem.html", "w");
$text = $str_d . "\n" . $content_2 . "\n" . $str_f;
if (fwrite($h, $text)) {
    echo "Запис зроблено успішно";
} else {
    echo "Виникла помилка при запису даних";
}

fclose($f);
fclose($h);