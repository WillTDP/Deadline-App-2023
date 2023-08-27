<?php
session_start();
include_once 'Classes/Db.php';
include_once 'Classes/User.php';

if (!empty($_POST)) {
    $username = $_POST['username']; 
    $password = $_POST['password'];

    if (User::canLogin($username, $password)) { //this calls the canLogin function from the User class 
        $_SESSION['username'] = $username; //this sets the session username to the username that was entered
        header('Location: index.php'); //this redirects to the index page
        exit;
    } else {
        $error = 'Wrong username or password';
    }
}
?>

<!DOCTYPE html>
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
            <input type="submit" value="Login" id="login">
        </form>
        <a href="signup.php">Sign Up</a>
    </div>
</body>
</html>
