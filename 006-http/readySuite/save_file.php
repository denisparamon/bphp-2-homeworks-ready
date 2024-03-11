<?php
if(isset($_GET['text'])) {
    $text = $_GET['text'];
    $filename = 'saved_text.txt';
    file_put_contents($filename, $text);
    header('Content-Disposition: attachment; filename="saved_text.txt"');
    header('Content-Type: text/plain');
    readfile($filename);
    exit;
} else {
    echo "Текст не был передан.";
}
?>