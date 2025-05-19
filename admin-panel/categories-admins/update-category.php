<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>


<?php

// Check if 'upd_id' is set
if (!isset($_GET['up_id'])) {
    die("No up_id in GET request.");
}

$id = $_GET['up_id'];

// Prepare and execute the SELECT statement safely
$select = $conn->prepare("SELECT * FROM categories WHERE id = :id");
$select->execute([':id' => $id]);
$rows = $select->fetch(PDO::FETCH_OBJ);

if (!$rows) {
    die("No post found with this ID.");
}

if(isset($_POST['submit'])) {
    if($_POST['name'] == ''){
        echo '<div class="alert alert-danger  text-white text-center" role="alert">
                One or more inputs is empty
              </div>';
    } else {
       
        $name = $_POST['name'];
        

        $update = $conn->prepare("UPDATE categories SET name = :name WHERE id = :id");
        $result = $update->execute([
            ':name' => $name,
            ':id' => $id
        ]);

    header('location: http://localhost/clean-blog/admin-panel/categories-admins/show-categories.php');
       
    }

   
        if ($result) {
            header('Location: http://localhost/clean-blog/admin-panel/categories-admins/show-categories.php');
            exit;
        } else {
            echo '<div class="alert alert-danger text-white text-center" role="alert">
                    Update failed. Please try again.
                  </div>';
        }
} 
// else {
//         header('location: http://localhost/clean-blog/404.php');
//     }



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
