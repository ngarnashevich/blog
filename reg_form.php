<!DOCTYPE html>
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
    <title>Регистрация</title>
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
            <?php
            if (!isset($_SESSION['username'])) {
                echo '<ul class="nav navbar-nav navbar-right">';
                echo '<form class="navbar-form navbar-left" action="#" method="POST">';
                echo '<a href="login_form.php" class="btn btn-default">Войти</a>';
                echo '<a href="reg_form.php" class="btn btn-default">Зарегистрироваться</a>';
                echo '</form></ul>';
            }
            ?>
        </div>
    </div>
</nav>
<div class="container">
    <form class="form-horizontal col-sm-offset-2" role="form" action="register.php" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Логин</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="username" placeholder="" name="username">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email</label>
            <div class="col-sm-5">
                <input type="email" class="form-control" id="email" placeholder="" name="email" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Пароль</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="pwd" placeholder="" name="password" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-default" name="submit">Зарегистрироваться</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>