<?php

require "data.php";

foreach ($people as $key => $man_info) {
    $event_key = $invitation[$key];
    if ($event_key != "") {
        foreach ($man_info as $key1 => $info) {
            if ($key1 == "name") {
                $str = "Шановний $info!";
            }

            if ($key1 == "email") {
                $str = "\n$info";
            }

        }
        switch ($event_key) {
            case "scholarship":
                $str .= "\nВам нарахована стипендія за успіхи в навчанні.";
                break;
            case "expulsion":
                $str .= "\nНа жаль, ви відраховані через неуспішність.";
                break;
            case "appreciation":
                $str .= "\nВи отримали премію за участь в олімпіаді.";
                break;
            case "bonus":
                $str .= "\nМи вдячні вам за успіхи у навчанні.";
                break;
            default:$str .= "\nУ вас немає нових повідомлень.";
        }
        $str .= "\n" . SIGN . "\n\n";

        echo $str;
    }
}
