<?php

if (isset($_COOKIE['order'])) {
    foreach ($_COOKIE['order'] as $name => $value) {
    echo "$name : $value <br />";
    }
} else {
    echo "Basket is empty!";
}