<?php
include 'database_config.php';
// Check if the user is not authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redirect the user to the login page or display an access denied message
    header("Location: admin.php");
    exit();
}

$sql = "SELECT * FROM student_location  ORDER BY timestamp DESC limit 10";
$result = $conn->query($sql);

$changes = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $changes[] = $row;
    }
}

// Return the changes as JSON
header('Content-Type: application/json');
echo json_encode($changes);
?>
