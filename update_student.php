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
$image_name = $_FILES['image']['name'] ?? '';
$image_tmp = $_FILES['image']['tmp_name'] ?? '';

//only updates if something was uploaded
if (!empty($image_name)) {
    $upload_path = "uploads/" . basename($image_name);
    move_uploaded_file($image_tmp, $upload_path);
}

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
    if (!empty($image_name)) {
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