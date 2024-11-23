<?php

require_once 'bd.php';
session_start();

$user = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$iduser = $_SESSION['user']['id'];

$result = mysqli_query($conn, "UPDATE `users` SET `username` = '$user', `email` = '$email', `password` = '$password' WHERE `users`.`id` = '$iduser'");  

if ($result === true) {
    header('location: profile.php');
};