<?php 
    ob_start();
?>

<?php 
    $title = "Reset Password || Blog";
    include_once("includes/header.php");
    include_once ("includes/db.php");
    include_once("admin/functions.php");
?>

<?php 
    if(!isset($_GET['token']) || !isset($_GET['email'])) {
        header("Location: index.php");
    } else{
        $token = $_GET['token'];
        $user_email = $_GET['email'];
        $query = "SELECT * FROM users WHERE token='$token'";
        $checkUser = mysqli_query($connection, $query);
        if(mysqli_num_rows($checkUser) == 0){
            header("Location: index.php");
        }
    }
    if(isset($_POST['change_reset_submit'] ) ) {
        if(!empty($_POST['password']) && !empty($_POST['confirm_password'] ) ) {
            
            $password = $_POST['password'];
            $confirm_pass = $_POST['confirm_password'];
            
            if($password === $confirm_pass) {
                
                $options = [
                    'cost' => 10,
                    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),            
                ];

                $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);
                
                $query = "UPDATE users SET token='', user_password='$hashed_password' WHERE token='$token' AND user_email='$user_email'";
                
                $userUpdate = mysqli_query($connection, $query);
                
                confirmQuery($userUpdate);
                
                echo "<h3 class = 'text-center'> Passwords Updated Successfully<br>Please Login And Verify</h3>";
                
                header("refresh: 5, url=index.php");
                
            } else{
                echo "<h3 class = 'text-center'> Passwords Do Not Match</h3>";
            }
        } else{
            echo "<h3 class = 'text-center'> Password Not Entered </h3>";
        }
    }
?>


<html>


<body>
    <?php include_once("includes/navigation.php"); ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Reset Password!</h2>
                            <p>Your New Password Here!</p>
                            <div class="panel-body">
                                <form action="" method="POST" role="form" id="forgotpassword">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" id="password" name="password" placeholder="Enter Your password" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter Your password Again" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class = "btn btn-lg btn-primary btn-block" name="change_reset_submit" id="change_reset_submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>