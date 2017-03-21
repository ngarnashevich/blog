<?php
function getCountCommentary($connect, $id)
{
    $query = "SELECT COUNT(commentID) FROM comments WHERE postID=$id";

    $result = mysqli_query($connect, $query);

    $row = mysqli_fetch_row($result);
    $total = $row[0];
    return $total;
}