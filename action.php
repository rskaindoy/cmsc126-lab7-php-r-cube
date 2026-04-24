<!-- for choosing which action to perform then calling the right script -->

<?php
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $id = $_POST['search_id'];

    if ($action == 'search') {
        include 'search.php'; 
    } elseif ($action == 'update') {
        include 'update.php'; 
    } elseif ($action == 'delete') {
        include 'delete.php';
    }
}
?>