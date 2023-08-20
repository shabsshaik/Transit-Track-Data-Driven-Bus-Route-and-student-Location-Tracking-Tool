<?php
session_start();

// Check if the user is not authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redirect the user to the login page or display an access denied message
    header("Location: admin.php");
    exit();
}?>
<html>
<head>
<title>Student Form</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="nav.css">
  <script src="https://kit.fontawesome.com/ff7bbf672f.js" crossorigin="anonymous"></script>
<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

ul{
  list-style-type:none;
}
.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

.form-title {
  margin: 20px 0;
  text-align: center;
  text-decoration: underline;
}

.form-table {
  border: 0;
  box-shadow: 0 0 8px 0 #999;
  margin-top: 20px;
  width: 100%;
}

.form-table th,
.form-table td {
  padding: 10px;
}

.form-table input[type="text"],
.form-table input[type="tel"] {
  width: 100%;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.form-table input[type="text"]:read-only {
  background-color: #f1f1f1;
}

.submit-btn {
  margin-top: 20px;
  display: flex;
  justify-content: center;
}

.submit-btn input[type="submit"] {
  padding: 10px 20px;
  background-color: #333;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    list-style: none;
  }
  
  a {
    text-decoration: none;
    font-family: Poppins-Regular;
    font-size: 20px;
    line-height: 1.7;
    color: #020ef8;
    margin: 0;
    transition: all .4s;
    position: relative;
  }
  
  body {
    width: 100%;
    background-color: #fff;
  }
  

/* Mobile Compact View Styles */
@media (max-width: 1120px) {
  .container {
    padding: 10px;
  }

  .form-title {
    font-size: 20px;
  }

  .form-table th,
  .form-table td {
    padding: 8px;
  }

  .submit-btn input[type="submit"] {
    padding: 8px 16px;
  }
}
</style>

</style>
<link rel="stylesheet" type="text/css" href="nav.css">
</head>
<body>

<nav class="nav_bar  flexsb ">
        <div class="logo flexcm"><img src="http://www.srkrec.ac.in/idealab/assets/img/logo.png"></div>
    
        <div class="nav_menu flexcm">
            <a href="####" id="hmenu" class="menubar_1 menubar_2" ><i class="fa-solid fa-bars"></i></a>
            <ul class="nav_links flexsa" id="navlink_1">
                 <li class="nav_link"><a href="register.php">Student Register</a></li>
                 <li class="nav_link"><a href="bus.php">Bus Location</a> </li>
                 <li class="nav_link"><a href="student_info.php">Student Location</a></li>
                 <li class="nav_link"><a href="live_updateshtml.php">Live Updates</a> </li>    
                 <li class="nav_link"><a href="logout.php">Logout</a> </li>      
             </ul>

        </div>

    </nav>

<div class="container">
  <h1 class="form-title">UPLOAD STUDENT DETAILS FORM</h1>

  <form action="student_details.php" method="POST" enctype="multipart/form-data">
    <table class="form-table">
      <tr>
        <th>RFID:</th>
        <td><input type="text" name="r1" placeholder="Enter..." required></td>
      </tr>
      <tr>
        <th>REGISTRATION NUMBER:</th>
        <td><input type="text" name="r2" placeholder="Enter..." required></td>
      </tr>
      <tr>
        <th>FULL NAME:</th>
        <td><input type="text" name="r3" placeholder="Enter..." required></td>
      </tr>
      <tr>
        <th>BRANCH:</th>
        <td><input type="text" name="r4" placeholder="Enter..." required></td>
      </tr>
      <tr>
        <th>CONTACT NUM:</th>
        <td><input type="tel" name="r5" placeholder="Enter..." required></td>
      </tr>
    </table>
  
    <div class="submit-btn">
      <input type="submit" value="Submit" name="submit" style="background-color:green;">
    </div>
  </form>
</div>


<script>
    const menubar = document.getElementById("hmenu");
const navmenu = document.getElementById("navlink_1");

menubar.addEventListener("click", function() {
  navmenu.classList.toggle("navlinks800");
});

  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
