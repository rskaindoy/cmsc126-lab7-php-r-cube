<?php
require_once 'db_connect.php';


//gets data from form
$student_id = $_POST['id'];

$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$course = $_POST['course'];
$yearlvl = $_POST['yearlvl'];
$grad_status = isset($_POST['grad_status']) ? 1 : 0;

// image check
$image_name = '';
$upload_path = '';

if (!empty($_FILES['image']['name'])) {

    $image_name = uniqid() . "_" . basename($_FILES['image']['name']);
    $upload_path = "uploads/" . $image_name;

    move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);
}

// var_dump($image_name); debug to check image

// update student data
$sql1 = "UPDATE students
SET name = '$name',
    age = '$age',
    email = '$email',
    course = '$course',
    year_lvl = '$yearlvl',
    grad_status = '$grad_status'
WHERE id = '$student_id'";

if ($conn->query($sql1) === TRUE) {

    //same logic as update image
    if (!empty($upload_path)) {
        $sql2 = "UPDATE student_images
                SET image_path = '$upload_path'
                WHERE student_id = '$student_id'";

        $conn->query($sql2);

        }
    echo "Updated successfully";

    } else {
        echo "Error: " . $conn->error;
    }

$conn->close();
?>