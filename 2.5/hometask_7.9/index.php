<?php

$var = "31.12.2020";

function next_year($matches)
{
    $months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December",
    ];

    $month = $matches[1];

    switch ($month) {
        case $month:
            return " " . $months[$month - 1] . " ";
            break;

        default:
            return "Invalid month";
            break;
    }

}

echo preg_replace_callback("/\.(\d{2})\./", "next_year", $var);
