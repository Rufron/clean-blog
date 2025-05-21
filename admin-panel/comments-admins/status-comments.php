<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>


<?php

  if(!isset($_SESSION['adminname'])) {

    header('location: http://localhost/clean-blog/admin-panel/admins/login-admins.php');

  }

if (isset($_GET['comment_id']) && isset($_GET['status_comment'])) {

    $id = (int) $_GET['comment_id'];
    $status = (int) $_GET['status_comment'];

    if ($status == 0) {
        $update = $conn->prepare("UPDATE comments SET status_comment = 1 WHERE id = :id");
    } else {
        $update = $conn->prepare("UPDATE comments SET status_comment = 0 WHERE id = :id");
    }

    $update->execute([':id' => $id]);

    header('Location: http://localhost/clean-blog/admin-panel/comments-admins/show-comments.php');
    exit;
 
} else {
    header('location: http://localhost/clean-blog/404.php');
}


?>

<?php require "../layouts/footer.php"; ?>
