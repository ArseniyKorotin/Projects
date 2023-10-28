<?php

$imagesTitles = [
    "IMG_23454545.jpg",
    "IMG_9566778565677.png",
    "images/IMG_4745643.gif",
    "IMG_78.png"
];

$reg_img = '/(?:images\/)?IMG_\d+\.(png|jpg|gif)/';

for ($i=0; $i < count($imagesTitles); $i++) { 
    if (preg_match($reg_img, $imagesTitles[$i], $arr)) {
        echo $imagesTitles[$i].' correct; \n ';
    } else {
        echo $imagesTitles[$i]." incorrect; \n";
    }
    // print_r($arr);
}