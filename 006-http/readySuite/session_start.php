<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
session_regenerate_id(true);

if (!isset($_SESSION['page_views'])) {
    $_SESSION['page_views'] = 1;
} else {
    $_SESSION['page_views']++;
}

if ($_SESSION['page_views'] % 3 === 0) {
    header('Location: session_counter.php');
    exit;
}

echo "Страница была открыта {$_SESSION['page_views']} раз(а).";
?>