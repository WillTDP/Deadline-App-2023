<?php
session_start();

function canLogin($username, $password) {
    $conn = new PDO('mysql:host=localhost;dbname=deadline_app_2023', 'root', 'root');
    $query = $conn->prepare('SELECT * FROM users WHERE email = :email');
    $query->bindValue(':email', $username);
    $query->execute();
    $user = $query->fetch();
    $hash = $user['password'];
    if (password_verify($password, $hash)) {
        return true;
    } else {
        return false;
    }
}

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (canLogin($username, $password)) {
        session_start();
        $_SESSION['username'] = $username;
        header('Location: index.php');
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
