<?php
require_once 'db_connect.php';


if (isset($_POST['search_id'])) {
    $search_id = $_POST['search_id'];

    // get the student info and the image path at the same time
    $sql = "SELECT students.name, students.age, students.email, students.course, 
                   students.year_lvl, students.grad_status, student_images.image_path 
            FROM students 
            JOIN student_images ON students.id = student_images.student_id 
            WHERE students.id = '$search_id'";

    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        // display stud data
        while($row = $result->fetch_assoc()) {
            echo "<h3>Student Profile</h3>";
            echo "<img src='" . $row["image_path"] . "' width='200' alt='Student Photo'><br><br>";
            echo "<b>Name:</b> " . $row["name"]. "<br>";
            echo "<b>Age:</b> " . $row["age"]. "<br>";
            echo "<b>Email:</b> " . $row["email"]. "<br>";
            echo "<b>Course:</b> " . $row["course"]. "<br>";
            echo "<b>Year Level:</b> " . $row["year_lvl"]. "<br>";
            echo "<b>Graduation Status:</b> " . ($row["grad_status"] ? "Graduated" : "Undergraduate") . "<br>";
        }
    } else {
        echo "No student found with given ID: " . $search_id;
    }
}



$conn->close();
?>