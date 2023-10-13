<?php

$countries = [
    [
        "name" => "France",
        "capital" => "Paris",
        "area" => 640679,
        "population" => [
            "2000" => 59278000,
            "2010" => 59278000,
        ],
    ],
    [
        "name" => "England",
        "capital" => "London",
        "area" => 130395,
        "population" => [
            "2000" => 58800000,
            "2010" => 63200000,
        ],
    ],
    [
        "name" => "Deutschland",
        "capital" => "Berlin",
        "area" => 357021,
        "population" => [
            "2000" => 82260000,
            "2010" => 81752000,
        ],
    ],
];

function sortCountries($arr, $key)
{
    usort($arr, function ($a, $b) use ($key) {
        if ($key === "population") {
            $avgA = count($a[$key]) / count($a[$key]);
            $avgB = count($b[$key]) / count($b[$key]);
            return $avgA <=> $avgB;
        } else {
            return $a[$key] <=> $b[$key];
        }
    });
    return $arr;
}

$countries = sortCountries($countries, "population");

array_walk($countries, function (&$value) {
    echo "<p>Name: {$value['name']}</p><p>Capital: {$value['capital']}</p><p>Area: {$value['area']} square km</p>";
    $averagePopulation = array_sum($value['population']) / count($value['population']);
    echo "<p>Average Population (2000-2010): ".number_format($averagePopulation, 2)." people</p>";
    echo "<hr>";
});
