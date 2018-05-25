<?php 
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php 
    $title = "Register || Blogs";
    include_once ("includes/header.php");
    include_once ("includes/db.php");
    include_once("admin/functions.php");
    
    
    if( isset( $_POST['register'] ) ){

        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $emailId = $_POST['emailId'];
        $password = $_POST['password'];
        
        
        if(empty($username) || empty($firstname) || empty($lastname) || empty($emailId) || empty($password)){
            echo "<h3 class = 'text-center'>Some Values Missing</h3>";
        }
        
        else{
        //echo $username . " " . $firstname . " " . $lastname . " " . $emailId . " " . $password . " ";
        
            $username = mysqli_real_escape_string($connection, $username);
            $firstname = mysqli_real_escape_string($connection, $firstname);
            $lastname = mysqli_real_escape_string($connection, $lastname);
            $emailId = mysqli_real_escape_string($connection, $emailId);
            $password = mysqli_real_escape_string($connection, $password);
            $user_image = "";

            $query = "SELECT * FROM users WHERE username = '$username'";
            $checkusername = mysqli_query($connection, $query);
            confirmQuery($checkusername);
            if(mysqli_num_rows($checkusername) > 0){
                echo "<h2 class = 'text-center'>User Already Exists</h2>";
            } else{
                $options = [
                    'cost' => 10,
                    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),            
                ];

                $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

                $query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_image, user_role) VALUES ('$username', '$hashed_password', '$firstname', '$lastname', '$emailId', '$user_image', 'subscriber')";

                $add_user_query = mysqli_query($connection, $query);

                confirmQuery($add_user_query);

                echo "<h2 class = 'text-center'> User Registered Successfully</h2>";

            }
        }
    }
    
?>

<body>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
    
           <div class="col-md-6 col-md-offset-3">
           <form action="" method="POST" role="form" autocomplete="off">
                <legend>Register</legend>
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Your First Name">
                </div>

               <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Your Last Name">
                </div>

               <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Desired Username">
                </div>

                <div class="form-group">
                    <label for="emailId">Email</label>
                    <input type="email" class="form-control" id="emailId" name="emailId" placeholder="Enter Your Email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
                </div>

                <button type="submit" class="btn btn-primary" name="register"><span class="glyphicon glyphicon-ok-sign"></span> Submit</button>
                <a href="index.php" class="btn btn-warning"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</a>
            </form>

           </div>
            

        </div>
        <!-- /.row -->

        <hr>
       
       
        <?php 
            include_once ("includes/footer.php");
        ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
