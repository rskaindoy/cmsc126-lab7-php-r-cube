<?php
$servername = "localhost"; // Name of the server
$username = "root"; // Username
$password = ""; // Password
// $dbname = ""; // add database name

// Create connection
$conn = new mysqli($servername, $username, $password);  // $dbname 

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";

// Close the connection
$conn->close()
?>