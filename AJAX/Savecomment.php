<?php
include_once(__DIR__ . "/../classes/Comments.php");

if(!empty($_POST)){
    if(isset($_POST['comment'])){
        $comment = new Comment();
        var_dump($_POST['comment']);
        $comment->setText($_POST['comment']);
        var_dump($_POST['todo_id']);
        $comment->setTodoId($_POST['todo_id']);
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