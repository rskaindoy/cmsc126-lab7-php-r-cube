<?php
require_once 'db_connect.php'; // Reuse the connection

// im not sure yet wait
// Create database
$sql = "CREATE DATABASE db_name";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// Create Tables2
/**
 * $sql = "CREATE TABLE Characters (
 * id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 * name VARCHAR(30) NOT NULL,
 * class VARCHAR(30) NOT NULL,
 * email VARCHAR(50),
 * reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE
 * CURRENT_TIMESTAMP
 * )";
 * 
 * if ($conn->query($sql) === TRUE) {
 * echo "Database table created successfully";
 * } else {
 * echo "Error creating table: " . $conn->error;
 * }
 */
?>