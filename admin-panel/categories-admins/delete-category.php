<?php require '../../config/config.php'; ?>



<?php
    if(!isset($_SESSION['adminname'])) {

          header('location: http://localhost/clean-blog/admin-panel/admins/login-admins.php');

        }


if(isset($_GET['de_id'])) {
    $id = $_GET['de_id'];

     
    
    $delete = $conn->prepare("DELETE FROM categories WHERE id = :id");
    $delete->execute([':id' => $id]);

    header('location: http://localhost/clean-blog/admin-panel/categories-admins/show-categories.php');
    }

    // include '../includes/navbar.php';
    
else {
        header('location: http://localhost/clean-blog/404.php');
    }

?>