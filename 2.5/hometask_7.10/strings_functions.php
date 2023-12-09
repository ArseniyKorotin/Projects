<?php

function reverseWords($str)
{
    return implode(' ', array_map(function($word) {
        preg_match_all('/./us', $word, $chars);
        $reversedWord = implode('', array_reverse($chars[0]));
        return $reversedWord;
    }, explode(' ', $str)));
}

function removeOddWords($str)
{
    $words = explode(' ', $str);
    $filteredWords = array_filter($words, function ($key) {
        return $key % 2 == 0;
    }, ARRAY_FILTER_USE_KEY);
    return implode(' ', $filteredWords);
}
