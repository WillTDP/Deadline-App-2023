<?php
include_once(__DIR__ . "/Db.php");
Class User {
    private $email;
    private $password;
    

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    public function save(){
        $conn = Db::connect();
        $stmt = $conn->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');

        $email = $this->getEmail();
        $password = $this->getPassword();

        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);

        $result = $stmt->execute();
        return $result;
    }
}