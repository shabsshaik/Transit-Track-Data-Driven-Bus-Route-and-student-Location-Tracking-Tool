
<?php
session_start();

// Check if the user is not authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redirect the user to the login page or display an access denied message
    header("Location: student_login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="index_style.css">
    <link rel="stylesheet" type="text/css" href="nav.css">

    <script src="https://kit.fontawesome.com/ff7bbf672f.js" crossorigin="anonymous"></script>





</head>
<body>

<nav class="nav_bar  flexsb ">
        <div class="logo flexcm"><img src="http://www.srkrec.ac.in/idealab/assets/img/logo.png
          "></div>
        
        
        
        <div class="nav_menu flexcm">
            <a href="####" id="hmenu" class="menubar_1 menubar_2" ><i class="fa-solid fa-bars"></i></a>
            <ul class="nav_links flexsa" id="navlink_1">
                 <li class="nav_link"><a href="bus.php">Bus Location</a> </li>
                   
                 <li class="nav_link"><a href="logout.php">Logout</a> </li>      
             </ul>

        </div>

    </nav>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
      <ol class="carousel-indicators">
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="http://www.adit.ac.in/assets/images/idealab/IDEA_LAB_BANNER.png" class="d-block w-100" alt="First slide">
          <div class="carousel-caption d-none d-md-block"></div>
        </div>
        <div class="carousel-item">
          <img src="https://idealnetapi.aicte-india.org//files/home_banners/Banner_1664951236.jpg" class="d-block w-100" alt="Second slide">
          <div class="carousel-caption d-none d-md-block"></div>
        </div>
        <div class="carousel-item">
          <img src="https://srkrec.edu.in/img/slides/5.jpg" class="d-block w-100" alt="Third slide">
          <div class="carousel-caption d-none d-md-block"></div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>
  
    <div class="about">
      <img src="https://idealnet.aicte-india.org/assets//main_logo.png" alt="IDEALAB Logo">
      <h2 class="page-header">About Us</h2>
      <p>
        IDEALAB is an initiative launched by the All India Council for Technical Education (AICTE), which is a statutory body under the Ministry of Education, Government of India. IDEALAB stands for "Innovation, Design, Entrepreneurship, and Action Lab."
      </p>
      <p class="page">
        The primary goal of IDEALAB is to foster a culture of innovation, design thinking, and entrepreneurship among students and educators in the technical education ecosystem. It serves as a platform for nurturing and supporting innovative ideas, transforming them into viable projects, and ultimately creating a positive impact on society.
  
        At IDEALAB, students and educators are encouraged to explore their creative potential and develop innovative solutions to real-world challenges.
      </p>
      <p class="page">
        The lab provides a collaborative environment where individuals can brainstorm ideas, conduct research, experiment with prototypes, and refine their concepts.
  
        IDEALAB offers various programs, workshops, and resources to facilitate the innovation process. These include mentoring and guidance from industry experts, access to state-of-the-art facilities and equipment, funding opportunities for selected projects, and networking events to connect with like-minded individuals and organizations.
  
        By promoting a multidisciplinary approach, IDEALAB aims to bridge the gap between academia and industry, encouraging the development of innovative and sustainable solutions that address societal needs. It emphasizes the importance of hands-on learning, critical thinking, and problem-solving skills, empowering students to become future leaders and entrepreneurs.
      </p>
    </div>
  
    <footer class="fcontainer">
      <div class="ficons">
        <div>
          <a href="#"><i class="fa-brands fa-facebook"></i></a>
          <a href="#"><i class="fa-brands fa-twitter"></i></a>
          <a href="#"><i class="fa-brands fa-snapchat"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
          <a href="#"><i class="fa-sharp fa-solid fa-house"></i></a>
        </div>
        <p class="copyright">Connect © 2018</p>
      </div>
    </footer>
















    <script>
        const menubar=document.getElementById("hmenu");
        const navmenu=document.getElementById("navlink_1")
        const navlink=document.getElementsByClassName("nav_link")
     //   console.log(menubar);
    
        menubar.addEventListener("click", function(){ 
            navmenu.classList.toggle("navlinks800");
          
        });
    </script>
</body>




</html>