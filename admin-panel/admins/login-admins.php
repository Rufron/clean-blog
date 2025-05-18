<?php require "../layouts/header.php"; ?> 
<?php require "../../config/config.php"; ?>

<?php 

if(isset($_SESSION['adminname'])) {

  header('location: http://localhost/clean-blog/admin-panel/index.php');

}

if (isset($_POST['submit'])) {
    if($_POST['email'] == '' OR $_POST['password'] == ''){
        echo "One or more inputs are empty";
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $login = $conn->query("SELECT * FROM admins WHERE email = '$email' ");

        $login->execute();

        $row = $login->FETCH(PDO::FETCH_ASSOC);
        if ($login->rowCount() > 0){

            if(password_verify($password, $row['mypassword'])){

                $_SESSION['adminname'] = $row['adminname'];
                $_SESSION['admin_id'] = $row['id'];


                header('location: ../index.php');
            } else{       echo '<div class="alert alert-danger  text-white text-center" role="alert">
                                    The Email or Password is wrong😥
                                </div> ';
        }
        
        } else{       echo '<div class="alert alert-danger  text-white text-center" role="alert">
                                    The Email or Password is wrong😥
                                </div> ';
        }
    }

}

?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>
              <form method="POST" class="p-auto" action="login-admins.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>

            </div>
       </div>
     </div>
    </div>
</div>
<?php require "../layouts/footer.php"; ?> 