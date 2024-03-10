<?php

$weather_file = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=Kyiv,ua&units=metric&APPID=5ee98b3b73ace38f399555e8bf61029e");

$weather = json_decode($weather_file, true);
// $f_to_cel = (f-32)/1.8;
$ul = [];
$ul[] = "<ul>";

foreach ($weather as $key => $value) {
    if (is_array($value)) {
        // Выводим название ключа с заглавной буквы
        $ul[] = "<br><li><h3>" . ucfirst($key) . " list: </h3></li>";
        foreach ($value as $subkey => $subvalue) {
            if (is_array($subvalue)) {
                foreach ($subvalue as $subsubkey => $subsubvalue) {
                    $ul[] = "<br><li>" . "<h4>" . ucfirst($subsubkey) . " list: </h4>" . $subsubvalue . " </li>";
                }
            } else {
                $ul[] = "<li>" . "<h4>" . ucfirst($subkey) . ": </h4>" . $subvalue . " </li>";
            }
        }
    } else {
        $ul[] = "<li>" . "<h4>" . ucfirst($key) . ": </h4>" . $value . "</li>";
    }
}

$ul[] = "</ul>";
$content = implode("\n", $ul);

$str_b = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather forecast</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    ul {
        list-style-type:none;
    }
    </style>
</head>
<body>';

$str_e = '</body>
</html>';

$h = fopen("weather.html", "w");
fwrite($h, $str_b . "\n");
fwrite($h, $content . "\n");
fwrite($h, $str_e);
fclose($h);
