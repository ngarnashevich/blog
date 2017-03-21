<?php
include "../config/db.php";

/* Перенаправляем если post_id не задан */
if (!isset($_GET['post_id'])) {
    header("location:post.php?id=" . $id);
} else {
    $post_id = $_GET['post_id'];
}
/* удаляем посто из table posts */
$query = "DELETE FROM posts
		WHERE postID='$post_id'
		";

$result = mysqli_query($connect, $query);

/* удаляем записи из user_post */
$query = "DELETE FROM user_post
		WHERE postID='$post_id'
		";

$result = mysqli_query($connect, $query);

/* удаляем коментарии пользователя */
$query = "DELETE FROM comments
				WHERE postID='$post_id'
				";

$result = mysqli_query($connect, $query);

if ($result == TRUE) {
    header("location: ../posts.php");
} else {
    echo "Ошибка!";
}
