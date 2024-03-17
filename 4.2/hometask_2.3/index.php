<?php

$data_birthday = [
    "Student1" => mktime(0, 0, 0, 5, 15, 1900),
    "Student2" => mktime(0, 0, 0, 6, 3, 1979),
    "Student3" => mktime(0, 0, 0, 8, 6, 1946),
    "Student4" => mktime(0, 0, 0, 3, 3, 1932),
    "Student5" => mktime(0, 0, 0, 5, 12, 1914),
    "Student6" => mktime(0, 0, 0, 8, 5, 1842),
    "Student7" => mktime(0, 0, 0, 3, 4, 1704),
    "Student8" => mktime(0, 0, 0, 5, 8, 1855),
    "Student9" => mktime(0, 0, 0, 4, 4, 1976),
    "Student10" => mktime(0, 0, 0, 12, 25, 1870),
];

$months = [
    1 => "Января",
    2 => "Февраля",
    3 => "Марта",
    4 => "Апреля",
    5 => "Мая",
    6 => "Июня",
    7 => "Июля",
    8 => "Августа",
    9 => "Сентября",
    10 => "Октября",
    11 => "Ноября",
    12 => "Декабря"
];



foreach ($data_birthday as $key => $value) {
    $date_info = getdate($value);
    $month_name = $months[$date_info["mon"]];
    echo $key.": ".$date_info["mday"]."/".$month_name."/".$date_info["year"]."<br> ";
}