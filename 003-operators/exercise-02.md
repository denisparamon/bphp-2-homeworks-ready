# Задание 2: стандартизатор имени

## Описание
На сайте интернет-магазина имя пользователя в разных компонентах отображается по-разному.
Для этого запросите фамилию, имя, отчество и напишите стандартизатор имён.

## Техническое задание
В личном кабинете отображается фамилия и инициалы, поэтому вам необходимо из фамилии, имени и отчества получить надпись следующего формата: `Фамилия И.О.`.
На компоненте корзины отображаются только первые буквы `ФИО`.
При отправке заказа нужно указывать полные фамилию, имя и отчество, при этом первая буква должна быть в верхнем регистре.
Программа должна корректно работать с кириллицей.

## Пример
Пользователь ввёл следующие данные:
- Имя: `иван`
- Фамилия: `иванов`
- Отчество: `иванович`

У вас должны получиться следующие переменные: \
`$fullName = 'Иванов Иван Иванович'`\
`$fio = 'ИИИ'`\
`$surnameAndInitials = 'Иванов И.И.'`\
Их необходимо вывести на экран в следующем формате:
> Полное имя: 'Иванов Иван Иванович' \
> Фамилия и инициалы: 'Иванов И.И.' \
> Аббревиатура: 'ИИИ' \


## Алгоритм выполнения
1. Создать файл index.php.
1. Запросить три переменные с именем, фамилией и отчеством. 
1. Объявить переменную `$fullname`, записать в неё полное ФИО так, чтобы каждое слово начиналось с большой буквы. 
1. Объявить переменную `$surnameAndInitials`. Её значением должна быть конкатенация фамилии с первой буквой в верхнем регистре, а также через пробел — инициалов. После каждой буквы инициалов должна быть точка.
1. Объявить переменную `$fio`. Значением должна быть конкатенация первых букв в верхнем регистре.

Обратите внимание на [рекомендации по сдаче домашнего задания](../homework.md).