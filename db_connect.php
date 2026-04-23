<?php
$servername = "localhost";  // name of the server
$username = "root";         // un
$password = "";             // pw
$dbname = "studentDB";      // database name

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully! <br/>";

// close the connection $conn->close()
?>
