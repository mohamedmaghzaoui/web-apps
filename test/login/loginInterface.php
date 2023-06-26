<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="Login.css">
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
    <!--loginForm-->
    <div id="first">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <div class="inputs">
                <input type="text" placeholder="username" name="username">
                <input id="password" type="password" placeholder="password" name="password">

                <input id="loginButton" type="submit" value="login">
            </div>
            <p>Don't have an account</p>
            <p id="forget"><a href="forgetPassword.html">Forgot Password?</a></p>
            <i class="far fa-eye" id="togglePassword" style="cursor: pointer;"></i>
        </form>
    </div>

    <button class="sign"><a href="../signup/signup.html"><span>sign up</span></a></button>
    <!--script files-->
    <script src="button_effect.js"></script>
    <script src="showPassword.js"></script> 
</body>

</html>