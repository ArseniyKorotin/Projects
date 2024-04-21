<?php

$user_data = [];

// Функция для загрузки данных из файла txt
function load_data_from_file($file_path)
{
    global $user_data;
    $file_data = file($file_path, FILE_IGNORE_NEW_LINES);
    foreach ($file_data as $line) {
        list($login, $password) = explode(':', $line);
        $user_data[] = array('login' => $login, 'password' => $password);
    }
}

function get_user_data_html() {
    global $user_data;
    $html = '';
    foreach ($user_data as $user) {
        $html .= "Login: " . $user['login'] . "; Password: " . $user['password'] . "<br>";
    }
    return $html;
}
