<?php
include_once(__DIR__ . "/../classes/Comments.php");
$response = [
    'status' => 'error',
    'message' => 'An error occurred'
];

if (!empty($_POST)) {
    try {
        $comment = new Comment();
        $comment->setText($_POST['text']);
        $comment->setTodoId($_POST['todo_id']);
        $comment->save();
        $response = [
            'status' => 'success',
            'message' => 'Comment saved'
        ];
    } catch (\Throwable $th) {
        $response['message'] = $th->getMessage();
    }
}
    header('Content-Type: application/json');
    echo json_encode($response);
?>
