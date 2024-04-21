<?php
session_start();

if (!isset($_SESSION['authorized'])) {
    header("Location: authorize.php");
}
require_once "others.php";
load_data_from_file('user_data.txt');
$user_data_html = get_user_data_html();


?>
<html>
<head>
    <title>Secret info</title>
</head>
<body>
    <!-- здесь располагается "секретна інформація"-->
    <h2>Данные пользователей:</h2>
    <?php echo $user_data_html; ?>
    <br><a href="index.php">На главную</a>
</body>
</html>