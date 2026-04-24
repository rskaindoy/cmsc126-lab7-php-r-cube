<?php
require_once 'db_connect.php';

$row = null;

if (isset($_POST['search_id'])) {
    $search_id = $_POST['search_id'];

    $sql = "SELECT students.id, students.name, students.age, students.email, students.course, 
                    students.year_lvl, students.grad_status, student_images.image_path 
            FROM students 
            JOIN student_images ON students.id = student_images.student_id 
            WHERE students.id = '$search_id'";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Student not found.");
    }
}
?>



<h2>Edit Info</h2>
<!-- same core code as home html, except there are predefined values and user edits them -->
<?php if ($row): ?>

    <img src="<?php echo $row['image_path']; ?>" width="100"><br><br>

    <form method="POST" action="update_student.php" enctype="multipart/form-data">
        <label for="name">Name </label><br>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" maxlength="40"><br><br>
            
            <label for="age">Age </label><br>
            <input type="number" id="age" name="age" min="0" max="99" value="<?php echo $row['age']; ?>"><br><br>

            <label for="email">Email </label><br>
            <input type="email" id="email" name="email" maxlength="40" value="<?php echo $row['email']; ?>"><br>
            
            <h4>ACADEMIC INFORMATION</h4>

            <label for="course">Course </label><br>
            <input type="text" id="course" name="course" value="<?php echo $row['course']; ?>" maxlength="40"><br><br>

            <label for="yearlvl">Year Level </label><br>
            <select id="yearlvl" name="yearlvl"> 
                <!-- preselects og value -->
                <option value="1" <?php if($row['year_lvl']==1) echo "selected"; ?>>I</option>
                <option value="2" <?php if($row['year_lvl']==2) echo "selected"; ?>>II</option>
                <option value="3" <?php if($row['year_lvl']==3) echo "selected"; ?>>III</option>
                <option value="4" <?php if($row['year_lvl']==4) echo "selected"; ?>>IV</option>
            </select><br><br>

            <label for="grad">Graduating this year? </label><br>
            <input type="checkbox" id="grad" name="grad_status" value="1" <?php if ($row['grad_status'] == 1) echo "checked"; ?>>


            <h4>PROFILE PHOTO</h4>

            <label for="image">Profile Image </label>
            <input type="file" name="image" accept="image/*"><br><br>



        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <button type="submit">Save Changes</button>
    </form>

<?php else: ?>

    <p>No student data loaded. Please search first.</p>

<?php endif; ?>

