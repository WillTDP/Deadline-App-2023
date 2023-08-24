<?php
include_once(__DIR__ . "/../classes/Comments.php");

if (!empty($_POST)) {
    if (isset($_POST['text'])) {
        $comment = new Comment();
        $comment->setText($_POST['text']); // Use 'text' key
        $comment->setTodoId($_POST['todo_id']); // Use 'todo_id' key
        $comment->save();
        $response = [
            'status' => 'success',
            'message' => 'Comment saved'
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
