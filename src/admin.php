<?php

require_once 'bd.php';
session_start();

if ($_SESSION['user']['id']!=='14') {
    header('location: /beginning/index.html');
}

$result = mysqli_query($conn, "SELECT * FROM `users`");

while ($row = $result->fetch_assoc()) {
    $username = $row['username'];
    $email = $row['email'];
    echo "$username-$email <br>";
}
