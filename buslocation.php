<?php
// Establish a database connection
include 'database_config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["bus_number"])) {
  // Retrieve the bus number from the query parameter
  $busNumber = $_GET["bus_number"];

  // Fetch the latest coordinates for the specified bus number
  $sql = "SELECT latitude, longitude FROM buses WHERE bus_number = '$busNumber' ORDER BY timestamp DESC LIMIT 1";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $latitude = $row["latitude"];
    $longitude = $row["longitude"];

    // Return the latitude and longitude as JSON response
    $response = array("latitude" => $latitude, "longitude" => $longitude);
    echo json_encode($response);
    exit;
  }
}

// If no bus location is found, return an empty response
$response = array("latitude" => null, "longitude" => null);
echo json_encode($response);

$conn->close();
?>
