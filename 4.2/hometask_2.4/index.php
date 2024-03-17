<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  /* width: 100%; */
}

td, th {
  border: 1px solid #ddd;
  padding: 8px;
}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

        .weekend {
            color: red;
        }

        .weekday {
            color: green;
        }
    </style>
</head>
<body>

<table>
<?php

function calendar() {
    print_r("<td>Sunday</td><td>Monday</td><td>Tuesday</td><td>Wednesday</td><td>Thursday</td><td>Friday</td><td>Saturday</td><br>");
    for ($i = 0; $i < 7; $i++) {
        $t = mktime(0, 0, 0, date("m"), date("d") + $i, date("Y"));
        $d = getdate($t);
        if ($d["wday"] === 0 || $d["wday"] === 6) {
            print_r('<td class="weekend">' . date("d", $t) . "</td>");
        } else {
            print_r('<td class="weekday">' . date("d", $t) . "</td>");
        }
    }
}

// date
echo date("l d F Y h:i:s A") . "\n";
echo date("Сегодня d.m.Y") . "\n";

// strtotime
echo strtotime("1/10/2018") . "\n";
echo strtotime("10 September 2018") . "<br>\n";

// mktime
$tomorrow = mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"));
$lastmonth = mktime(0, 0, 0, date("m") - 1, date("d"), date("Y"));
$nextyear = mktime(0, 0, 0, date("m"), date("d"), date("Y") + 1);

echo date("M-d-Y", $tomorrow) . "\n";
echo date("M-d-Y", $lastmonth) . "\n";
echo date("M-d-Y", $nextyear) . "\t";

calendar();
?>
</table>

</body>
</html>
