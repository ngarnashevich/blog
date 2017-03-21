<?php
session_start();
/** Параметры базе данных*/
define('DB_NAME', 'blog');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Неудалось подключиться к базе данных'
    . mysqli_connect_error());