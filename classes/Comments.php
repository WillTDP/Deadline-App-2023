<?php
include_once(__DIR__ . "/../classes/Db.php");

class Comment {
    private $text;
    private $todo_id;

    /**
     * Get the value of text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     */
    public function setText($text): self
    {
        $this->text = $text;

        return $this;
    }

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

    public function save(){
        $conn = Db::connect();
        $stmt = $conn->prepare('INSERT INTO comments (text, todo_id) VALUES (:text, :todo_id)');

        $text = $this->getText();
        $todo_id = $this->getTodoId();

        $stmt->bindValue(':text', $text);
        $stmt->bindValue(':todo_id', $todo_id);

        $result = $stmt->execute();
        return $result;
    }
}