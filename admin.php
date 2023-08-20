<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ff7bbf672f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" type="text/css" href="nav.css">
</head>
<body>
<nav class="nav_bar">
    <div class="logo">
      <img src="http://www.srkrec.ac.in/idealab/assets/img/logo.png">
    </div>

    <div class="nav_menu flexcm">
      <a href="####" id="hmenu" class="menubar_1 menubar_2"><i class="fa-solid fa-bars"></i></a>
      <ul class="nav_links flexsa" id="navlink_1">
        <li class="nav_link"><a href="index.html">Home</a></li>
        <li class="nav_link"><a href="admin.php">Admin Login</a></li>
        <li class="nav_link"><a href="student_login.php">Student Login</a></li>
        <li class="nav_link"><a href="">About Us</a></li>
      </ul>
    </div>
  </nav>




<?php
    include 'database_config.php';
    
    if (isset($_POST['submit'])) {
        $user = $_POST['username'];
        $pass = $_POST['pass'];
    
        $sql = "SELECT * FROM admin_log where admin='$user' and password='$pass'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $_SESSION['authenticated'] = true;

            header("Location: admin_home.php");
        } else {
            
            $alert='<script>alert("Please Enter Valid Username And Password...!!");</script>';
            echo $alert;
            
        }
    }
    
    $conn->close();
    ?>


    

 
    <div class="login">
        <div class="loginpic">
            <img src="images/img-01.png" alt="IMG">
        </div>

        <form class="loginform" method="post">
            <span class="logintitle">Admin Login</span>
            <div class="cinput100">
                <input class="input100" type="text" name="username" placeholder="Username">
            </div>
            
            <div class="cinput100" data-validate="Password is required">
                <input class="input100" type="password" name="pass" placeholder="Password">
            </div>
            
            <div class="container-loginbtn">
                <button class="lbtn" type="submit" name="submit">Login</button>
            </div>
        </form>
    </div>

    

    <script>
        const menubar = document.getElementById("hmenu");
        const navmenu = document.getElementById("navlink_1");
        const navlink = document.getElementsByClassName("navlink");
    
        menubar.addEventListener("click", function() { 
            navmenu.classList.toggle("navlinks800");
        });
    </script>
</body>
</html>
