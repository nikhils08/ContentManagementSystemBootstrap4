<!DOCTYPE html>
<html lang="en">
<?php 
    $title = "Search Results || Blogs";
    $page = "search";
    include_once ("includes/header.php");
    include_once ("includes/db.php");
?>

    <body>
        <?php 
        include_once("includes/navigation.php");
    ?>
            <!-- Page Content -->
            <div class="container">
                <div class="row">
                    <!-- Blog Entries Column -->
                    <div class="col-md-8">
                        <h1 class="page-header">
                    Search Results
                </h1>
                        <?php 
                    
                        if( isset($_POST['submit'] ) ) {
                            $search = $_POST['search'];
                            $query = "SELECT * FROM posts WHERE post_tags like '%$search%' AND post_status = 'published'";
                            $search_query = mysqli_query($connection, $query);
                            if(!$search_query) {
                                //THERE WAS SOME ERROR
                                die("QUERY FAILED: ".mysqli_error($connection) );
                            }
                            $count = mysqli_num_rows($search_query);
                            if($count == 0){
                                echo "<h2> No Result Found for '$search' </h2>";
                            }
                            else{
                                while($row = mysqli_fetch_assoc($search_query)) {
                                    $post_id = $row['post_id'];
                                    $post_title = $row['post_title'];
                                    $post_author = $row['post_author'];
                                    $post_date = $row['post_date'];
                                    $post_image = $row['post_image'];
                                    $post_content = substr($row['post_content'], 0, 275)."....";
                ?>
                            <!-- Start Of Blog Post -->
                            <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>">
                        <?php echo $post_title; ?>
                    </a>
                </h2>
                            <p class="lead"> by
                                <a href="index.php">
                                    <?php echo $post_author?>
                                </a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Posted on
                                <?php echo $post_date; ?>
                            </p>
                            <hr> <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="<?php echo $post_title; ?>">
                            <hr>
                            <p>
                                <?php echo $post_content; ?>
                            </p> <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                            <hr> 
                    <!--END OF BLOG POST-->
                    <?php 
                        }//END OF WHILE    
                        }//end of else
                        }//end of isset
                ?>
                       </div>
                        <?php
                include_once("includes/sidebar.php");
            ?>
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