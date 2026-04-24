<?php
require_once 'db_connect.php';

// student table
// id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, previously the PK
// code = student ID like 2024-XXXXX
$sql1 = "CREATE TABLE students (
            id VARCHAR(20) UNIQUE PRIMARY KEY,
            name VARCHAR(40) NOT NULL,
            age INT(2) CHECK (age >= 0 AND age <= 99),
            email VARCHAR(40) NOT NULL UNIQUE,
            course VARCHAR(40) NOT NULL,
            year_lvl INT(1) NOT NULL,
            grad_status BOOLEAN DEFAULT 0
        )";

// images table
$sql2 = "CREATE TABLE student_images (
    image_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(20),
    image_path VARCHAR(255) NOT NULL,
    FOREIGN KEY (student_id) REFERENCES students(id)
    ON DELETE CASCADE
)";

if ($conn->query($sql1) === TRUE) {
    echo "Students table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br";
}

if ($conn->query($sql2) === TRUE) {
    echo "Images table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br";
}

$conn->close();
?>