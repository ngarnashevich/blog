<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <link rel="stylesheet" href="css/style.css">
    <title>Добавление статьи</title>
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
                <li><a href='#'>Привет <?= $_SESSION['username']; ?></a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon glyphicon-off" aria-hidden="true"></span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Добавить страницу</div>
            <div class="panel-body">

                <form role="form" action="new_post.php" method="post" enctype = 'multipart/form-data'>
                    <div class="form-group">
                        <label class="control-label">Заголовок</label>
                        <input type="text" class="form-control" name="postTitle">
                    </div>

                    <div class="form-group">
                        <label for="Description">Описание : </label>
                        <textarea class="form-control" rows="8" id="content" name="postDesc"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Теги</label>
                        <input type="text" class="form-control" name="postTag">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Загрузить фото</label>
                        <input type="file" class="form-control-file" id="exampleInputFile" name="postImage">
                    </div>
                    <button type="submit" class="btn btn-default" name="submit">Опубликовать</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

