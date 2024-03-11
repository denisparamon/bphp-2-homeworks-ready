<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['page_views'])) {
    echo "Страница не была открыта.";
} else {
    echo "Третья страница была открыта {$_SESSION['page_views']} раз(а).";
}
?>