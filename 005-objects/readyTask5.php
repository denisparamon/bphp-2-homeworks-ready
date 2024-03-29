<?php

// Объявление строгих типов для более строгой проверки типов данных
declare(strict_types=1);

// Инициализация переменной $w со значением 2
$w = 2;

// Функция для печати дня с учетом его статуса (рабочий/выходной)
function printDay(string $currentDay, bool $holiday) {
    // Если день является выходным, используется красный цвет
    if ($holiday) {
        echo "\033[31m $currentDay \033[0m".PHP_EOL;
        return;
    };

    // Если день является рабочим, используется зеленый цвет
    echo "\033[32m $currentDay \033[0m".PHP_EOL;
}

// Функция для расчета графика работы
function calculateSchedule() {
    global $w; // Использование глобальной переменной $w
    $year = intval(readline('Введите год, полностью: ')); // Запрос года у пользователя
    $month = intval(readline('Номер месяца расчета: ')); // Запрос номера месяца у пользователя
    $period = intval(readline('На сколько месяцев вперед сделать расчет: ')); // Запрос количества месяцев у пользователя
    $daysQuantity = 0; // Инициализация переменной для хранения общего количества дней в периоде

    // Вычисление общего количества дней в указанном периоде
    for ($i = 0; $i < $period; $i++) {
        $daysQuantity += cal_days_in_month(CAL_GREGORIAN, $month + $i, $year);
    };

    // Создание объекта DateTime для начальной даты
    $date = DateTime::createFromFormat('Y-m-d', "$year-"."$month-".'01');

    // Перебор всех дней в указанном периоде
    for ($i = 1; $i < $daysQuantity + 1; $i++) {
        $currentDay = $date->format('d l'); // Форматирование текущей даты в формат "день недели"

        // Если начался новый месяц, печатаем его название
        if ($date->format('d') === '01') {
            echo PHP_EOL.$date->format('F Y').PHP_EOL;
            echo '--------------------'.PHP_EOL;
        };

        // Проверка, является ли текущий день субботой или воскресеньем
        if ($date->format('l') === 'Saturday' || $date->format('l') === 'Sunday') {
            printDay($currentDay, true); // Если день выходной, печатаем его как выходной
            $w = 2; // Сброс счетчика рабочих дней на 2
        } else {
            if ($w === 2) {
                printDay($currentDay, false); // Если рабочий день и $w равно 2, печатаем как рабочий
                $w = 0; // Сброс счетчика рабочих дней на 0
            } else {
                printDay($currentDay, true); // Иначе печатаем как выходной
                $w++; // Увеличиваем счетчик рабочих дней на 1
            }
        };

        $date->modify('+1 day'); // Переход к следующему дню
    };

};

calculateSchedule(); // Вызов функции для расчета графика работы

?>