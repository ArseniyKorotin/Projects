<?php

// $f = fopen("file.txt", "r") or die("Ошибка!");
// // $content = fread($f, filesize("file.txt")); //читає 10 байтів з файлу
// // echo $content;
// while (!feof($f)) {
//     echo fgets($f);
// }
// fclose($f);
// $h = fopen("my_file.html","a+"); // Буде відкритий файл нульової довжини "my_file.html" для записи.
// $text = "!!!";
// if (fwrite($h, $text))
//    echo "Запис зроблено успішно";
// else
//    echo "Виникла помилка при запису даних";

// $arr = file("my_file.html"); 
// foreach($arr as $i => $a) 
//   echo $i,": ", $a;

// $n = readfile ("my_file.html");
// echo $n;

$homepage = file_get_contents('http://www.example.com/'); 
 echo $homepage;