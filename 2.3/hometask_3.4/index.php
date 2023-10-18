<?php

$strWithTags = "
     <html><h1>Hello</h1><html>
 &lt;b&gt;bold&lt;b&gt;
 <em href='#'>Курсивний текст</em><br>
 <strong>Жирний текст</strong>
 <span>text</span>
";

$strWithoutTags = strip_tags($strWithTags);

$strTrimmed = trim($strWithoutTags);

$strCleaned = htmlspecialchars_decode($strTrimmed, ENT_QUOTES);

echo $strCleaned;