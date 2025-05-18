<?php
$basepath='../';
require '../includes/header.php'; ?>
<?php require '../config/config.php'; ?>



<?php



if (!isset($_GET['prof_id'])) {
    die("No prof_id in GET request.");
}

$id = $_GET['prof_id'];
// echo "Requested post ID: $id<br>";

// Prepare and execute the SELECT statement safely
$select = $conn->prepare("SELECT * FROM users WHERE id = :id");
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
if ((int)$_SESSION['user_id'] !== (int)$rows->id) {
    // die("User does not own this post. Redirecting...");
    header('Location: http://localhost/clean-blog/index.php');
    exit;
}


if(isset($_POST['submit'])) {
    if($_POST['email'] == '' OR $_POST['username'] == ''){
        echo 'One or more inputs is missing.';
    } else {
    
        $email = $_POST['email'];
        $username = $_POST['username'];
       

        $update = $conn->prepare("UPDATE users SET email = :email, username = :username WHERE id = :id");
        $result = $update->execute([
            ':email' => $email,
            ':username' => $username,
            ':id' => $id
        ]);

    header('Location: http://localhost/clean-blog/users/profile.php?prof_id='.$_SESSION['user_id'].'');
        
    }
}


?>




 
                <!-- Main Content-->
        <div class="container px-4 px-lg-5">

            <form method="POST"  action="profile.php?prof_id=<?php echo $id; ?>" enctype="multipart/form-data">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="email" value="<?php echo $rows->email; ?>" id="form2Example1" class="form-control" placeholder="email" />
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="username" value="<?php echo $rows->username; ?>" id="form2Example1" class="form-control" placeholder="username" />
              </div>

              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
            </form>


           
        </div>
<?php require '../includes/footer.php'; ?>

