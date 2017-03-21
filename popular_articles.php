<?php
session_start();
include_once 'config/functions.php';
include_once 'config/db.php';
$query = "SELECT * FROM posts ORDER BY postTime DESC LIMIT 4";
$result = mysqli_query($connect, $query);

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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
    <script>
        $(document).ready(function(){
            $(document).on('click','.show_more',function(){
                var ID = $(this).attr('id');
                $('.show_more').hide();
                $.ajax({
                    type:'POST',
                    url:'more_content.php',
                    data:'id='+ID,
                    success:function(html){
                        $('#show_more_main'+ID).remove();
                        $('.tutorial_list').append(html);
                    }
                });
            });
        });
    </script>
    <link rel="stylesheet" href="css/style.css">
    <title>Мой Блог</title>
</head>
<body>
<?php
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
//?>
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
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<li><a href="posts.php"> Последние статьи</a></li>';
                    echo '<li><a href="popular_articles.php"> Популярное</a></li>';
                    echo '<li><a href="best_blogger.php"> Лучшие блоги</a></li>';
                }
                ?>
            </ul>
            <?php
            if (isset($_SESSION['username'])) {
                echo '<ul class="nav navbar-nav navbar-right">';
                echo '<li><a href="insert_form.php">';
                echo '<span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span></a></li>';
                echo "<li><a href='profile.php'>Привет {$_SESSION['username']}</a></li>";
                echo '<li><a href="logout.php"><span class="glyphicon glyphicon glyphicon-off" aria-hidden="true"></span></a></li>';
                echo '</ul>';
            } else {
                header("location:index.php");
                exit();
            }
            ?>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-1 tutorial_list">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($post = mysqli_fetch_assoc($result)): ?>
                    <?php $id = $post['postID']; ?>
                    <?php $title = $post['postTitle']; ?>
                    <?php $desc = $post['postDesc']; ?>
                    <?php $tags = $post['postTag']; ?>
                    <?php $author = $post['postAuthor']; ?>
                    <?php $time = $post['postTime']; ?>
                    <?php $image = $post['postImage']; ?>
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
				  		<span>Комментариев:<?= getCountCommentary($connect, $id);?></span>
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
                                    <a href=<?= $update_post_link;?> type="button" class="btn btn-sm btn-default">
                                    <i class="glyphicon glyphicon-edit"></i></a>
                                    <a href=<?=$delete_post_link;?> type="button" class="btn btn-sm btn-default">
                                    <i class="glyphicon glyphicon-remove"></i></a>
                                    </span>
                                    <?php
                                }
                            }
                            ?>
                        </div>

                    </div>
                <?php endwhile; ?>
                <div id="show_more_main<?= $id; ?>">
                    <button id="<?= $id; ?>" type="button" class="show_more btn btn-info btn-lg btn-block">Показать еще</button>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
</div>
</body>
</html>