<?php
session_start();
include("db_connect.php");
$login = $_POST['login'];
$password = $_POST['password'];
$md5_password = md5($password);
$query = mysqli_query($link, "SELECT * FROM `users` WHERE `login`='{$login}'");
if (mysqli_num_rows($query) == 1) {
    $_SESSION['user'] = ['nick' => $login];
    header("Location: /user.php");
} else {
    echo("Данный логин или пароль неверный");
}