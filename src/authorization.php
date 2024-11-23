<?php

require_once 'bd.php';

$password = $_POST['password'];
$email = $_POST['email'];

$sql = "SELECT * FROM `users` WHERE email='$email' AND password='$password'";

$result = $conn -> query($sql);
$row = $result -> fetch_assoc();

print_r($row['username']);