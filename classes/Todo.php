<?php
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
        $this->name = $name;

        return $this;
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
        $this->description = $description;

        return $this;
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
        $this->deadline = $deadline;

        return $this;
    }

    public function save()
    {
        //db connection
        $conn = new PDO('mysql:host=localhost;dbname=deadline_app_2023', 'root', 'root');

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

        //return true or false
        return $result;
    }

    public static function getTasks()
    {
        //db connection
        $conn = new PDO('mysql:host=localhost;dbname=deadline_app_2023', 'root', 'root');

        //insert query into db
        $query = $conn->prepare('SELECT * FROM todo');
        
        //bind values to query
        $query->execute();

        //return array of tasks
        $todos = $query->fetchAll(PDO::FETCH_ASSOC);

        //return todos
        return $todos;

    }

}