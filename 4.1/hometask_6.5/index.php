<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    td {
        text-align: center;
    }
</style>
<body>

<?php

$library = [
    ['title' => 'The Lord of the Rings', 'author' => 'John Ronald Reuel Tolkien', 'year' => 1954],
    ['title' => 'Fantastic Beasts and Where to Find Them', 'author' => 'J. K. Rowling', 'year' => 2001],
    ['title' => 'Star wars', 'author' => 'George Lucas', 'year' => 1977],
];

$serializedData = serialize($library);

file_put_contents('library.txt', $serializedData);

$serializedData = file_get_contents('library.txt');
$library = unserialize($serializedData);

echo '<table border="1">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
        </tr>';

foreach ($library as $book) {
    echo '<tr>
            <td>' . $book['title'] . '</td>
            <td>' . $book['author'] . '</td>
            <td>' . $book['year'] . '</td>
          </tr>';
}

echo '</table>';
?>
</body>
</html>