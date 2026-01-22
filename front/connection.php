<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "als";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // If connection fails, stop execution and display an error message (for debugging)
    // In a live environment, you should log the error and display a generic message.
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Set character set to UTF-8 for better handling of different languages
$conn->set_charset("utf8mb4");

// The $conn variable is now available for use in files that include 'connection.php'

?>
