<?php
mb_internal_encoding("UTF-8");

echo "Введите фамилию: ";
$lastName = trim(fgets(STDIN));
echo "Введите имя: ";
$firstName = trim(fgets(STDIN));
echo "Введите отчество: ";
$patronymic = trim(fgets(STDIN));

$fullName = mb_ucfirst($lastName) . ' ' . mb_ucfirst($firstName) . ' ' . mb_ucfirst($patronymic);

$surnameAndInitials = mb_ucfirst($lastName) . ' ' . mb_substr(mb_ucfirst($firstName), 0, 1) . '.' . mb_substr(mb_ucfirst($patronymic), 0, 1) . '.';

$fio = mb_substr(mb_ucfirst($lastName), 0, 1) . mb_substr(mb_ucfirst($firstName), 0, 1) . mb_substr(mb_ucfirst($patronymic), 0, 1);

echo "Полное имя: '$fullName' \n";
echo "Фамилия и инициалы: '$surnameAndInitials' \n";
echo "Аббревиатура: '$fio' \\";

function mb_ucfirst($str) {
    return mb_strtoupper(mb_substr($str, 0, 1)) . mb_substr($str, 1);
}
?>