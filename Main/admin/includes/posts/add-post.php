<?php 
    if( isset( $_POST['create_post'] ) ) {
        $post_title = $_POST['post_title'];
        $post_author = $_SESSION['user_id'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        if( $post_status == "" || !isset( $post_status ) ) {
            $post_status = "draft";
        }
        
        
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        $post_comment_count = 0;
        
        move_uploaded_file($post_image_temp, "../images/$post_image");
        
        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) VALUES ($post_category_id, '$post_title', '$post_author', now(), '$post_image', '$post_content', '$post_tags', $post_comment_count, '$post_status')";
        
        $create_post_query = mysqli_query($connection, $query);
        
        confirmQuery($create_post_query);
    }
?>

<form action="" method="post" id="addPost" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" id="post_title" name="post_title">
    </div>
    
    <div class="form-group">
        <label for="post_category">Post Category</label>
        <select name="post_category_id" id="post_category" class="form-control">
                <?php 
                    $query = "SELECT * FROM categories";
                    $select_all_categories_query = mysqli_query($connection, $query);
                    confirmQuery($select_all_categories_query);
                    while($row = mysqli_fetch_assoc($select_all_categories_query)) 
                    {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        if($post_category_id == $cat_id)
                            echo "<option value = '$cat_id' selected> $cat_title </option>";
                        else
                            echo "<option value = '$cat_id'> $cat_title </option>";
                    }
                ?>
            </select>
    </div>
    
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select name="post_status" id="post_status" class="form-control">
                <option value="draft">Draft</option>
                <option value="published">Publish</option>
            </select>
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" id="post_image" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" id="post_tags" name="post_tags">
    </div>    

    <div class="form-group">
        <label for="post_content">Post Contents</label>
        <textarea class="form-control" id="post_content" name="post_content" cols="30" rows="10"></textarea>
    </div>    

    <!--#messages is where the messages are placed inside-->
    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <div id="messages"></div>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>    

</form>