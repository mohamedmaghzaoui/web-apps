<?php
//task class
class task
{
    //attributes
    protected $id;
    protected $userId;
    protected $content;
    protected $priority;
    protected $category;
    protected $day;
    //constructor
    public function __construct($userId, $content, $priority, $category, $day)
    {
        $this->userId = $userId;
        $this->content = $content;
        $this->priority = $priority;
        $this->category = $category;
        $this->day = $day;
    }
    //getters
    public function getContent(){
        return $this->content;
    }
    public function getPriority(){
        return $this->priority;
    }
    public function getCategory(){
        return $this->category;
    }
    public function getDay(){
        return $this->day;
    }
    public function getUserId(){
        return $this->userId;
    }
}
