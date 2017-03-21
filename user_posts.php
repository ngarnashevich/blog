<?php
if (isset($_GT['user'])) {
    $user = $_GET['user'];

    $query = "SELECT * FROM posts WHERE postAuthor='$user'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($post = mysqli_fetch_assoc($result)) {
            $id = $post['postID'];
            $title = $post['postTitle'];
            $desc = $post['postDesc'];
            $tags = $post['postTag'];
            $author = $post['postAuthor'];
            $time = $post['postTime'];

        }

    }

}