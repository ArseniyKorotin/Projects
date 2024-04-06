<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Выберите тип диаграммы</title>
</head>
<body>
    <form action="charts.php" method="post">
        <label for="chart_type">Выберите тип диаграммы:</label><br>
        <select name="chart_type" id="chart_type" required>
            <option value="bar">Столбиковая диаграмма</option><br>
            <option value="pie">Диаграмма-пирог</option>
        </select><br>
        <input type="submit" value="Сгенерировать диаграмму">
    </form>
</body>
</html>