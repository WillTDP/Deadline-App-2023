<?php
session_start();

function canLogin($username, $password) {
    if ($username == 'admin' && $password == 'admin') {
        return true;
    } else {
        return false;
    }
}

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (canLogin($username, $password)) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit(); // Terminate the script after redirection
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
    </div>
</body>
</html>
