<?php

echo "<table><th>Thermometr</th>";

$t = rand(-42, 42);
echo "<h1>Graduses: {$t}</h1>";

for ($i = 42; $i >= -42; $i--) {
    echo "<tr><td class='temp_{$i}'>{$i}</td></tr>";
    $result2 = "<style>.temp_{$i}{background-color: red;}</style>";
    $result3 = "<style>.temp_{$i}{background-color: yellow;}</style>";

    echo ($i <= $t) ? $result2: $result3;

}

echo "</table>";
