<?php
include_once(__DIR__ . "/Db.php");
include_once(__DIR__ . "/Comments.php");
include_once(__DIR__ . "/TaskDone.php");

class ToDo{
    private $name;
    private $description;
    private $deadline;
    
    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        //check if name is empty
        if(empty($name)){
            throw new Exception("Name cannot be empty");
        } else {
            $this->name = $name;

            return $this;
        }
    }

    /**
     * Get the value of description
     */
    public function getdescription()
    {
        return $this->description;
    }

    /**
     * Set the value of task
     */
    public function setDescription($description): self
    {
        //check if task is empty
        if(empty($description)){
            throw new Exception("Task cannot be empty");
        } else {
            $this->description = $description;

            return $this;
        }
    }

    /**
     * Get the value of deadline
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set the value of deadline
     */
    public function setDeadline($deadline): self
    {
        //check if deadline is empty
        if(empty($deadline)){
            throw new Exception("Deadline cannot be empty");
        } else {
            $this->deadline = $deadline;

            return $this;
        }
    }

    public function save()
    {
        //db connection
        $conn = Db::connect();

        //insert query into db
        $query = $conn->prepare('INSERT INTO todo (name, description, deadline) VALUES (:name, :description, :deadline)');
        
        //bind values to query
        $name = $this->getName();
        $query->bindValue(':name', $name);

        $task = $this->getDescription();
        $query->bindValue(':description', $task);

        $deadline = $this->getDeadline();
        $query->bindValue(':deadline', $deadline);
        
        $result = $query->execute();
        
        // Return the ID of the newly inserted todo item
        if ($result) {
            return $conn->lastInsertId();
        } else {
            return false;
        }
    }

    //get all tasks from db
    public static function getTasks()
    {
        //db connection
        $conn = Db::connect();
        //insert query into db
        $query = $conn->prepare('SELECT * FROM todo');
        
        //bind values to query
        $query->execute();

        //return array of tasks
        $todos = $query->fetchAll(PDO::FETCH_ASSOC);

        //return todos
        return $todos;

    }

    //get task by id
    public static function getTaskById($id)
    {
        //db connection
        $conn = Db::connect();
        //insert query into db
        $query = $conn->prepare('SELECT * FROM todo WHERE id = :id');
        
        //bind values to query
        $query->bindValue(':id', $id);

        $query->execute();

        //return array of tasks
        $todo = $query->fetch(PDO::FETCH_ASSOC);

        //return todos
        return $todo;

    }

    //remove task by id
    public static function removeTaskById($id)
    {
        try { 
            //db connection
            $conn = Db::connect();
                    
            //if the todo has comments, delete them first
            $comments = Comment::getCommentsForTask($id);

            foreach ($comments as $comment) {
                Comment::removeCommentByTodoId($comment['todo_id']);
            }

            // remove done todo
            $doneTodo = Done::getDoneTodoById($id);
            if ($doneTodo) {
                $doneTodoObject = new Done();
                $doneTodoObject->setTodoId($id);
                $doneTodoObject->removeTodo();
            }

            //insert query into db
            $query = $conn->prepare('DELETE FROM todo WHERE id = :id');
            
            //bind values to query
            $query->bindValue(':id', $id);

            // execute query
            $queryResult = $query->execute();
            
            if ($queryResult) {
                return "Todo deleted successfully.";
            } else {
                return "Failed to delete todo.";
            }
        
        } catch (Throwable $t) {
            return false;
            var_dump($t->getMessage());
        }
    }

    //get tasks by list id
    public static function getTasksByListId($list_id)
    {
        //db connection
        $conn = Db::connect();
        //insert query into db
        $query = $conn->prepare('SELECT * FROM todo WHERE list_id = :list_id');
        
        //bind values to query
        $query->bindValue(':list_id', $list_id);

        //execute query
        $query->execute();

        //return array of tasks
        $todo = $query->fetchAll(PDO::FETCH_ASSOC);

        //return todos
        return $todo;

    }

}

