<?php

require_once 'bd.php';
session_start();

$password = $_POST['password'];
$email = $_POST['email'];

$passsql = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'");
$passhash = $passsql->fetch_assoc()['password'];

$sql = "SELECT * FROM `users` WHERE email='$email'";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();

if ($result->num_rows>0 && (password_verify($password, $passhash)===true || $password==$passhash)) {
    $_SESSION['user']['id'] = $row['id'];
    if ($row['role']=='admin') {
        header('location: admin.php');
    } else {
        header('location: profile.php');
    }
}else {
    echo 'Неправильно введены данные';
};