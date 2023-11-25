<?php

function getSalary($position, $wage) {
    switch ($position) {
        case 'junior':
            return $wage / 4;
            break;
        
        case 'middle':
            return $wage / 2;
            break;
            
        case 'senior':
            return $wage;
            break;

        default:
            $wage = "Such a position does not exist";
            break;
    }
}

$workers = ["junior", "middle", "senior"];

foreach($workers as $worker) {
    echo "Your salary is $".call_user_func("getsalary", $worker, 1000).";\n";
}