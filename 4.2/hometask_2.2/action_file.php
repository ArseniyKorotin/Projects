<?php
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["birthdate"])) {
        $birthdate = $_POST["birthdate"];
        list($year, $month, $day) = explode('-', $birthdate);
        print_r($birthdate);
        if (checkdate($month, $day, $year)) {
            echo "Дата рождения введена корректно: $birthdate";
        } else {
            echo "Ошибка: Введена некорректная дата рождения!";
        }
    } else {
        echo "Ошибка: Поле с датой рождения должно быть заполнено!";
    }
}