<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Календарь</title>
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: #f2f2f2;
        }

        .weekend {
            color: red;
        }

        .today {
            background-color: lightblue;
        }
    </style>
</head>
<body>

<table>
    <?php
    function calendar()
    {
        $arr_days = ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"];

        print_r("<tr>");
        // Выводим названия дней недели
        foreach ($arr_days as $day) {
            print_r('<th>' . $day . '</th>');
        }
        print_r("</tr>");

        print_r("<tr>");
        $today = date("d");
        $current_day_of_week = date("w");
        // Выводим числа дат
        for ($i = 1; $i <= 7; $i++) {
            // Определяем дату для текущего дня недели
            $t = strtotime("-" . ($current_day_of_week - $i) . " day");
            // Получаем номер дня месяца
            $day_number = date("d", $t);
            $class = ($i == 1 || $i == 7) ? 'weekend' : 'weekday';
            if ($day_number == $today) {
                $class .= ' today';
            }
            // Выводим число даты
            print_r('<td class="' . $class . '">' . $day_number . "</td>");
        }
        print_r("</tr>");
    }

    calendar();
    ?>

</table>

</body>
</html>