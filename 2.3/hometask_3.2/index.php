<?php
$error = false;

function checkQuotesAndBrackets($string)
{
    global $error;

    $singleQuotes = substr_count($string, "'");
    $doubleQuotes = substr_count($string, '"');

    $openBrackets = substr_count($string, '(');
    $closeBrackets = substr_count($string, ')');

    if ($singleQuotes % 2 !== 0) {
        echo "Предупреждение: Несовпадение количества открывающихся или закрывающихся одинарных кавычек.\n";
        $error = true;
    } elseif ($doubleQuotes % 2 !== 0) {
        echo "Предупреждение: Несовпадение количества открывающихся или закрывающихся двойных кавычек.\n";
    }

    if ($openBrackets !== $closeBrackets) {
        echo "Предупреждение: Несовпадение количества открывающихся или закрывающихся скобок.\n";
        $error = true;
    }

    if (!$error) {
        echo "Проверка прошла успешно! Нет непарных символов.\n";
    }
}

$str = 'Это "тестовая" (строка без "проблем" и лишних скобок';
checkQuotesAndBrackets($str);