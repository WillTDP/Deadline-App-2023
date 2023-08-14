<?php
class ToDo{
    private $name;
    private $task;
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
     * Get the value of task
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Set the value of task
     */
    public function setTask($task): self
    {
        $this->task = $task;

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
}