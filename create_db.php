<?php
require_once 'config.php';      // reuse the connection

// create database
$sql = "CREATE DATABASE studentDB";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
