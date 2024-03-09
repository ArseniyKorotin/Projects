<?php

header("Content-Type: text/html; charset=utf-8");

require 'simplehtmldom/simple_html_dom.php';

// .card__body .card__title

// $foxtrot = file_get_html("https://www.foxtrot.com.ua/uk/shop/mobilnye_telefony_smartfon.html");

// $links = [];
// $models = [];
// $prices = [];
// $list = [];
// $card_titles = $foxtrot->find('.card__body .card__title');

// if (count($card_titles)) {
//     foreach ($card_titles as $a) {
//         $links[] = $a->href;
//         $models[] = $a->plaintext;
//     }
// }

// if (count($foxtrot->find('.card-price'))) {
//     foreach ($foxtrot->find('.card-price') as $b) {
//         $prices[] = $b->plaintext;
//     }
// }

// for ($l = 0; $l < count($models); $l++) {
//     $list[$models[$l]] = "https://www.foxtrot.com.ua/uk/shop$links[$l]";
//     $list[] = $prices[$l];
// }

// $fp = fopen('file.csv', 'w');

// foreach ($list as $model => $link) {
//     $row = [$model, $link];
//     fputcsv($fp, $row);
// }

// fclose($fp);
// // print_r($links);

// // print_r($models);
// $ul = [];
// $ul[] = "<ul>";
// for ($i = 0; $i < count($models); $i++) {
//     $ul[] = "<li><strong>Модель: </strong><a href='https://www.foxtrot.com.ua/uk/shop{$links[$i]}'>{$models[$i]}</a> <strong>Ціна: {$prices[$i]}</strong></li><br>";
// }
// $ul[] = "</ul>";
// $content = implode("\n", $ul);

// $path = "foxtrot";
// if (!is_dir($path)) {
//     mkdir($path);
// }
// $str_b = '<!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>Foxtrot</title>
// </head>
// <body>';

// $str_e = '</body>
// </html>';

// $h = fopen($path . "/foxtrot.html", "w");

// fwrite($h, $str_b . "\n");
// fwrite($h, $content . "\n");
// fwrite($h, $str_e);
// fclose($h);

$foxtrot = file_get_html("https://www.foxtrot.com.ua/uk/shop/mobilnye_telefony_smartfon.html");

$products = [];

$card_titles = $foxtrot->find('.card__body .card__title');
$card_prices = $foxtrot->find('.card-price');

if (count($card_titles) && count($card_prices)) {
    foreach ($card_titles as $index => $title) {
        $price = preg_replace('/[^0-9.]/', '', $card_prices[$index]->plaintext);
        $product = [
            'model' => $title->plaintext,
            'link' => $title->href,
            'price' => $price,
        ];
        $products[] = $product;
    }
}

usort($products, function($a, $b) {
    return floatval($a['price']) - floatval($b['price']);
});

// записываем отсортированные данные в файл CSV
$fp = fopen('file.csv', 'w');
foreach ($products as $product) {
    fputcsv($fp, $product);
}
fclose($fp);

$ul = [];
$ul[] = "<ul>";
foreach ($products as $product) {
    $ul[] = "<li><strong>Модель: </strong><a href='https://www.foxtrot.com.ua/uk/shop{$product['link']}'>{$product['model']}</a> <strong>Ціна: {$product['price']}</strong></li><br>";
}
$ul[] = "</ul>";
$content = implode("\n", $ul);

$path = "foxtrot";
if (!is_dir($path)) {
    mkdir($path);
}

$str_b = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foxtrot</title>
</head>
<body>';

$str_e = '</body>
</html>';

$h = fopen($path . "/foxtrot.html", "w");
fwrite($h, $str_b . "\n");
fwrite($h, $content . "\n");
fwrite($h, $str_e);
fclose($h);
