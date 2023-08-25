<?php
include_once(__DIR__ . "/Db.php");

class Done {
    private $todo_id;
    private $done;
    

    /**
     * Get the value of todo_id
     */
    public function getTodoId()
    {
        return $this->todo_id;
    }

    /**
     * Set the value of todo_id
     */
    public function setTodoId($todo_id): self
    {
        $this->todo_id = $todo_id;

        return $this;
    }

    /**
     * Get the value of done
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Set the value of done
     */
    public function setDone($done): self
    {
        $this->done = $done;

        return $this;
    }

    public function save(){
        $conn = Db::connect();
        $stmt = $conn->prepare('INSERT INTO done (todo_id) VALUES (:todo_id)');
    
        $todo_id = $this->getTodoId(); // Use the getter method to retrieve the value
    
        $stmt->bindValue(':todo_id', $todo_id, PDO::PARAM_INT); // Use the local variable $todo_id
    
        $result = $stmt->execute();
        return $result;
    }
    
    public function saveTodo(){
        // Update the "todo" table to set the "done" column to 1
        $conn = Db::connect();
        $stmt = $conn->prepare('UPDATE todo SET done = 1 WHERE id = :todo_id');

        $todo_id = $this->getTodoId();

        $stmt->bindValue(':todo_id', $todo_id, PDO::PARAM_INT);
        $updateResult = $stmt->execute();
    }
}