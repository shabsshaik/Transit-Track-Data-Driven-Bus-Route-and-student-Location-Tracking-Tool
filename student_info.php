<?php
include 'database_config.php';

if (isset($_POST['submit'])) {
    $regNum = $_POST['regNum'];
    $date = $_POST['date'];

    // Prepare the SQL query
    $sql = "SELECT s.student_name, s.phone_no, l.latitude, l.longitude,DATE(l.timestamp) AS date, TIME(l.timestamp) AS time
            FROM student s
            INNER JOIN student_location l ON s.rfid = l.rfid
            WHERE s.reg_num = '$regNum' AND DATE(l.timestamp) = '$date'";

    // Execute the query
    $result = $conn->query($sql);
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Details and Location</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>

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
  
 
        #map {
            height: 350px;
            width:60vw;
            margin:auto;
            margin-top: 20px
        }
    </style>
 <style>
        #studentDetails table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        #studentDetails th {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        #studentDetails th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        #studentDetails td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
h2{
    text-align: center;
}
        #form_menu {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 50px;

        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        button[type="submit"] {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            width: 200px;
        }

        button[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }


        @media screen and (max-width: 980px) {
  /* Styles for mobile view */
  #map {
    height:70vh;
    margin-top: 10px;
    width: 100%;
  }

  #form_menu {
    margin-top: 30px;
  }

  #form_menu input[type="text"],
  #form_menu input[type="date"],
  #form_menu button[type="submit"] {
    width: 100%;
  }
}


    </style>
<script src="https://kit.fontawesome.com/ff7bbf672f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="nav.css">
</head>
<body>

<nav class="nav_bar  flexsb">
    <div class="logo flexcm">
      <img src="http://www.srkrec.ac.in/idealab/assets/img/logo.png">
    </div>
    <div class="nav_menu flexcm">
      <a href="####" id="hmenu" class="menubar_1 menubar_2"><i class="fa-solid fa-bars"></i></a>
      <ul class="nav_links flexsa" id="navlink_1">
        <li class="nav_link"><a href="register.php">Student Register</a></li>
        <li class="nav_link"><a href="bus.php">Bus Location</a></li>
        <li class="nav_link"><a href="student_info.php">Student Location</a></li>
        <li class="nav_link"><a href="live_updateshtml.php">Live Updates</a></li>
        <li class="nav_link"><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>
  <div id=form_menu>
    <h1>Student Location</h1>

    <form method="post">
        <label for="regNum">Register Number:</label>
        <input type="text" id="regNum" name="regNum" />

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" />

        <button type="submit" name="submit">Search</button>
    </form>
    </div>

    <script src="https://kit.fontawesome.com/ff7bbf672f.js" crossorigin="anonymous"></script>

    <script>
        const menubar=document.getElementById("hmenu");
        const navmenu=document.getElementById("navlink_1")
        const navlink=document.getElementsByClassName("nav_link")
     //   console.log(menubar);
    
        menubar.addEventListener("click", function(){ 
            navmenu.classList.toggle("navlinks800");
          
        });
    </script>
    <div id="studentDetails">
        <?php
        if (isset($result) && $result->num_rows > 0) {
            echo "<h2>Student Details</h2>";
            echo "<table>";
            echo "<tr><th>Student Name</th><th>Mobile Number</th><th>Date</th><th>Time</th><th>URL</th></tr>";

            while ($row = $result->fetch_assoc()) {
                $lat = $row["latitude"];
                $lng = $row["longitude"];

                echo "<tr>";
                echo "<td>" . $row['student_name'] . "</td>";
                echo "<td>" . $row['phone_no'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo "<td><a href='#' onclick='showMap(" . $lat . ", " . $lng . ")'>Show Map</a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
        echo "<h2>No data found.</h2>";
        }
        ?>
    </div>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = null;

        function showMap(latitude, longitude) {
            if (!map) {
                map = L.map("map").setView([latitude, longitude], 15);

                L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                    maxZoom: 18,
                }).addTo(map);
            } else {
                map.setView([latitude, longitude], 15);
            }

            var marker = L.marker([latitude, longitude]).addTo(map);
            marker.bindPopup("Student Location").openPopup();
        }
    </script>
</body>
</html>
