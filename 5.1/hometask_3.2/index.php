<?php
if (isset($_POST['submit'])) {
    $login = $_POST["login"];
    $email = $_POST["email"];
    setcookie("login", $login, time() + 3600);
    setcookie("email", $email, time() + 3600);
}

setcookie("order[1]", "apple");
setcookie("order[2]", "milk");
setcookie("order[3]", "bread");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
<?php
if (isset($_COOKIE["login"]) && isset($_POST['submit'])) {
    echo '<a href="user.php">' . "User info: " . $_COOKIE["login"] . '.</a>';
}
?>
<h1>Hello</h1>
<a href="./basket.php">Basket</a>
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
<input type="text" placeholder="Input your name" name="login"><br>
<input type="email" placeholder="Input your email" name="email"><br>
<button type="submit" name="submit">Send</button>

</form>

</body>