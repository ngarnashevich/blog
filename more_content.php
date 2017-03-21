<?php
session_start();
include_once 'config/functions.php';
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    include_once 'config/db.php';

//считаем все строки, за исключением уже выведеных
    $queryAll = mysqli_query($connect, "SELECT COUNT(postTime) as num_rows FROM posts WHERE postID < " . $_POST['id'] .
        " ORDER BY postTime DESC");
    $row = mysqli_fetch_assoc($queryAll);
    $allRows = $row['num_rows'];

    $showLimit = 2;

//получаем строк
    $query = mysqli_query($connect, "SELECT * FROM posts WHERE postID < " . $_POST['id'] .
        " ORDER BY postTime DESC LIMIT " . $showLimit);

//количество строк
    $rowCount = mysqli_num_rows($query);

    if ($rowCount > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row["id"];
            $id = $row['postID'];
            $title = $row['postTitle'];
            $desc = $row['postDesc'];
            $tags = $row['postTag'];
            $author = $row['postAuthor'];
            $time = $row['postTime'];
            $image = $row['postImage']; ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">
                        <a href='<?= "full_post.php?id={$id}" ?>'><?= $title; ?></a>
                    </h2>
                </div>
                <div class="panel-body">
                    <img src="<?= $image; ?>" class="pull-left" alt="картинка" width="300" height="200">
                    <p class="text-left"><?= $desc; ?></p>
                </div>
                <div class="panel-footer">
					<span class="col-sm-2">
				  		<span>Комментариев:<?= getCountCommentary($connect, $id); ?></span>
					</span>
                    <span class="col-sm-2">
					<span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
			  			<a href="#">#<?= $tags; ?></a>
					</span>
                    <span class="rating" id="rating">
                            <button class="btn btn-default like ">Like</button>
                            <span class="likes">0</span>
					</span>

                    <?php
                    $delete_post_link = './post/delete_post.php?post_id=' . $id;
                    $update_post_link = 'update_form.php?id=' . $id;
                    if (isset($_SESSION['username'])) {
                        if ($_SESSION['username'] == $author || $_SESSION['usertype'] == 'admin') {
                            ?>
                            <span class="pull-right">
                                    <a href=<?= $update_post_link; ?> type="button" class="btn btn-sm btn-default">
                                    <i class="glyphicon glyphicon-edit"></i></a>
                                    <a href=<?= $delete_post_link; ?> type="button" class="btn btn-sm btn-default">
                                    <i class="glyphicon glyphicon-remove"></i></a>
                                    </span>
                            <?php
                        }
                    }
                    ?>
                </div>

            </div>
        <?php } ?>
        <?php if ($allRows > $showLimit) { ?>
            <div class="show_more_main" id="show_more_main<?= $id; ?>">
                <button id="<?= $id; ?>" type="button" class="show_more btn btn-info btn-lg btn-block">Показать
                    еще
                </button>
            </div>
        <?php } ?>
        <?php
    }
}
?>



