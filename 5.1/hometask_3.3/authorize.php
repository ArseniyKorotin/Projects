<?php
session_start();
require 'others.php';

if (!isset($_GET['go'])) {
    echo "<form style='width: 300px;'>";
    echo "<div style='display: flex; margin-bottom: 10px;'>";
    echo "<label style='width: 100px;'>Login:</label>";
    echo "<input type='text' name='login' required style='flex: 1;'>";
    echo "</div>";
    echo "<div style='display: flex; margin-bottom: 10px;'>";
    echo "<label style='width: 100px;'>Password:</label>";
    echo "<input type='password' name='passwd' required style='flex: 1;'>";
    echo "</div>";
    echo "<input type='submit' name='go' value='Submit'>";
    echo "</form>";
    if (isset($_SESSION['err']) && ($_SESSION['err'] == 1)) {
        $_SESSION['err'] = 0;
        echo "Неправильне введення, спробуйте ще раз!<br>";
    }
} else {
    $_SESSION['login'] = $_GET['login'];
    $_SESSION['passwd'] = password_hash($_GET['passwd'], PASSWORD_DEFAULT);
    if ($_GET['login'] === "Admin" && $_GET['passwd'] === "Ballada") {
        $_SESSION['authorized'] = 1;
        header("Location: secret_info.php");
    } elseif ($_GET['login'] && $_GET['passwd']) {
        $_SESSION['authorized'] = 1;
        header("Location: index.php");
        $user_data = $_SESSION['login'] . ":" . $_SESSION['passwd'] . "\n";
        file_put_contents('user_data.txt', $user_data, FILE_APPEND);
    } else {
        $_SESSION['err'] = 1;
        unset($_SESSION['authorized']);
        header("Location: authorize.php");
    }
}