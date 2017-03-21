<?php session_start(); ?>
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
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<li><a href="posts.php"> Последние статьи</a></li>';
                    echo '<li><a href="popular_articles.php"> Популярное</a></li>';
                    echo '<li><a href="best_blogger.php"> Лучшие блоги</a></li>';
                }
                ?>
            </ul>
            <?php
            if (!isset($_SESSION['username'])) {
                echo '<ul class="nav navbar-nav navbar-right">';
                echo '<form class="navbar-form navbar-left" action="#" method="POST">';
                echo '<a href="login_form.php" class="btn btn-default">Войти</a>';
                echo '<a href="reg_form.php" class="btn btn-default">Зарегистрироваться</a>';
                echo '</form></ul>';
            } else {
                $username = $_SESSION['username'];

                echo '<ul class="nav navbar-nav navbar-right">';
                echo '<li><a href="insert_form.php">';
                echo '<span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span></a></li>';
                echo "<li><a href='profile.php'>Привет $username</a></li>";
                echo '<li><a href="logout.php"><span class="glyphicon glyphicon glyphicon-off" aria-hidden="true"></span></a></li>';
                echo '</ul>';
            }
            ?>
        </div>
    </div>
</nav>
<div class="row">
    <div class="bg"></div>
</div>
</body>
</html>