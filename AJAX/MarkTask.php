<?php
include_once(__DIR__ . "/../classes/TaskDone.php");

if (!empty($_POST)) {
    if (isset($_POST['todo_id'])) {
        $Done = new Done();
        $Done->setTodoId($_POST['todo_id']);
        
        $result = $Done->save();

        if ($result) {
            // Update the "todo" table to set the "done" column to 1
            $Todo = new Done();
            $Todo->setTodoId($_POST['todo_id']);
            $Todo->saveTodo();  // This is where you update the "todo" table

            $response = [
                'status' => 'success',
                'message' => 'Task marked as done'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Error marking task as done (2)'
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}


?>
