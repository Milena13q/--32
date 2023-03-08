<?php

$color = '#FF0000';
$size = 1;
$tagSize = $size < 1 || $size > 5 ? 1 : $size;

echo '<h' . $tagSize . ' style="color: ' . $color . '">Милена Полудень</h' . $tagSize . '>';