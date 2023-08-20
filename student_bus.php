




<!DOCTYPE html>
<html>
<head>
  <title>Bus Location</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://kit.fontawesome.com/ff7bbf672f.js" crossorigin="anonymous"></script>

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
      height: 600px;
      width: 60vw;
      margin: auto;
      margin-top: 20px;
    }
    body {
      font-family: Arial, sans-serif;
      
    }
    h1 {
      text-align: center;
    }
    label {

            font-weight: bold;
        }
    form {
      text-align: center;
      margin-bottom: 20px;
    }
    input[type="text"] {
      padding: 5px;
      width: 200px;
    }
    button[type="submit"] {
      padding: 5px 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
    button[type="submit"]:hover {
      background-color: #45a049;
    }

    @media screen and (max-width: 980px) {
  /* Styles for mobile view */
  #map {
    height: 100vh;
    margin-top: 10px;
    width: 100%;
    z-index: -1;
  }

  #form_menu {
    margin-top: 30px;
  }
  form {
    text-align: center;
    margin-bottom: 20px;
  }
  
  label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }
  
  input[type="text"] {
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ccc;
    margin-bottom: 10px;
    width: 70%;
  }
  
  button[type="submit"] {
    padding: 8px;
    border-radius: 4px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    width: 50%;
  }
  
  button[type="submit"]:hover {
    background-color: #45a049;
  }
    }

  </style>
    <link rel="stylesheet" type="text/css" href="nav.css">
</head>

<body>
  <nav class="nav_bar flexsb">
  <div class="logo flexcm">
      <img src="http://www.srkrec.ac.in/idealab/assets/img/logo.png">
    </div>
    <div class="nav_menu flexcm">
      <a href="####" id="hmenu" class="menubar_1 menubar_2"><i class="fa-solid fa-bars"></i></a>
      <ul class="nav_links flexsa" id="navlink_1">
        <li class="nav_link"><a href="student_bus.php">Bus Location</a></li>
        <li class="nav_link"><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>

  <h1>Bus Location</h1>
  <form id="busForm" method="post">
    <label for="bus_number">Enter Bus Number:</label>
    <input type="text" name="bus_number" required>
    <button type="submit" name="submit">Get Location</button>
  </form>

  <div id="map"></div>


  <script>
      const menubar = document.getElementById("hmenu");
      const navmenu = document.getElementById("navlink_1");
  
  menubar.addEventListener("click", function() {
    navmenu.classList.toggle("navlinks800");
  });
  
    </script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

  <script>
    var map = null;
var marker = null;
var busNumber = null;

function showMap(latitude, longitude) {
  if (!map) {
    map = L.map("map").setView([latitude, longitude], 15);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(map);
  } else {
    
    if (!marker) {
    marker = L.marker([latitude, longitude]).addTo(map);
  } else {
    marker.setLatLng([latitude, longitude]);
  }

  marker.bindPopup("Bus Location").openPopup();
  }

  
}

function updateLocation() {
  // Make an AJAX request to fetch the updated bus location
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var response = JSON.parse(this.responseText);
      if (response.latitude && response.longitude) {
        showMap(response.latitude, response.longitude);
      } else {
        // Display an error message if the location is not found
        alert("Bus location not found for the specified bus number.");
      }
    }
  };
  xhttp.open("GET", "buslocation.php?bus_number=" + busNumber, true);
  xhttp.send();
}

function startLiveUpdate() {
  updateLocation();
  setInterval(updateLocation, 2000); // Update bus location every 2 seconds
}

document.getElementById("busForm").addEventListener("submit", function(event) {
  event.preventDefault();
  busNumber = document.querySelector("input[name='bus_number']").value;
  startLiveUpdate();
});

  </script>
    
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
