<?php
session_start();
if (isset($_SESSION['username'])) {
    // User is logged in
    echo 'Welcome, ' . $_SESSION['username'];
} else {
    // User is not logged in
    echo 'You are not logged in';
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="logout.php">Log Out</a>
</body>
</html>