<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}
    </style>
</head>
<body>
    <table><tr><th>X</th><th>Текст</th></tr><tr class="temp"><td><?php $x = round(rand(1, 13));
echo $x;?></td><td>
        <?php switch ($x) {
    case 1:
        echo "Учим буквы";
        break;
    case 2:
        echo "Учим таблицу умножения";
        break;
    case 3:
        echo "Учим деление";
        break;
    case 4:
        echo "Учим дроби";
        break;
    case 5:
        echo "Учим литературу";
        break;
    case 6:
        echo "Учим алгебру";
        break;
    case 7:
        echo "Учим геометрию";
        break;
    case 8:
        echo "Учим иностранные языки";
        break;
    case 9:
        echo "Учим физику";
        break;
    case 10:
        echo "Учим историю";
        break;
    case 11:
        echo "Учим профильную математику";
        break;
    case 12:
        echo "Учим химию";
        break;
    default:
        echo "Такого класса у нас нет";
        break;
}?>
    </td></tr></table>
</body>
</html>