<?php
$users1 = ["John" => "qwerty", "Nicole" => "asdf", "Mark" => "ww"];
$users2 = ["Joan" => "1234", "Mark" => "poiu", "Nicole" => "ggg"];

$users = array_merge_recursive($users1, $users2);

$commonKeys = array_intersect_key($users1, $users2);
$uniqueUsers = array_diff_key($users, $commonKeys);

print_r($uniqueUsers);