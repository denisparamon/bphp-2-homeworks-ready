<?php

declare(strict_types=1);

const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_PRINT = 3;
const OPERATION_EDIT_NAME = 4;
const OPERATION_ADD_QUANTITY = 5;

$operations = [
    OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
    OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
    OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
    OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
    OPERATION_EDIT_NAME => OPERATION_EDIT_NAME . '. Изменить название товара.',
    OPERATION_ADD_QUANTITY => OPERATION_ADD_QUANTITY . '. Добавить количество товара.',
];

$items = [];

function displayShoppingList(array $items): void
{
    if (count($items)) {
        echo 'Ваш список покупок: ' . PHP_EOL;
        foreach ($items as $itemName => $quantity) {
            echo "$itemName (Количество: $quantity)" . PHP_EOL;
        }
    } else {
        echo 'Ваш список покупок пуст.' . PHP_EOL;
    }
}

function requestOperation(array $operations): int
{
    do {
        echo 'Выберите операцию для выполнения: ' . PHP_EOL;
        echo phpHomeWork4 . phpimplode(PHP_EOL, $operations) . PHP_EOL . '> ';
        $operationNumber = (int)trim(fgets(STDIN));

        if (!array_key_exists($operationNumber, $operations)) {
            echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
        }
    } while (!array_key_exists($operationNumber, $operations));

    return $operationNumber;
}

function addItem(array &$items): void
{
    echo "Введите название товара для добавления в список: \n> ";
    $itemName = trim(fgets(STDIN));
    echo "Введите количество товара: \n> ";
    $quantity = (int)trim(fgets(STDIN));
    $items[$itemName] = $quantity;
}

function deleteItem(array &$items): void
{
    $itemName = requestItemName($items, 'для удаления из списка');
    if (isset($items[$itemName])) {
        unset($items[$itemName]);
    }
}

function editItemName(array &$items): void
{
    $itemName = requestItemName($items, 'для изменения названия');
    if (isset($items[$itemName])) {
        echo "Введите новое название для товара '$itemName': \n> ";
        $newName = trim(fgets(STDIN));
        $items[$newName] = $items[$itemName];
        unset($items[$itemName]);
    } else {
        echo "Товар '$itemName' не найден в списке." . PHP_EOL;
    }
}

function addItemQuantity(array &$items): void
{
    $itemName = requestItemName($items, 'для добавления количества');
    if (isset($items[$itemName])) {
        echo "Введите количество для добавления к товару '$itemName': \n> ";
        $quantityToAdd = (int)trim(fgets(STDIN));
        $items[$itemName] += $quantityToAdd;
    } else {
        echo "Товар '$itemName' не найден в списке." . PHP_EOL;
    }
}

function requestItemName(array $items, string $action): string
{
    displayShoppingList($items);
    echo "Введите название товара $action:" . PHP_EOL . '> ';
    return trim(fgets(STDIN));
}

function printShoppingList(array $items): void
{
    displayShoppingList($items);
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

        case OPERATION_EDIT_NAME:
            editItemName($items);
            break;

        case OPERATION_ADD_QUANTITY:
            addItemQuantity($items);
            break;
    }

    echo "\n ----- \n";
} while ($operationNumber > 0);

echo 'Программа зaвершена' . PHP_EOL;
?>