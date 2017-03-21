<?php
session_start();
if (!isset($_GET['id'])) {
    header("posts.php");
}

/* Update post form */
if (!isset($_POST['submit'])) {

    include_once 'config/db.php';

    $id = $_GET['id'];

    $query = "SELECT * FROM posts WHERE postID='$id' ";
    $result = mysqli_query($connect, $query);


    if (mysqli_num_rows($result) > 0) {
        $post = mysqli_fetch_assoc($result);

        if ($_SESSION['username'] != $post['postAuthor'] && $_SESSION['usertype'] != 'admin') {
            echo "You are not valid user to update this post";
            header("location:post.php?id=" . $post['postID']);
        }

        $id = $post['postID'];
        $desc = $post['postDesc'];
        $title = $post['postTitle'];
        $tags = $post['postTag'];
        $author = $post['postAuthor'];

        include("./update_form.php");

    } else {
        echo "Такой должности не существует:-(";
    }
} else {
    if (isset($_FILES["postImage"]) and $_FILES['postImage']['type'] == "image/jpg" or $_FILES['postImage']['type'] == "image/jpeg") {
        $upload_file = 'images/' . basename($_FILES['postImage']['name']);
        move_uploaded_file($_FILES['postImage']['tmp_name'], $upload_file);
    } else {
        echo "К сожалению, мы только позволяют загружать изображения в формате JPG/JPEG";
        exit();
    }

    $id = (int)$_GET['id'];
    $desc = $_POST['postDesc'];
    $title = $_POST['postTitle'];
    $tags = $_POST['postTag'];

    include_once './config/db.php';
    $query = "UPDATE posts SET postTitle='$title' , postDesc='$desc' , postTag='$tags', postImage='$upload_file'
			WHERE postID='$id'";

    $result = mysqli_query($connect, $query);
   if ($result) {
        header("location:" . 'full_post.php?id=' . $id);
   }else{
        header("location:" . 'update_form.php?id=' . $id);
    }
}