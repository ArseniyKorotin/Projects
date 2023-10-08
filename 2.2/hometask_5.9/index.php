<?php

function libraryCard($title = '-', $authorFirstName = '-', $authorLastName = '-', $year = '-', $publisher = '-') {
    $args = func_get_args();

    for ($i = 0; $i < count($args); $i++) {
        if ($i === 3 && !is_numeric($args[$i])) {
            $args[$i] = '-';
        } elseif (!is_string($args[$i]) && $i != 3) {
            $args[$i] = '-';
        }
    }

    list($title, $authorFirstName, $authorLastName, $year, $publisher) = $args;

    $card = "Название книги: $title\n";
    $card .= "Автор: $authorFirstName $authorLastName\n";
    $card .= "Год написания: $year\n";
    $card .= "Издательство: $publisher\n";

    return $card;
}

$bookInfo = libraryCard('Властелин Колец', 9, 'Толкин', "1954", 'George Allen & Unwin');
echo $bookInfo;