<?php

$films = [
    "James Cameron" => [
       ["Name" => "Titanik", "year of release" => 1976],
       ["Name" => "Avatar", "year of release" => 1980]
    ],
    "Peter Jackson" => [
       ["Name" => "The Lord of Rings", "year of release" => 1989],
       ["Name" => "The Hobbit: An Unexpected Journey", "year of release" => 1990],
        
    ],
    "Jeorge Lucas" => [
       ["Name" => "Star wars", "year of release" => 1978],
       ["Name" => "Indiana Jones", "year of release" => 1981]
    ]
];


echo "<table>";
foreach ($films as $director => $movies) {
    echo "<tr><th colspan='2'>$director</th></tr>";
    echo "<tr><th>Title</th><th>Year of Release</th></tr>";

    foreach ($movies as $movie) {
        echo "<tr><td>{$movie['Name']}</td><td>{$movie['year of release']}</td></tr>";
    }
}
echo "</table>";
