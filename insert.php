<?php
require_once 'db_connect.php';

// generate student id first
$year = date("Y");

// get last ID starting with current year
$sql = "SELECT id FROM students 
        WHERE id LIKE '$year%' 
        ORDER BY id DESC 
        LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastNumber = (int)substr($row['id'], 4);
    $newNumber = $lastNumber + 1;
} else {
    $newNumber = 1;
}

// format: 202400123
$student_id = $year . str_pad($newNumber, 5, "0", STR_PAD_LEFT);


// get form data
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$course = $_POST['course'];
$yearlvl = $_POST['yearlvl'];
$grad_status = isset($_POST['grad_status']) ? 1 : 0;

// handle file upload
$image_name = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];

$upload_path = "uploads/" . basename($image_name);
move_uploaded_file($image_tmp, $upload_path);

// insert into students table
$sql1 = "INSERT INTO students (id, name, age, email, course, year_lvl, grad_status)
VALUES ('$student_id', '$name', '$age', '$email', '$course', '$yearlvl', '$grad_status')";

if ($conn->query($sql1) === TRUE) {
    // insert into image table
    $sql2 = "INSERT INTO student_images (student_id, image_path)
    VALUES ('$student_id', '$upload_path')";

    if ($conn->query($sql2) === TRUE) {
        header("Location: home.html?status=success&id=" . $student_id);
        exit();
    } else {
        echo "Image insert error: " . $conn->error;
    }

} else {
    echo "Student insert error: " . $conn->error;
}

$conn->close();
?>