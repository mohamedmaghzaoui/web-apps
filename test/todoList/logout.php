<?php
//when logout set the username to ""
session_start();
$_SESSION['username'] = "";
header("Location: ../login/loginInterface.php");
exit();
