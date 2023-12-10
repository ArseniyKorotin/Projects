<?php
$users = [
    'admin' => [
        'password' => 'admin123',
        'name' => 'admin',
    ],
    'user' => [
        'password' => 'user123',
        'name' => 'user',
    ],
    'kim' => [
        'passwword' => 'kim123',
        'name' => 'kim',
    ],
];

$login = '';
$password = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (array_key_exists($login, $users)) {
        if ($password === $users[$login]['password']) {
            $_POST['name'] = $users[$login]['name'];

            if ($_POST['name'] === 'admin') {
                header("Location: admin.php?login=$login");
                exit();
            } else {
                header("Location: user.php?login=$login");
                exit();
            }
        } else {
            $error = "Неверный пароль";
        }
    } else {
        $error = "Пользователь не найден";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Форма входа</title>
</head>
<body>
    <h2>Форма входа</h2>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        Логин: <input type="text" name="login"><br>
        Пароль: <input type="password" name="password"><br>
        <input type="submit" value="Войти">
        <p style="color: red;"><?php echo $error; ?></p>
    </form>
</body>
</html>
