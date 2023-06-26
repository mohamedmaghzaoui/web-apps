<?php
/* display php errors*/
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the user is not logged in
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: ../login/loginInterface.php");
    exit();
}
//include files
include "task.php";
include "taskManager.php";
//get userid
$userid = $_SESSION['userId'];
$taskManager = new taskManager();

// Check if the delete button is clicked
if (isset($_POST['delete'])) {
    $taskId = $_POST['delete'];

    // Delete the task using task id
    $taskManager->deleteTask($taskId);
}
//verify then get data
if (!empty($_POST['content'])) {
    $content = $_POST['content'];
    $priority = $_POST['priority'];
    $category = $_POST['category'];
    $day = $_POST['day'];
    //create ne task
    $task = new task($userid, $content, $priority, $category, $day);
    //add task to database
    $taskManager->addTask($task);
}
//get all the tasks of a particulat userid 
$tasks = $taskManager->getTasksByUserId($userid);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link rel="stylesheet" href="list.css">
</head>

<body>
    <!--navbar-->
    <ul class="navbar">
        <div class="username">
            <?php echo $_SESSION['username']; ?>
        </div>
        <li id="home"><a href="Home.php">Home</a></li>

        <li id="account">Account <span></span>
            <ul class="sub-menu">
                <a href="../login/loginInterface.php">
                    <li>login</li>
                </a>
                <a href="../signup/signup.html">
                    <li>signup</li>
                </a>
                <a href="../todoList/logout.php">
                    <li>logout</li>
                </a>
            </ul>
            <a href="Add.php">
        <li>Add</li>
        </a>
        <li id="list">Your List</li>
    </ul>
    <!--php code to display all  tasks of userid -->
    <?php foreach ($tasks as $task) : ?>
        <div class="task-item">
            <p id="content"><?php echo $task['content']; ?></p>
            <div class="others">
                <h3>Priority:</h3>
                <p><?php echo $task['priority']; ?></p>
                <h3>Category:</h3>
                <p><?php echo $task['category']; ?></p>
                <h3>Day:</h3>
                <p><?php echo $task['day']; ?></p>
            </div>

            <!-- delet button with form to delete a task -->
            <form action="" method="POST">
                <input type="hidden" name="delete" value="<?php echo $task['id']; ?>">

                <button id="delete" type="submit">Delete</button>
            </form>
        </div>
    <?php endforeach; ?>
</body>

</html>