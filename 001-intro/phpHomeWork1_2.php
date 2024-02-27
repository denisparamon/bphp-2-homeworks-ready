<html>
<head>
    <title>PHP Test</title>
</head>
<body>
<?php
echo "Текущий файл: " . __FILE__ . "<br>";
echo "Номер текущей строки: " . __LINE__ . "<br>";
?>

<br>

<?php
$hereDoc = <<<EOD
    Это
    многострочная
    строка.<br>
    А такой результат должен быть?<br>
    EOD;

echo $hereDoc;
?>

<br>

<?php
$str1 = "Рыба";
$str2 = "рыбою";
$str3 = "человек";
$str4 = "человеком";

$finalPhrase = "$str1 $str2 сыта, а $str3 $str4";

echo $finalPhrase;
?>
<script src="https://replit.com/public/js/replit-badge-v2.js" theme="dark" position="bottom-right"></script>
</body>
</html>