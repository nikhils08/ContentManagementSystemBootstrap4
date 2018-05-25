<!DOCTYPE html>
<html lang="en">

<?php 
    $title = "Home || Blogs";
    include_once("includes/header.php");
    include_once ("includes/db.php");
    $posts_per_page = 8;
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include_once("includes/navigation.php"); ?>
        </div>
 
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="row">
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
                                $post_comment_count = $row['post_comment_count'];
                    ?>
                    <!-- Start Of Blog Post -->

                    <div class="col-lg-4 col-md-10 offset-lg-0 offset-md-1">
                        <div class="post">
                            <div class="post-meta">
                                <div class="post-image-container">
                                    <img src="main/images/<?php echo $post_image;?>" alt="<?php echo $post_title; ?>"class="img-fluid rounded post-image">
                                </div>
                                <h2><a href="post.php?p_id=<?php echo $post_id; ?>" class="post-title"><?php echo $post_title; ?></a></h2>
                                <?php echo "<h4 class='lead'>By <a href='index.php' class='post-author'>$post_author</a></h4>"; ?>
                                <h4 class="lead"><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></h4>
                            </div>
                            <hr class="post-hr">
                            <div class="post-data">
                                <p><?php echo $post_content; ?></p>
                            </div>
                            <div class="button-container">
                                <span class="post-read-more">
                                    <a href="post.php?p_id=<?php echo $post_id; ?>" class="btn btn-outline-success btn-read">Read More <i class="fa fa-arrow-circle-right arrow-read"></i></a>
                                </span>
                                <span class="comments">
                                   <a href="post.php?p_id=<?php echo $post_id; ?>">
                                        <i class="fa fa-comment-o fa-2x opaque-icon"></i>
                                        <i class="fa fa-comment fa-2x main-icon"></i><span class="comments-count"><?php echo $post_comment_count; ?></span>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!--END OF BLOG POST-->
                   <?php 
                            }//END OF WHILE    
                    ?>
                </div>
            </div>
               <div class="col-lg-4 col-md-10 offset-md-1 offset-lg-0">
                    <?php include_once("includes/sidebar.php"); ?>
                </div>
        </div>
        <div class="row">
            <ul class="pager list-inline">
               <?php 
                    for($i=1; $i<=$count; $i++){
                        if($i == $page)
                            echo "<a href = 'index.php?page=$i'><li class='list-inline-item'><h5 class = 'active-page'>$i</h5></li></a>";
                        else
                            echo "<a href = 'index.php?page=$i'><li class='list-inline-item'><h5>$i</h5></li></a>";
                    }
               ?>
           </ul>
       </div>
    </div>
    <?php include_once("includes/footer.php"); ?>
</body>
</html>
