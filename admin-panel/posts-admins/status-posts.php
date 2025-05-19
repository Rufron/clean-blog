<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>


<?php

if (isset($_GET['id']) && isset($_GET['status'])) {

    $id = (int) $_GET['id'];
    $status = (int) $_GET['status'];

    if ($status == 0) {
        $update = $conn->prepare("UPDATE posts SET status = 1 WHERE id = :id");
    } else {
        $update = $conn->prepare("UPDATE posts SET status = 0 WHERE id = :id");
    }

    $update->execute([':id' => $id]);

    header('Location: http://localhost/clean-blog/admin-panel/posts-admins/show-posts.php');
    exit;
 
} else {
    header('location: http://localhost/clean-blog/404.php');
}


?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Categories</h5>
          <form method="POST" action="http://localhost/clean-blog/admin-panel/categories-admins/update-category.php?up_id=<?php echo $rows->id; ?>" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" value="<?php echo $rows->name; ?>" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
<?php require "../layouts/footer.php"; ?>
