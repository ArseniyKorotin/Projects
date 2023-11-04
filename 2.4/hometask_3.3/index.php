<?php

$str = "test_mail@mail.com";

function validateEmail($email)
{
    $pattern = "/^[a-zA-Z][a-zA-Z0-9_]*@[a-zA-Z]+\.[a-zA-Z]+$/";

    if (preg_match($pattern, $email)) {
        echo "Адрес электронной почты верен.";
    } else {
        echo "Адрес электронной почты неверен.";
    }
}

validateEmail($str);