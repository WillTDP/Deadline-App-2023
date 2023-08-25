<?php
include_once(__DIR__ . "/Classes/Db.php");
include_once(__DIR__ . "/Classes/User.php");

if (!empty($_POST)) {
    $email = $_POST['username'];
    $password = $_POST['password'];

    $result = User::signUp($email, $password);

    if ($result) {
        header('Location: login.php');
        exit;
    } else {
        $error = 'Signup failed';
    }
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
        <form action=" " method="post">
            <h2>Sign Up</h2>
            <?php if (isset($error)): ?>
                <div class="alert"><?php echo $error; ?></div>
            <?php endif; ?>
            <div class="form form--login">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form form--login">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <input type="submit" value="sign up" id="login">
        </form>
        <a href="login.php">Login</a>
    </div>
</body>
</html>