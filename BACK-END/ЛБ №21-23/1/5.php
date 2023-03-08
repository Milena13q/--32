<?php

define('NUM_E', 2.71828);

echo 'Число e равно ' . NUM_E;

$num_e1 = NUM_E;

var_dump([
    gettype($num_e1),
    (string)$num_e1,
    (bool)$num_e1,
    (int)$num_e1
]);