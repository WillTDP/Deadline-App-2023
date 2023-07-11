<?php
 if (!empty($_POST)) {
    $username = $_POST['username'];

}


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div>
    <form action="login.php" method="post">
    <h2>Login</h2>
    <div class="form form--login">
        <label for="uid">Username</label>
        <input type="text" id="username" name="username">
    </div>
    <div class="form form--login">
        <label for="pwd">Password</label>
        <input type="password" id="password" name="password">
    </div>

    <input type="submit" value="Login" id="login">
</div>
</body>
</html>