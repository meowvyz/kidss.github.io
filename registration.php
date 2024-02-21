<?php
session_start();
include("db_connect.php");
$login = $_POST['login'];
$password = $_POST['password'];
$md5_password = md5($password);
$query = mysqli_query($link, "SELECT * FROM `users` WHERE `login`='{$login}'");
if (mysqli_num_rows($query) == 0) {
    $_SESSION['user'] = ['nick' => $login];
    mysqli_query($link, "INSERT INTO `users` (`login`, `password`) VALUES ('{$login}', '{$md5_password}')");
    header("Location: /user.php");
} else {
    echo("Ошибка: Данный логин занят другим пользователем.");
}