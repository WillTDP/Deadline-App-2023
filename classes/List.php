<?php
include_once(__DIR__ . "/Db.php");
include_once(__DIR__ . "/ToDo.php");

class Lists {   
    //create list in db
    public static function createList($name) {
        //db connection
        $conn = Db::connect();

        //insert query into db
        $query = $conn->prepare('INSERT INTO lists (name) VALUES (:name)');

        //bind values to query
        $query->bindValue(':name', $name);

        //execute query and return result
        return $query->execute();
    }

    //assign todo to list
    public static function assignToDoToList($todoId, $listId) {
        //db connection
        $conn = Db::connect();

        //insert query into db the todo_id gets the value of the list_id from the list table
        $query = $conn->prepare('UPDATE todo SET list_id = :list_id WHERE id = :todo_id');

        //bind values to query todo_id and list_id 
        $query->bindValue(':list_id', $listId, PDO::PARAM_INT);
        $query->bindValue(':todo_id', $todoId, PDO::PARAM_INT);

        //execute query and return result
        return $query->execute();
    }

    // get all todos for a list by list id 
    public static function getTodosForList($listId, $sortOrder = 'ascending', $sortBy = 'deadline') {
        // db connection
        $conn = Db::connect();

        // select query from db
        $query = $conn->prepare('SELECT * FROM todo WHERE list_id = :list_id');

        // bind list_id to $listId
        $query->bindValue(':list_id', $listId, PDO::PARAM_INT); // Make sure to use proper data type

        // execute query
        $query->execute();

        // return array of todos
        $todos = $query->fetchAll(PDO::FETCH_ASSOC);

        // Sort todos by due date
        if ($sortBy === 'deadline') {
            usort($todos, function($a, $b) use ($sortOrder) {
                return ($sortOrder === 'ascending')
                    ? strtotime($a['deadline']) - strtotime($b['deadline'])
                    : strtotime($b['deadline']) - strtotime($a['deadline']);
            });
        }

        return $todos;
    }

    
    public static function getAllLists() {
        //db connection
        $conn = Db::connect();

        //select query from db
        $query = $conn->prepare('SELECT * FROM lists');

        //execute query
        $query->execute();

        //return array of todos
        $lists = $query->fetchAll(PDO::FETCH_ASSOC);
        return $lists;
    }

    //remove list by id
    public static function removeListById($id) {
        //db connection
        $conn = Db::connect();
        
        // Fetch all tasks with the given list ID
        $tasks = ToDo::getTasksByListId($id);

        // Loop through tasks and remove them
        foreach ($tasks as $task) {
            ToDo::removeTaskById($task['id']);
        }

        //insert query into db
        $query = $conn->prepare('DELETE FROM lists WHERE id = :id');

        //bind values to query
        $query->bindValue(':id', $id);

        //execute query
        $query->execute();

        //return array of tasks
        $list = $query->fetch(PDO::FETCH_ASSOC);

        //return todos
        return $list;
    }
}