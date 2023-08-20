<!DOCTYPE html>
<?php
session_start();

// Check if the user is not authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redirect the user to the login page or display an access denied message
    header("Location: admin.php");
    exit();
}
?>
<html>
<head>
    <title>Live Changes</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to fetch changes and update the webpage
            function fetchChanges() {
                $.ajax({
                    url: "live_updates.php",
                    type: "GET",
                    dataType: "json",
                    success: function(changes) {
                        if (changes !== null && changes.length > 0) {
                            // Clear the table body
                            $("#latest-change-table tbody").empty();

                            // Iterate over each change
                            for (var i = 0; i < changes.length; i++) {
                                var change = changes[i];
                                // Extract the information of the change
                                var id = change['id'];
                                var rfid = change['rfid'];
                                var regnum = change['reg_num'];
                                var lat = change['latitude'];
                                var lon = change['longitude'];
                                var timestamp = change['timestamp'];

                                // Create a row for the change
                                var row = "<tr>" +
                                    "<td>" + id + "</td>" +
                                    "<td>" + rfid + "</td>" +
                                    "<td>" + regnum + "</td>" +
                                    "<td>" + lat + "</td>" +
                                    "<td>" + lon + "</td>" +
                                    "<td>" + timestamp + "</td>" +
                                    "</tr>";
                                // Append the row to the table body
                                $("#latest-change-table tbody").append(row);
                            }
                        }
                    }
                });
            }
            
            // Fetch changes initially
            fetchChanges();
            
            // Fetch changes every 5 seconds (adjust the interval as needed)
            setInterval(fetchChanges, 5000);
        });
    
    </script>
     <link rel="stylesheet" type="text/css" href="nav.css">
    <link rel="stylesheet" type="text/css" href="index_style.css">
<style>
    /* Add styles for the table */
#latest-change-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

#latest-change-table th,
#latest-change-table td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

#latest-change-table th {
  background-color: #f2f2f2;
}

/* Add styles for table responsiveness */
@media only screen and (max-width: 768px) {
  #latest-change-table {
    font-size: 12px;
  }
}

/* Add styles for table lines */
#latest-change-table td,
#latest-change-table th {
  border: 1px solid #ddd;
}

#latest-change-table tbody tr:nth-child(even) {
  background-color: #f2f2f2;
}


    </style>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="index_style.css">
 
  <script src="https://kit.fontawesome.com/ff7bbf672f.js" crossorigin="anonymous"></script>
</head>
<body>



    
    <nav class="nav_bar  flexsb ">
        <div class="logo flexcm"><a href="index.html"><img src="http://www.srkrec.ac.in/idealab/assets/img/logo.png
            "></a></div>
        
        
        
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
    <div  id='tab'>
    <table id="latest-change-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>RFID</th>
                <th>Reg Number</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            <!-- The table rows will be dynamically displayed here -->
        </tbody>
    </table>


    </div>
    <script>
    const menubar = document.getElementById("hmenu");
const navmenu = document.getElementById("navlink_1");

menubar.addEventListener("click", function() {
  navmenu.classList.toggle("navlinks800");
});
</script>
    
</body>
</html>
