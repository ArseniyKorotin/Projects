<?php
session_start();
if (!isset($_SESSION["authorized"])) {
    header("Location: authorize.php");
}
//unset($_SESSION['login']);
//unset($_SESSION['passwd']);
//unset($_SESSION['authorized']);
//session_unset();
?>
<html>
<head><title>My home page</title></head>
<!-- домашняя страничка-->
<?php
print_r("Login: " . $_SESSION["login"] . " Pass: " . $_SESSION["passwd"]); // виводимо змінні сесії
?>
  <br><a href="authorize.php">Hub</a>
</html>
