<?php
    $conn = new mysqli('localhost', 'root', 'root', 'deadline_app_2023');

    $result = $conn->query('SELECT * FROM users');
    var_dump($result);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>