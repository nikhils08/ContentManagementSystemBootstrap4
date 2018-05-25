<?php 
    ob_start();
?>


<!DOCTYPE html>
<html lang="en">

<?php 
    $title = "Individual Post";
    $page = "posts";
    session_start();
    include_once("includes/header.php");
    include_once("includes/db.php");
    include_once("main/admin/functions.php");
?>
<body>

    <!-- Navigation -->
    <?php 
        include_once("includes/navigation.php");
    ?>

    <!-- Page Content -->
    <div class="container-fluid">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8 col-md-6 offset-md-3 offset-lg-0">

                <!-- Blog Post -->

               <?php 
                    if(isset($_GET['p_id'] ) ) {
                        $post_id = $_GET['p_id'];
                        $query = "SELECT * FROM posts, users WHERE posts.post_author = users.user_id AND posts.post_id = $post_id";
                        $select_all_posts_query = mysqli_query($connection, $query);
                        if($row = mysqli_fetch_assoc($select_all_posts_query)) {
                            $post_title = $row['post_title'];
                            $post_author = $row['user_firstname'] . " " . $row['user_lastname'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $post_author_id = $row['post_author'];
                ?>
               
               <div class="post-item">
                <!-- Title -->
                <div class="post-title">
                <h1><?php echo $post_title?></h1>
                
               <?php 
                    if( isset( $_SESSION['user_id'] ) ){
                        $user_id = $_SESSION['user_id'];
                        if($user_id == $post_author_id){
                ?>
                <a href="Main/admin/posts.php?source=edit_post&p_id=<?php echo $post_id; ?>" class="fa fa-pencil btn btn-outline-warning">Edit Post</a>
                <?php 
                        }
                    }
                ?>
                </div>
                <!-- Author -->
                <p>
                    by <a href="#"><?php echo $post_author?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-fluid" src="main/images/<?php echo $post_image?>" alt="<?php echo $post_title?>">

                <hr>

                <!-- Post Content -->
                <p><?php echo $post_content?></p>

                <hr>

           <?php 
                        }//end of result if
                        
                        echo "</div>";   
                        //COMMENTS BELONG HERE
                        include_once("comments.php");
                        
                    }// end of if
                    else{
                    ?>
                    
                    <h2 style="">You are No Access To This Page</h2>
                    
                    <?php
                    }
          ?> 
            
            </div>
            
            <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
            <?php 
                include_once("includes/sidebar.php");
            ?>
            </div>
        </div>
        <!-- /.row -->

        <hr>
        
        <!--footer-->
        <?php 
            include_once("includes/footer.php");
        ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <?php include_once("includes/footer.php"); ?>

</body>

</html>
