<?php
//include necessary files
include "loginUser.php";
include "loginManager.php";
//verify if it's post then get data from form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //get data from form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $newPassword = $_POST['password'];
    //  change the password of user
    $loginManager = new loginManager();
    $loginManager->changePassword($username, $email, $newPassword);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forget password</title>
    <link rel="stylesheet" href="forgetPassword.css">
</head>

<body>
    <!--navbar-->
    <ul class="navbar">
        <li id="home"><a href="../todoList/Home.php">Home</a></li>

        <li id="account">Account <span></span>
            <ul class="sub-menu">
                <a href="../login/loginInterface.php">
                    <li>logout</li>
                </a>
                <a href="../signup/signup.html">
                    <li>signup</li>
                </a>
            </ul>
        </li>
        <li id="list"><a href="../todoList/Add.php">Add</a></li>
        <li id="contactUs">Your List</li>

    </ul>
    <!--div for forget password-->
    <div class="sign_div">
        <h1>Chage password</h1>
        <form action="forgetPassword.php" method="post" novalidate onsubmit="return validateForm();">
            <label for="username">Username:</label><br>
            <input name="username" type="text" placeholder=" enter your username"><br>
  
            <label for="">Email:</label><br>
            <input type="email" name="email" : id="email" placeholder="enter your email"><br>
            <label for="password">new Password:</label><br>
            <input name="password" type="password" placeholder="enter your password"><br>
            <label for="repeatPassword">Repeat new password:</label><br>
            <input name="repeatPassword" type="password" placeholder="repeat your password"><br>
            
            <input name="submit" id="submitButton" type="submit" value="submit">
        </form>
    </div>
    <script src="validateSignup.js"></script> <!-- javascript file -->
    </head>
</body>

</html>