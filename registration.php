<?php

require_once 'bd.php';

$user = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$sql = "INSERT INTO `users`(username, email, password) VALUES('$user', '$email', '$password')";

$conn -> query($sql);