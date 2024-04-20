<?php
// Начинаем сессию
session_start();
date_default_timezone_set("Europe/Kyiv");
// Проверяем, если форма была отправлена
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Устанавливаем cookie с логином и временем последнего захода
    setcookie("user_login", $login, time() + 3600, "/");
    setcookie("password", $password, time() + 3600, "/");
    setcookie("last_visit", time(), time() + 3600, "/");

    // Сохраняем логин и хэш пароля в сессии
    $_SESSION["login"] = $login;
    $_SESSION["password"] = $password;
}

// Проверяем, если cookie существуют
if (isset($_COOKIE["user_login"]) && isset($_COOKIE["password"]) && isset($_COOKIE["last_visit"])) {
    $login = $_COOKIE["user_login"];
    $hashedPassword = $_COOKIE["password"];
    $lastVisit = date("Y-m-d H:i:s", $_COOKIE["last_visit"]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Форма входа</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="login">Логин:</label>
        <input type="text" id="login" name="login" required><br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Войти">
    </form>

    <a href="login.php">Информация о пользователе</a>
</body>
</html>