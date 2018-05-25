<!DOCTYPE html>
<html lang="en">

<?php 
    $title = "Home || Blogs";
    include_once ("includes/header.php");
    include_once ("includes/db.php");
    $posts_per_page = 3;
?>

<body>

    <?php 
        include_once("includes/navigation.php");
    ?>

    <!-- Page Content -->
    <div class="container-fluid">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Study Link's Blog
                    <small>just a timepass</small>
                </h1>

                <?php 

                        if( isset( $_GET['page'] ) ){
                            $page = $_GET['page'];
                        } else{
                            $page = 1;
                        }
                        if($page == "" || $page == 1){
                            $limit_start = 0;
                        } else{
                            $limit_start = ($page * $posts_per_page) - $posts_per_page;
                        }

                        $query = "SELECT * FROM posts, users WHERE posts.post_author = users.user_id AND posts.post_status = 'published'";
                        $total_posts_query = mysqli_query($connection, $query);
                        $total_posts = mysqli_num_rows($total_posts_query);

                        $query = "SELECT * FROM posts, users WHERE posts.post_author = users.user_id AND posts.post_status = 'published' LIMIT $limit_start, $posts_per_page";
                        $select_all_posts_query = mysqli_query($connection, $query);

                        $count = ceil($total_posts/$posts_per_page);

                        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_author = $row['user_firstname'] . " " . $row['user_lastname'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = substr($row['post_content'], 0, 240)."....";
                            
                ?>
                <!-- Start Of Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="<?php echo $post_title; ?>">
                <hr>
                <p> <?php echo $post_content; ?> </p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <!--END OF BLOG POST-->
               <?php 
                        }//END OF WHILE    
                ?>
            </div>
            
            <?php
                include_once("includes/sidebar.php");
            ?>

        </div>
        <!-- /.row -->

        <hr>

       <ul class="pager">
           <?php 
                for($i=1; $i<=$count; $i++){
                    if($i == $page)
                        echo "<li><a href = 'index.php?page=$i' class = 'active-page'>$i</a></li>";
                    else
                        echo "<li><a href = 'index.php?page=$i'>$i</a></li>";
                }
           ?>
       </ul>
       
       
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
