<?php 
    ob_start();
?>

<html>

<?php 
    $title = "Contact Us || Blog";
    include_once("includes/header.php");
    include_once ("includes/db.php");
?>

<?php 
    if(isset($_POST['submit'] ) ) {
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: Nikhil Shadija <nikhilshadija@gmail.com>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        $to = $_POST['emailid'];
        
        $subject = $_POST['subject'];
        
        $body = $_POST['message'];
        
        mail($to, $subject, $body, $headers);
        
        header("Location: contact.php");
    }
?>

<body>
    <?php 
        include_once("includes/navigation.php");
    ?>
    <div class="col-md-6 col-md-offset-3">
        <form action="" method="POST" role="form">
	        <legend>Contact Us!</legend>

	        <div class="form-group">
		        <label for="emailid">Email Id</label>
		        <input type="email" class="form-control" id="emailid" placeholder="Enter Your Email" name="emailid">
	        </div>

	        <div class="form-group">
		        <label for="subject">Subject</label>
		        <input type="text" class="form-control" id="subject" placeholder="Enter Subject" name="subject">
	        </div>

	        <div class="form-group">
		        <label for="message">Comments</label>
		       <textarea name="message" id="message" placeholder="Your Comments" class="form-control" rows="10"></textarea>
	        </div>

	        <button type="submit" name="submit" class="btn btn-primary btn-block btn-lg">Submit</button>
        </form>
    </div>
</body>
</html>