<?php

function l($x, $y, $e) {
    return (log10($x) - pow($e, $x + $y) + pow($x, $y)) / (sqrt(2) + pow($y, 2) + abs(pow($x, 3) - log($y)));
}

echo l(1, 2, 3);