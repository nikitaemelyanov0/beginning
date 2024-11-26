<?php

require_once 'bd.php';
session_start();

$user = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];

$sql = "INSERT INTO `users`(username, email, password) VALUES('$user', '$email', '$password')";

if ($conn -> query($sql)) {
    $sqlsecond = "SELECT * FROM `users` WHERE email='$email'";
    $result = $conn -> query($sqlsecond);
    $row = $result->fetch_assoc();
    $_SESSION['user']['id'] = $row['id'];
    header('location: profile.php');
}else {
    echo 'Произошла ошибка';
}