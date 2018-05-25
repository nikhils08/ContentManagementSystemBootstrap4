<?php 
    ob_start();
?>

<?php 
    $title = "Forgot Password || Blog";
    include_once("includes/header.php");
    include_once ("includes/db.php");
    include_once("admin/functions.php");
?>

<?php 
    if(!isset($_GET['forgot'] ) ) {
        header("Location: index.php");
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['email'] ) ) {
            $email = $_POST['email'];
            $length = 500;
            $token = bin2hex(openssl_random_pseudo_bytes($length));
            
            $query = "SELECT * FROM users WHERE user_email = '$email'";
            $user = mysqli_query($connection, $query);
            confirmQuery($user);
            
            if(mysqli_num_rows($user) == 1){
                $query = "UPDATE users SET token = '$token' WHERE user_email = '$email'";
                $updateToken = mysqli_query($connection, $query);
                confirmQuery($updateToken);
                
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'From: Nikhil Shadija <nikhilshadija@gmail.com>' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
                $to = $_POST['email'];
        
                $subject ="Blog Change Password";
        
                $body = "Please Click the Link below to reset password<br> <a href = 'http://localhost/blog/reset.php?email=$email&token=$token'>Reset Password</a>";
        
                mail($to, $subject, $body, $headers);
                
                
            } else{
                echo "<h3 class = 'text-center'>Some Issue with Email! No Such User Found</h3>";
            }
            
        } else{
            echo "<h3 class = 'text-center'>Email Was Not Entered</h3>";
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
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>Reset Your Password Here!</p>
                            <div class="panel-body">
                                <form action="" method="POST" role="form" id="forgotpassword">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="email" id="email" name="email" placeholder="Enter Your Email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class = "btn btn-lg btn-primary btn-block" name="reset_submit" id="reset_submit">
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