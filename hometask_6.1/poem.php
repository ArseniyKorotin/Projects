<?php


$str_b = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>';

$str_e ='</body>
</html>';
$f = fopen("poem.txt","r");
//$content = fread($f, filesize("poem.txt"));
$arr = file("poem.txt");
foreach ($arr as $i => $a) {
    
}
//echo $content ;
$content = implode("\n", $arr);
$h = fopen("poem.html","w"); 

$text = $str_b."\n". $content."\n".$str_e;

if (fwrite($h, $text))
   echo "Запис зроблено успішно";
else
   echo "Виникла помилка при запису даних";