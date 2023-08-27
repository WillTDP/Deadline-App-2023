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
        //check if email is empty
        if(empty($email)){
            throw new Exception("Email cannot be empty");
        } else {
            $this->email = $email;

            return $this;
        }
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
        //check if password is empty
        if(empty($password)){
            throw new Exception("Password cannot be empty");
        } else {
            $this->password = $password;

            return $this;
        }
    }

    public static function canLogin($username, $password) {
        $conn = Db::connect();
        $query = $conn->prepare('SELECT * FROM users WHERE email = :email');
        $query->bindValue(':email', $username);
        $query->execute();
        $user = $query->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                return true;
            }
        }

        return false;
    }

    public static function signUp($email, $password) {
        $conn = Db::connect();
        $query = $conn->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
        $query->bindValue(':email', $email);
        $query->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
        $result = $query->execute();

        return $result;
    }


    
}