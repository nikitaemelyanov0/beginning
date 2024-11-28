<?php

require_once 'bd.php';
session_start();
date_default_timezone_set('Asia/Yekaterinburg');

$user = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];
$iduser = $_SESSION['user']['id'];
$currentdate = date("Y-m-d H:i:s");

$result = mysqli_query($conn, "UPDATE `users` SET `username` = '$user', `email` = '$email', `password` = '$password' WHERE `users`.`id` = '$iduser'");
mysqli_query($conn, "UPDATE `users` SET `updated_at` = '$currentdate' WHERE `users`.`id` = $iduser;");

if ($result === true) {
    header('location: profile.php');
};