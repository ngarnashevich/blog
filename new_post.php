<?php
session_start();
/* Проверяем не авторизировался ли наш пользователь */
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
if (isset($_FILES["postImage"]) and $_FILES['postImage']['type'] == "image/jpg" or $_FILES['postImage']['type'] == "image/jpeg") {
    $upload_file = "images/" . basename($_FILES['postImage']['name']);
    move_uploaded_file($_FILES['postImage']['tmp_name'], $upload_file);
} else {
    echo "К сожалению, мы только позволяют загружать изображения в формате JPG/JPEG";
    exit();
}
if (isset($_POST['submit'])) {
    $postTitle = $_POST['postTitle'];
    $postDesc = $_POST['postDesc'];
    $postTag = $_POST['postTag'];
    $postImg = $_FILES['postImage'];
    $postAuthor = $_SESSION['username'];


    include_once 'config/db.php';

    /* Добавление страницы */
    $query = "INSERT INTO posts (postTitle , postDesc , postTag, postImage , postAuthor)
			VALUES ('$postTitle' , '$postDesc' , '$postTag' , '$upload_file', '$postAuthor') ";
    mysqli_query($connect, $query);

    header("location:posts.php");
} else {
    include_once 'insert_form.php';
}