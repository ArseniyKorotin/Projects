<?php
$number_to_guess = isset($_POST['number_to_guess']) ? $_POST['number_to_guess'] : rand(1, 8);
$count = isset($_POST['hidden']) ? $_POST['hidden'] : 0;
$text = "";
$nameErr = "";

if (isset($_POST['Submit'])) {
    $count++;

    if (empty($_POST["my_number"])) {
        $nameErr = "Число обов'язкове для введення!";
    } else {
        $my_number = trim($_POST["my_number"]);

        if (!preg_match("/^[1-8]$/", $my_number)) {
            $nameErr = "Дозволяюься тільки числа від 1 до 8!";
        }
    }

    if ($nameErr === "") {
        if ($my_number > $number_to_guess) {
            $text = "Занадто багато!";
        } elseif ($my_number < $number_to_guess) {
            $text = "Замало!";
        } else {
            $text = "Точно! Вгадано з $count спроби!<br/>";
            $number_to_guess = rand(1, 8);
            $count = 0;
        }
    }
}
?>

<p>Угадай число от 1 до 8:</p>
<form action="<?=$_SERVER['PHP_SELF']?>" name="myform" method="POST">
    <?php
if ($count > 0) {
    echo "Спроба $count ";
    for ($i = 0; $i < $count; $i++) {
        echo "|";
    }
    echo " ";
}
?>
    <input type="text" name="my_number" size="5"><?=$text?><?=$nameErr?><br/>
    <input type="hidden" name="hidden" size="50" value="<?=$count?>">
    <input type="hidden" name="number_to_guess" value="<?=$number_to_guess?>">
    <input name="Submit" type="submit" value="Відправити"><br/>
</form>
