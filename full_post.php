<?php
session_start();
include_once 'config/functions.php';
//Коментарии добавить
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $commentText = $_POST['commentDesc'];
    $author = $_SESSION['username'];
    include_once './config/db.php';
    $query = "INSERT INTO comments (postID , commentDesc , commentAuthor ) VALUES ('$id' , '$commentText' , '$author')";
    $result = mysqli_query($connect, $query);
    header('location: ' . $_SERVER['REQUEST_URI']);
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once './config/db.php';

    $query = "SELECT * FROM posts WHERE postID='$id'";
    $result = mysqli_query($connect, $query);

    if ($post = mysqli_fetch_assoc($result)) {
        $id = $post['postID'];
        $title = $post['postTitle'];
        $desc = $post['postDesc'];
        $tags = $post['postTag'];
        $author = $post['postAuthor'];
        $images = $post['postImage'];
    }
}

if (isset($_GET['del'])) {
    include_once './config/db.php';
    $delete = abs((int)$_GET['del']);
    if ($delete) {
        $sql = "DELETE FROM comments WHERE commentID=$delete";
        $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
        header('location: ' . $_SERVER['REQUEST_URI']);
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Мой Блог</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="posts.php"> Последние статьи</a></li>
                <li><a href="popular_articles.php"> Популярное</a></li>
                <li><a href="best_blogger.php"> Лучшие блоги</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="insert_form.php">
                        <span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span></a></li>
                <li><a href='profile.php'>Привет <?= $_SESSION['username']; ?></a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon glyphicon-off" aria-hidden="true"></span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            <div class="panel panel-default">
                <!-- TITLE -->
                <div class="panel-heading">
                    <h2 class="panel-title">
                        <a href=<?= "post.php?id=" . $id; ?>><?= $title; ?></a>
                    </h2>
                </div>

                <!-- 	CONTENT -->
                <div class="panel-body">
                    <img src="<?= $images; ?>" class="pull-left" alt="картинка" width="300" height="200">
                    <p class="text-left"><?= $desc; ?></p>
                </div>

                <!-- FOOTER-->
                <div class="panel-footer">
					<span class="col-sm-2">
				  		<span>Комментариев:<?= getCountCommentary($connect, $id); ?></span>
					</span>
                    <span class="col-sm-2">
							<span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
			  			<a href=<?= "post.php?tags=" . $tags; ?>><?= $tags; ?></a>
					</span>
                    <span class="rating" id="rating">
                            <button class="btn btn-default like ">Like</button>
                            <span class="likes">0</span>
					</span>
                    <!-- time -->
                    <span class="label ">
					</span>
                    <?php
                    $delete_post_link = './post/delete_post.php?post_id=' . $id;
                    $update_post_link = 'update_form.php?id=' . $id;
                    if (isset($_SESSION['username'])) {
                        if ($_SESSION['username'] == $author || $_SESSION['usertype'] == 'admin') {
                            echo "<span class=\"pull-right\">";
                            echo "<a href=$update_post_link type=\"button\" class=\"btn btn-sm btn-default\">
                                    <i class=\"glyphicon glyphicon-edit\"></i></a> ";
                            echo "<a href=$delete_post_link type=\"button\" class=\"btn btn-sm btn-default\">
                                    <i class=\"glyphicon glyphicon-remove\"></i></a>
                                    </span>";
                        }
                    }
                    ?>
                </div>
                <!-- comments -->
                <?php
                include_once './config/db.php';
                //Извлеч коментарии
                $query = "SELECT * FROM comments WHERE postID='$id'";
                $result = mysqli_query($connect, $query);
                if ($result):

                    echo "<div class='panel-footer'>Комментарии</div>";
                    if (mysqli_num_rows($result) > 0):
                        while ($comment = mysqli_fetch_assoc($result)):
                            ?>
                            <div class="panel-footer">
                            <span>
                            <a href=<?= "../profile.php?user=" . $comment['commentAuthor']; ?>>
                            <?= $comment['commentAuthor']; ?>
                            </a>
                                <i> - <?= $comment['commentDesc']; ?></i>
                            </span>
                                <span class="pull-right"><i><?= $comment['commentTime']; ?></i></span>

                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php endif; ?>


                <div class="panel-footer">
                    <form role="form" action=<?= "full_post.php?id=" . $_REQUEST['id']; ?> method="post">
                        <div class="form-group">
                            <div>
                                <textarea class="form-control" id="commentDesc" name="commentDesc"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-default pull-left" name="submit">Комментировать
                                </button>
                            </div>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>