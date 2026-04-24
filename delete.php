<?php
require_once 'db_connect.php';


if (isset($_POST['search_id'])) {
    $search_id = $_POST['search_id'];

    // get the student info and the image path at the same time
    $sql1 = "SELECT students.name, students.age, students.email, students.course, 
                    students.year_lvl, students.grad_status, student_images.image_path 
            FROM students 
            JOIN student_images ON students.id = student_images.student_id 
            WHERE students.id = '$search_id'";

    $result = $conn->query($sql1);


    if ($result->num_rows > 0) {
        // display stud data
        $sql2 = "DELETE students
            FROM students
            JOIN student_images ON students.id = student_images.student_id 
            WHERE students.id = '$search_id'";

        $conn->query($sql2);
        echo "Student successfully deleted!";
    } else {
        echo "No student found with given ID: " . $search_id;
    }
}



$conn->close();
?>