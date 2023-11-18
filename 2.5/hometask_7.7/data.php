<?php

define("SIGN", "Деканат");

$events = [
    "scholarship",
    "expulsion",
    "appreciation",
    "bonus",
];

$people = [
    "misha" => [
        "name" => "Михайло",
        "email" => "misha@mail.com",
    ],
    "arsen" => [
        "name" => "Арсеній",
        "email" => "arsen@mail.com",
    ],
    "mark" => [
        "name" => "Марк",
        "email" => "mark@gmail.com",
    ],
    "jimmy" => [
        "name" => "Джим",
    ],
    "sasha" => [
        "name" => "Олександр",
    ],
];

$invitation["misha"] = "scholarship";
$invitation["arsen"] = "expulsion";
$invitation["mark"] = "appreciation";
$invitation["jimmy"] = "bonus";
$invitation["sasha"] = "moneys";
