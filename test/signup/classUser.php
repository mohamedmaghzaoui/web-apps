<?php
//sighnuser class
class user
{
    //attributes
    protected $username;
    protected $password;
    protected $email;
    protected $gender;
    //constructor
    public function __construct($username, $password, $email, $gender)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->gender = $gender;
    }
    //hash a password
    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }
    //getters
    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getGender()
    {
        return $this->gender;
    }
}
