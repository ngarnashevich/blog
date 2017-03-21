<?php
/* Если пользователь залогинен */
if (isset($_SESSION['username'])) {
    header('Location:index.php');
    exit();
}
if (isset($_POST['submit'])) {
    $username = trim(strip_tags($_POST['username']));
    $email = $_POST['email'];
//preg_match("/^[-0-9a-z_\.]+@[-0-9a-z^\.]+\.[a-z]{2,4}$/i", $email)
    $password = trim(strip_tags($_POST['password']));
    $hash = password_hash($password, PASSWORD_DEFAULT);
//    $p_hash = password_hash('$password', PASSWORD_BCRYPT);

    include_once "config/db.php";

    /* Проверяем существует логин и емейл*/
    $query = "SELECT * FROM users WHERE username='$username' OR email='$email' ";
    $result = mysqli_query($connect, $query);
    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        header("location:register.php");
        exit();
    } else {
        $query = "INSERT INTO users (username, password, email) VALUES ('$username','$hash','$email')";
        mysqli_query($connect, $query);
        header("location:index.php");
        exit();
    }
} else {
    header("location:reg_form.php");
    exit();
}