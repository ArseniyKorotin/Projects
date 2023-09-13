<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$a = round(rand(-10, 27));
$b = round(rand(3, 25));
$c = round(rand(-5, 21));
$d = $b ** 2 - 4 * $a * $c;

echo "<h1>{$a}*x^2 + {$b}*x + {$c} = 0</h1>";
echo "<h2>D = b^2 - 4*a*c = {$d}</h2>";


if ($d > 0) {
    $x1 = (-$b + sqrt($d)) / (2 * $a);
    $x2 = (-$b - sqrt($d)) / (2 * $a);
    echo "x1 = {$x1}<br>";
    echo "x2 = {$x2}<br>";
} elseif ($d === 0) {
    $x1 = -$b / (2 * $a);
    echo "Уравнение имеет единственный корень x1 = {$x1}<br>";
} else {
    echo "Уравнение не имеет действительных корней.<br>";
}
?>

</body>
</html>