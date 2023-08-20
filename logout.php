<?php
session_start();

// Check if the user is not authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redirect the user to the login page or display an access denied message
    header("Location:index.html ");
    exit();
}
// Destroy all session data
session_destroy();

// Redirect to the login page or any other desired page
header("Location: index.html");
exit();
?>