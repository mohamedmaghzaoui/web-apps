<?php
session_start();

// Check if the user is not logged in if yes exit
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: ../login/loginInterface.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../todoList/Add.css">
</head>

<body>
    <!--navbar-->
    <ul class="navbar">
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
        <li id="Add">Add</li>
        <a href="list.php">
            <li id="contactUs">Your List</li>
        </a>


    </ul>
    <!--todolist form-->
    <form class="todo" action="list.php" method="POST">
        <h2>TaskEase</h2><br>
        <img src="icon.png" alt=""><br>
        <div class="content">
            <input for="content" type="text" name="content" id="task" placeholder="Add your task">
            <input type="submit" value="add" name="submit" id="submit">


        </div>
        <div class="others"></div>
        <div class="days">
            <label id="day" for="day">day</label>
            <select name="day" id="selectDay">
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
        </div>
        <div class="priority">
            <label id="priorityLabel" for="priorityLabel">priority</label>
            <select name="priority" id="selectPriority">
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>
        <div class="category">
            <label id="category" for="category">Category</label>
            <select name="category" id="selectCategories">
                <option value="work">Work</option>
                <option value="Fitness">Fitness</option>
                <option value="Shopping">Shopping</option>
                <option value="Health">Health</option>
                <option value="Education">Education</option>
                <option value="Hobbies">Hobbies</option>
                <option value="Projects">Projects</option>
                <option value="Others">Others</option>
            </select>
        </div>

    </form>
    <!--show the username in the page-->
    <div class="username">
        <?php
        echo $_SESSION['username'];
        ?>
    </div>
</body>

</html>