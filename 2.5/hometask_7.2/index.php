<?php
function createBookCard($title = "-", $authorFirstName = '-', $authorLastName = "-", $year = "-", $publisher = "-") {
    $args = func_get_args();

    foreach ($args as &$arg) {
        $arg = $arg ?? '-';
    }

    list($title, $authorFirstName, $authorLastName, $year, $publisher) = $args;

    $card = "Название книги: $title\n";
    $card .= "Автор: $authorFirstName $authorLastName\n";
    $card .= "Год написания: $year\n";
    $card .= "Издательство: $publisher\n";

    return $card;
}

$bookCard = createBookCard(null, "Джордж", null, 1954, "George Allen & Unwin");
echo $bookCard;