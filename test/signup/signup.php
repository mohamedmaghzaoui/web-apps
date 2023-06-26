<?php
//get data and verify it
include "classUser.php";
include "userManager.php";
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$gender=$_POST['gender']; 
if(empty($_POST['username'])){
    die("no username");
}
if(empty($_POST['gender'])){
    die("select gender");
}
if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    die("email not valid");
}
if(strlen($_POST['password'])<6){
    die("password must me more than 6 caracters");
}
if($_POST['password']!==$_POST['repeatPassword']){
    die("passwords dont match");
}
//hash the password
$hashedPassword=password_hash($_POST['password'],PASSWORD_DEFAULT);
//create new user and userManager and add the user
$user = new user($username, $hashedPassword, $email, $gender);

$userManager = new userManager();
if (!$userManager->isConnected()) {
    die("Failed to connect to the database");
}

$userManager->addUser($user);

if($user->getGender()=='Man'){
    $_SESSION['gender']='Mr.';
}else{
    $_SESSION['gender']='Mrs.';
}
//go to loginInterface.php
echo '<script>alert("signup succecful!");</script>';
header("location:../login/loginInterface.php");
?>

