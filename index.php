<?php
session_start();
include_once 'Classes/ToDo.php';
include_once 'Classes/List.php';

if (!empty($_POST)) {
    if (isset($_POST['list_name'])) {
        Lists::createList($_POST['list_name']);
    } else {
        try {
            // Form was submitted
            $todo = new ToDo();
            $todo->setName($_POST['name']);
            $todo->setDescription($_POST['description']);
            $todo->setDeadline($_POST['deadline']);

            $newTodoId = $todo->save(); // Get the ID of the newly inserted todo item

            if (!empty($_POST['list_id'])) {
                Lists::assignToDoToList($newTodoId, $_POST['list_id']); // Use the retrieved ID
            }
        } catch (\Throwable $th) {
            $error = $th->getMessage();
        }
    }
}

if (isset($_SESSION['username'])) {
    // User is logged in
    echo 'Welcome, ' . $_SESSION['username'];
} else {
    // User is not logged in
    echo 'You are not logged in';
}
if (isset($_POST['delete_task'])) {
    $task_id = $_POST['task_id'];
    $removed = ToDo::removeTaskById($task_id);
    // You can do further processing or display a message here
}

//$allTasks = ToDo::getTasks(); // Fetch all tasks
$lists = Lists::getAllLists(); // Implement this method to retrieve all lists
//$selectedListId = $_GET['list_id'] ?? null; // Get the selected list ID from the loop in the HTML below
//$todosForSelectedList = Lists::getTodosForList($selectedListId); // Fetch todos for the selected list

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="" method="post">
        <div>
            <div>
                <label for="list_name">Create New List</label>
                <input type="text" name="list_name" id="list_name">
            </div>
            <div>
                <input type="submit" value="Add List">
            </div>
        </div>
        </form>
        <form action="" method="post">
        <div>
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
                <label for="list_id">Select List</label>
                <select name="list_id" id="list_id">
                    <option value="">No List</option>
                    <?php foreach ($lists as $list): ?>
                        <option value="<?php echo $list['id']; ?>"><?php echo htmlspecialchars($list['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <input type="submit" value="Add Task">
            </div>
        </div>
        </form>
        <?php if (isset($error)): ?>
            <div class="alert"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>
        <a href="logout.php">Log Out</a>
    </div>
<!-- Display lists and associated todos -->
<div>
    <?php foreach ($lists as $list): ?>
        <h3>List: <?php echo htmlspecialchars($list['name']); ?></h3>
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Deadline</th>
                <th>Remove</th>
            </tr>
            <?php $todosForList = Lists::getTodosForList($list['id'], 'ascending', 'deadline'); ?>
            <div id="ToDos">
                <?php foreach ($todosForList as $task): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($task['name']); ?></td>
                        <td><?php echo htmlspecialchars($task['description']); ?></td>
                        <td><?php echo htmlspecialchars($task['deadline']); ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                <button type="submit" name="delete_task">X</button>
                            </form>
                        </td>
                        <td>
                            <form class="comment-form">
                                <input type="text" name="comment" class="commentText" placeholder="Add a comment">
                                <button class="btnAddComment" type="submit" data-todo-id="<?php echo $task['id']; ?>">Add</button>
                            </form>
                        </td>
                        <td>
                            <form class="done-form">
                                <!-- Update the checkbox input -->
                                <input class="BtnDone" type="checkbox" name="done" class="doneCheckbox" data-todo-id="<?php echo $task['id']; ?>"
                                <?php echo $task['done'] ? 'checked' : ''; ?>> <!-- Add 'checked' attribute if task is done -->
                            </form>
                        </td>
                    </tr>
                    <tr class="comments-row" data-task-id="<?php echo $task['id']; ?>">
                        <td colspan="5">
                            <ul class="comments-list">
                                <!-- Comments will be added dynamically here -->
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </div>
        </table>
    <?php endforeach; ?>
</div>
  
<script src="App.js"></script>
</body>
</html>