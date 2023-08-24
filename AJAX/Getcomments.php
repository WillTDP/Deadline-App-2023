<?php
include_once(__DIR__ . "/../classes/Comments.php");

if (!empty($_GET) && isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];
    $comments = Comment::getCommentsForTask($task_id); // Implement this method in Comments class

    header('Content-Type: application/json');
    echo json_encode($comments);
}
?>
