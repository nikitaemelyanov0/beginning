<?php

require_once 'bd.php';
session_start();

$password = $_POST['password'];
$email = $_POST['email'];

$sql = "SELECT * FROM `users` WHERE email='$email' AND password='$password'";

$result = $conn -> query($sql);
$row = $result -> fetch_assoc();

if ($result->num_rows>0) {
    $_SESSION['user']['id'] = $row['id'];
    header('location: profile.php');
}else {
    echo 'Неправильно введены данные';
};