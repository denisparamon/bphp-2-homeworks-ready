<?php

declare(strict_types=1);

const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_PRINT = 3;

$operations = [
    OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
    OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
    OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
    OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
];

$items = [];

function displayShoppingList(array $items): void
{
    if (count($items)) {
        echo 'Ваш список покупок: ' . PHP_EOL;
        echo implode("\n", $items) . "\n";
    } else {
        echo 'Ваш список покупок пуст.' . PHP_EOL;
    }
}

function requestOperation(array $operations): int
{
    do {
        echo 'Выберите операцию для выполнения: ' . PHP_EOL;
        echo implode(PHP_EOL, $operations) . PHP_EOL . '> ';
        $operationNumber = (int)trim(fgets(STDIN));

        if (!array_key_exists($operationNumber, $operations)) {
            echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
        }
    } while (!array_key_exists($operationNumber, $operations));

    return $operationNumber;
}

function addItem(array &$items): void
{
    echo "Введение название товара для добавления в список: \n> ";
    $itemName = trim(fgets(STDIN));
    $items[] = $itemName;
}

function deleteItem(array &$items): void
{
    $itemName = requestItemName($items, 'для удаления из списка');
    if (in_array($itemName, $items, true)) {
        while (($key = array_search($itemName, $items, true)) !== false) {
            unset($items[$key]);
        }
    }
}

function requestItemName(array $items, string $action): string
{
    displayShoppingList($items);
    echo "Введение название товара $action:" . PHP_EOL . '> ';
    return trim(fgets(STDIN));
}

function printShoppingList(array $items): void
{
    displayShoppingList($items);
    echo 'Всего ' . count($items) . ' позиций. ' . PHP_EOL;
    echo 'Нажмите enter для продолжения';
    fgets(STDIN);
}

do {
    system('clear');

    displayShoppingList($items);

    $operationNumber = requestOperation($operations);

    echo 'Выбрана операция: '  . $operations[$operationNumber] . PHP_EOL;

    switch ($operationNumber) {
        case OPERATION_ADD:
            addItem($items);
            break;

        case OPERATION_DELETE:
            deleteItem($items);
            break;

        case OPERATION_PRINT:
            printShoppingList($items);
            break;
    }

    echo "\n ----- \n";
} while ($operationNumber > 0);

echo 'Программа  завершена' . PHP_EOL;