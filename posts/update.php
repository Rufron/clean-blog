<?php
$basepath='../';
require '../includes/header.php'; ?>
<?php require '../config/config.php'; ?>



<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if 'upd_id' is set
if (!isset($_GET['upd_id'])) {
    die("No upd_id in GET request.");
}

$id = $_GET['upd_id'];
echo "Requested post ID: $id<br>";

// Prepare and execute the SELECT statement safely
$select = $conn->prepare("SELECT * FROM posts WHERE id = :id");
$select->execute([':id' => $id]);
$rows = $select->fetch(PDO::FETCH_OBJ);

if (!$rows) {
    die("No post found with this ID.");
}

// Check session
if (!isset($_SESSION['user_id'])) {
    die("User not logged in. Session is missing user_id.");
}

// echo "Session user ID: " . $_SESSION['user_id'] . "<br>";
// echo "Post owner ID: " . $rows->user_id . "<br>";

// Compare ownership
if ((int)$_SESSION['user_id'] !== (int)$rows->user_id) {
    // die("User does not own this post. Redirecting...");
    header('Location: http://localhost/clean-blog/index.php');
    exit;
}


if(isset($_POST['submit'])) {
    if($_POST['title'] == '' OR $_POST['subtitle'] == '' OR $_POST['body'] == ''){
        echo 'One or more inputs is missing.';
    } else {
        // Deleting old image
        if ($rows && file_exists('../images/' . $rows->img)) {
            unlink('../images/' . $rows->img);
        }

        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $body = $_POST['body'];
        $img = $_FILES['img']['name'];

        $dir = '../images/' . basename($img);

        $update = $conn->prepare("UPDATE posts SET title = :title, subtitle = :subtitle, body = :body, img = :img WHERE id = :id");
        $result = $update->execute([
            ':title' => $title,
            ':subtitle' => $subtitle,
            ':body' => $body,
            ':img' => $img,
            ':id' => $id
        ]);

        if ($result) {
            if (move_uploaded_file($_FILES['img']['tmp_name'], $dir)) {
                echo 'Post updated successfully with image.';
                header('Location: http://localhost/clean-blog/index.php');
                exit;
            } else {
                echo 'Post updated, but image upload failed.';
            }
        } else {
            echo 'Database update failed.';
        }
    }
}


?>




 
                <!-- Main Content-->
        <div class="container px-4 px-lg-5">

            <form method="POST"  action="update.php?upd_id=<?php echo $id; ?>" enctype="multipart/form-data">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" name="title" value="<?php echo $rows->title; ?>" id="form2Example1" class="form-control" placeholder="title" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="subtitle" value="<?php echo $rows->subtitle; ?>" id="form2Example1" class="form-control" placeholder="subtitle" />
            </div>

              <div class="form-outline mb-4">
                <textarea type="text" name="body" id="form2Example1" class="form-control" placeholder="body" rows="8"><?php echo $rows->body; ?></textarea>
            </div>

             <?php echo "<img src='../images/". $rows->img."'width=600px height=300px> "; ?>

             <div class="form-outline mb-4">
                <input type="file" name="img" id="form2Example1" class="form-control" placeholder="image" />
            </div>


              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
            </form>


           
        </div>
<?php require '../includes/footer.php'; ?>

