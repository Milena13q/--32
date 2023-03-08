<?php

$arr = [1, 2, 3, 4, 5, 6];

// Оставляем только четные
$filter = array_filter($arr, function ($num) {
    return ($num % 2) === 0;
});

// Получаем сумму
echo array_sum($filter);