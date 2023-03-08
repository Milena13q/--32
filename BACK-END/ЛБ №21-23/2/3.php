<?php

$count = 1;

// For
echo 'For: </br>';

for ($i = 0; $i < ($count + 5); $i++) {
    echo 'Милена Полудень </br>';
}

// While
echo 'While: </br>';

$i = 0;

while ($i < ($count + 5)) {
    echo 'Милена Полудень </br>';

    $i++;
}

// Do While
echo 'Do While: </br>';

$i = 0;

do {
    echo 'Милена Полудень </br>';

    $i++;
} while ($i < ($count + 5));