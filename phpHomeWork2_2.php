<?php

$number1 = trim(fgets(STDIN));
$number2 = trim(fgets(STDIN));

if (!ctype_digit($number1) || !ctype_digit($number2)) {
    fwrite(STDERR, "Введите, пожалуйста, число\n");
    exit(1);
}

$number1 = intval($number1);
$number2 = intval($number2);

if ($number2 == 0) {
    fwrite(STDERR, "Делить на 0 нельзя\n");
    exit(1);
}

$result = $number1 / $number2;
echo $result . PHP_EOL;