<?php
include_once(__DIR__ . "/../classes/TaskDone.php");

if (!empty($_POST)) {
    if (isset($_POST['todo_id'])) {
        $Done = new Done();
        $Done->setTodoId($_POST['todo_id']);
        
        $result = $Done->removeTodo();

        if ($result) {
            // Update the "todo" table to set the "done" column to 0
            $Todo = new Done();
            $Todo->setTodoId($_POST['todo_id']);
            $Todo->removeDoneTodo();  // This is where you update the "todo" table

            $response = [
                'status' => 'success',
                'message' => 'Task marked as not done (1)'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Error marking task as not done (2)'
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
?>
