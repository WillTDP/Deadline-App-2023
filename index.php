<?php
session_start();
include_once 'Classes/ToDo.php';

if (!empty($_POST)) {
    try {
        // Form was submitted
        $todo = new ToDo();
        $todo->setName($_POST['name']);
        $todo->setDescription($_POST['description']);
        $todo->setDeadline($_POST['deadline']);
        $todo->save();
    } catch (\Throwable $th) {
        $error = $th->getMessage();
    }
}
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
            <label for="description">Task Description</label>
            <input type="text" name="description" id="description">
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
    <?php if (isset($error)): ?>
        <div class="alert"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <div class="success"><?php echo $success; ?></div>
    <?php endif; ?>
    <a href="logout.php">Log Out</a>
</body>
</html>