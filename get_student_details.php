<?php
include 'database_config.php';

if(isset($_POST['submit']))
{

    alert("Please enter");
    $regNum = $_POST['regnum'];
    $date = $_POST['date'];


// $regNum = isset($_GET['regNum']) ? $_GET['regNum'] : '';
// $date = isset($_GET['date']) ? $_GET['date'] : '';


// Create a new MySQLi instance
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL query
$sql = "SELECT s.student_name, s.phone_no, l.latitude, l.longitude
        FROM student s
        INNER JOIN student_location l ON s.rfid = l.rfid
        WHERE s.reg_num = '$regNum' AND DATE(l.timestamp) = '$date'";

// Execute the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Student Name</th><th>Mobile Number</th><th>Latitude</th><th>Longitude</th><th>URL</th></tr>";
    
    // Loop through the rows and add table rows
    while ($row = $result->fetch_assoc()) {
        $location = [
            "student_name" => $row["student_name"],
            "mobile_no" => $row["phone_no"],
            "latitude" => $row["latitude"],
            "longitude" => $row["longitude"]
        ];
        $lat = $row["latitude"];
        $lng = $row["longitude"];
        
        echo "<tr>";
        echo "<td>" . $row['student_name'] . "</td>";
        echo "<td>" . $row['phone_no'] . "</td>";
        echo "<td>" . $row['latitude'] . "</td>";
        echo "<td>" . $row['longitude'] . "</td>";
        echo "<td><a href='#' onclick='showMap(" . $lat . ", " . $lng . ")'>Show Map</a></td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    //$alert = "<script>alert('NO DATA');</script>";
    echo $regNum;
    echo $date;
}

$conn->close();

}
?>
