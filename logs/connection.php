<?php
// Database credentials - REPLACE THESE WITH YOUR ACTUAL VALUES
$servername = "localhost";
$username = "root"; // Common default for development
$password = "";     // Common default for development (no password)
$dbname = "als";    // Database name assumed from your context

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection (Note: We do not exit here, allowing login.php to handle the error message gracefully)
if ($conn->connect_error) {
    // Log the error but do not output anything yet.
    error_log("Connection failed: " . $conn->connect_error);
}
?>