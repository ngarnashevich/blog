<?php
include_once 'config/db.php';
/*Проверка формы авторизации*/
if (isset($_POST['submit'])) {
    $username = trim(strip_tags($_POST['username']));
    $password = $_POST['password'];
//    password_verify ($password , $hash )
    /* Проверяем правильность логина*/

//    $query = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connect, $query);


    /* ошибка запроса*/
    if ($result == FALSE) {
        echo "Ошбика запроса \n";
        header("location:login.php");
    }
    if (!empty($_POST['checked'])) {
        setcookie($username, $username, time() + 60);
    } else {
        setcookie($username, $username, time() + 36000);
    }
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;

        $detail = mysqli_fetch_assoc($result);
        if (password_verify($password, $detail['password'])) {
            $_SESSION['usertype'] = $detail['usertype'];
            header("location:index.php");
        }
    } else {
        echo "
		<div class=\"alert alert-danger container\" role=\"alert\">
	        <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
	        <span class=\"sr-only\">Ошибка:</span>
	        Неправильный Логин или Пароль
		</div>
		";
    }
} else {
    if (!isset($_SESSION['username'])) {
        echo "
			<div class=\"alert alert-danger\" role=\"alert\">
              <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
              <span class=\"sr-only\">Ошибка:</span>
		      Повторите попытку
			</div>
			";
    } else {
        header("location:index.php");
    }
}