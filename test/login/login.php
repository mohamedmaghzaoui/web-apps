<?php
//include necessary files
include "loginUser.php";
include "loginManager.php";
//get data from form
$username = $_POST['username'];
$password = $_POST['password'];
//create new user and userManager
$user = new loginUser($username, $password);
$loginManager = new loginManager;
//login the user
$loginManager->loginUser($user);
//user session to get the username
session_start();
$_SESSION['username'] = $user->getUsername();
//go to the home.php file
header("location:../todoList/Home.php");

