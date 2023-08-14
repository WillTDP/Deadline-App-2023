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
    <form action="" method="post">
        <div>
            <label for="name">ToDo Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="task">Task Description</label>
            <input type="text" name="task" id="task">
        </div>
        <!--deadline date with calender selector-->
        <div>
            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" id="deadline">
        </div>
        <div>
            <input type="submit" value="Add Task">
        </div>

    </form>
    <a href="logout.php">Log Out</a>
</body>
</html>