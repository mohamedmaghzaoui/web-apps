<?php
//task manager
class taskManager
{

    protected $db;
    protected $connected;

    public function __construct()
    {
        // Connect to the database
        $dbname = "site";
        $port = 8889;
        $username = "root";
        $password = "root";
        try {
            $this->setDb(new PDO("mysql:host=localhost;dbname=$dbname;port=$port", $username, $password));
            $this->connected = true;
        } catch (PDOException $error) {
            echo $error->getMessage();
            $this->connected = false;
        }
    }

    public function setDb($db)
    {
        $this->db = $db;
    }

    public function isConnected()
    {
        return $this->connected;
    }
    //add a task to database
    public function addTask(Task $task)
    {
        $userId = $task->getUserId();
        $content = $task->getContent();
        $priority = $task->getPriority();
        $category = $task->getCategory();
        $day = $task->getDay();

        // Insert the task data into the database
        $sql = "INSERT INTO tasks (idUser, content, priority, category, day) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId, $content, $priority, $category, $day]);

    }
    //get a task using a userid
    public function getTasksByUserId($userId)
    {
        $sql = "SELECT * FROM tasks WHERE idUser = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //delete a task using a taskid
    public function deleteTask($taskId)
    {
        $sql = "DELETE FROM tasks WHERE Id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$taskId]);
    }
}
