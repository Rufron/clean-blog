<?php 
$basepath='../';
require '../includes/header.php'; ?>
<?php require '../config/config.php'; ?>


<?php

if(isset($_SESSION['username'])) {
    header("location: ../index.php");
}

if(isset($_POST['submit'])) {

    if($_POST['email'] == '' OR $_POST['username'] == '' OR $_POST['password'] == ''){
        echo 'Type something in the inputs';
    }
    else {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        
        $insert = $conn->prepare("INSERT INTO users (email, username, mypassword) VALUES (:email, :username, :password)");

        $insert->execute([
            ':email' =>$email,
            ':username' => $username,
            ':password' => $password,
        ]);

        header("location: login.php");
    }
}

?>

        <!-- Page Header-->
         
        
                <!-- Main Content-->
        <div class="container px-4 px-lg-5">

            <form method="POST" action="register.php">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="" name="username" id="form2Example1" class="form-control" placeholder="Username" />
               
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                
              </div>



              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Register</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Aleardy a member? <a href="login.php">Login</a></p>
                

               
              </div>
            </form>


           
        </div>
        <!-- footer -->
        <?php require '../includes/footer.php'; ?>
    
 