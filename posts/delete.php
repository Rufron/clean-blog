<?php require '../config/config.php'; ?>



<?php

if(isset($_GET['del_id'])) {
    $id = $_GET['del_id'];

     
    $select = $conn->query("SELECT * FROM posts WHERE id='$id'");
    $post = $select->fetch(PDO::FETCH_OBJ);


    if($_SESSION['user_id'] !== $post->user_id){
        header('location: http://localhost/clean-blog/index.php');
    } else {

        
    if ($post && file_exists('../images/' . $post->img)) {
        unlink('../images/' . $post->img);
    }

    
    $delete = $conn->prepare("DELETE FROM posts WHERE id = :id");
    $delete->execute([':id' => $id]);

    header('location: http://localhost/clean-blog/index.php');
    }

    include '../includes/navbar.php';
    
} else {
        header('location: http://localhost/clean-blog/404.php');
    }


?>