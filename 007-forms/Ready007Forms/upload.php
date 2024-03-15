<?php
// Проверка наличия данных в полях и наличия загруженного файла
if (empty($_POST['file_name']) || empty($_FILES['content']['name'])) {
    header("Location: index.html"); // Редирект на форму
    exit;
}

$uploadDirectory = 'upload/';
$fileName = $_POST['file_name'];
$uploadedFile = $uploadDirectory . basename($_FILES['content']['name']);
$fileSize = $_FILES['content']['size'];

// Перемещаем файл из временного хранилища в указанный каталог
if (move_uploaded_file($_FILES['content']['tmp_name'], $uploadedFile)) {
    // Выводим путь к сохранённому файлу и размер файла
    echo "File uploaded successfully.<br>";
    echo "File path: " . $uploadedFile . "<br>";
    echo "File size: " . $fileSize . " bytes";
} else {
    echo "Error uploading file.";
}
?>
