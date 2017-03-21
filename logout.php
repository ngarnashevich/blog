<?php
session_start();
/* Переадресация на главную страницу */
if (isset($_SESSION['username'])) {
    session_destroy();
    header("location: " . "index.php");
    exit;
}