<?php
//login user class
class loginUser
{
    //attributes
    protected $username;
    protected $password;
    //constructor
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
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
    
}
