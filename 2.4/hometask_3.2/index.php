<?php

$str = "<p>Права пользователей:</p>
<ul>
  <li>Administrator</li>
  <li>Editor</li>
  <li>Subscriber</li>
</ul>";

$pattern = '[<li>(\w*)</li>]';

$replacement = '<li><a href="http://www.php.kh.ua/script.php?role=\1">\1</a></li>';

echo preg_replace($pattern, $replacement, $str);