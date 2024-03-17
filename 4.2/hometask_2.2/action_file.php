<?php
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {

    $day = isset($_POST["day"]) ? intval($_POST["day"]) : 0;
    $month = isset($_POST["month"]) ? intval($_POST["month"]) : 0;
    $year = isset($_POST["year"]) ? intval($_POST["year"]) : 0;

    
    if (checkdate($month, $day, $year)) {
        echo "Дата рождения введена корректно: $month.$day.$year";
    } else {
        echo "Ошибка: Введена некорректная дата рождения!";
    }
}
