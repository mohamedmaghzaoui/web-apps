<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home page</title>
  <link rel="stylesheet" href="../todoList/Home.css">
</head>

<body>
  <!--navbar-->
  <ul class="navbar">
    <li id="home">Home</li>

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

    </li>
    <!--water animated words-->
    <div class="content">
      <h3 class="Organise">Organise</h3>
      <h3 class="Organise">Organise </h3>
      <h3 class="Productivity">Productivity</h3>
      <h3 class="Productivity">Productivity</h3>
      <h3 class="Efficiency">Efficiency</h3>
      <h3 class="Efficiency">Efficiency</h3>
    </div>
    <li><a href="Add.php">Add</a></li>
    <li><a href="list.php">Your list</a></li>

  </ul>
<!--show username-->
  <div class="username">
    <?php

    session_start();
    echo $_SESSION['username'];
    ?>
  </div>
  <!--footer-->
  <footer class="footer">
    <ul class="social-icon">
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-facebook"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-twitter"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-linkedin"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-instagram"></ion-icon>
        </a></li>
    </ul>

    <script src="../todoList/redirect.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <div class="contact">

      <div class="inner-contact ">

        <h1>Contact me</h1>
      </div>
      <!--logo-->
      <div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
          <defs>
            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
          </defs>
          <g class="parallax">
            <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
            <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
          </g>
        </svg>
      </div>

    </div>
    <div class="content flex">
      <p>By.Mohamed | Free to use </p>
    </div>
  </div>
</body>

</html>