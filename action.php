<!-- for choosing which action to perform then calling the right script -->

<?php
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $id = $_POST['search_id'];

    if ($action == 'search') {
        include 'search.php'; 
    } elseif ($action == 'update') {
        header ('Location: update.php');  //goes to new page, i am not writing a js for this shit
        exit();
    }  //new page 
        elseif ($action == 'delete') {
        include 'delete.php';
    }
}
?>