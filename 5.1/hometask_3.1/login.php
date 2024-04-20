<?php
// Начинаем сессию
session_start();

// Проверяем, если cookie существуют
date_default_timezone_set("Europe/Kyiv");
if (isset($_COOKIE["user_login"]) && isset($_COOKIE["password"]) && isset($_COOKIE["last_visit"])) {
    $login = $_COOKIE["user_login"];
    $hashedPassword = $_COOKIE["password"];
    $lastVisit = date("Y-m-d H:i:s", $_COOKIE["last_visit"]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Информация о пользователе</title>
</head>
<body>
    <?php if (isset($login) && isset($hashedPassword) && isset($lastVisit)): ?>
        <p>Логин: <?php echo $login; ?></p>
        <p>Пароль: <?php echo $hashedPassword ?></p>
        <p>Последний визит: <?php echo $lastVisit; ?></p>
    <?php endif;?>

    <a href="index.php">Вернуться на главную страницу</a>
</body>
</html>