<?php
    require_once 'bd.php';
    session_start();

    $iduser = $_SESSION['user']['id'];
    $token = session_create_id();
    
    if (mysqli_query($conn, "SELECT * FROM `sessions` WHERE user_id='$iduser'")->num_rows==0) {
        mysqli_query($conn, "INSERT INTO `sessions`(user_id, session_token) VALUES('$iduser', '$token')");
    };

    $result = mysqli_query($conn, "SELECT * FROM `users` WHERE id='$iduser'");
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Добро пожаловать <?=$row['username']?></h1>
    <h1>Изменить информацию</h1>
    <form action="changeinfo.php" method="post">
        <input type="text" placeholder="Имя" name="username" value="<?=$row['username']?>"> <br>
        <input type="text" placeholder="email" name="email" value="<?=$row['email']?>"><br>
        <input type="text" placeholder="пароль" name="password" value="<?=$row['password']?>"><br>
        <button type="submit">Изменить</button> <br>
    </form>
</body>
</html>