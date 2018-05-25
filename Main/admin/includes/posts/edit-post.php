    <?php 

        if( isset( $_GET['p_id'] ) ) {
            $edit_post_id = $_GET['p_id'];
            $query = "SELECT * FROM posts WHERE post_id = $edit_post_id";
            $edit_post_query = mysqli_query($connection, $query);
            if( $row = mysqli_fetch_assoc($edit_post_query) ){
                $post_category_id = $row['post_category_id'];
                $post_author = $row['post_author'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_title = $row['post_title'];
                $post_tags = $row['post_tags'];
                $post_content = $row['post_content'];
            }
        }
        if( isset( $_POST['edit_post'] ) ) {
            
            if( isset( $_GET['p_id'] ) ) { 
            
                $post_id = $_GET['p_id'];
                
                $post_title = $_POST['post_title'];
                $post_author = $_POST['post_author'];
                $post_category_id = $_POST['post_category_id'];
                $post_status = $_POST['post_status'];

                $post_tags = $_POST['post_tags'];
                $post_content = $_POST['post_content'];
                
                $post_image = $_FILES['post_image']['name'];
                $post_image_temp = $_FILES['post_image']['tmp_name'];
                
                
                if($post_image == ""){
                    $query = "SELECT * FROM posts WHERE post_id = $post_id";
                    $post_image_query = mysqli_query($connection, $query);
                    confirmQuery($post_image_query);
                    if($row = mysqli_fetch_assoc($post_image_query) ) {
                        $post_image = $row['post_image'];
                    }
                }
                    
                
                move_uploaded_file($post_image_temp, "../images/$post_image");
        
                $query = "UPDATE posts SET ";
                $query .= "post_title = '$post_title', ";
                $query .= "post_category_id = '$post_category_id', ";
                $query .= "post_author = '$post_author', ";
                $query .= "post_image = '$post_image', ";
                $query .= "post_content = '$post_content', ";
                $query .= "post_tags = '$post_tags', ";
                $query .= "post_status = '$post_status' ";
                $query .= "WHERE post_id = $post_id";

                $update_post_query = mysqli_query($connection, $query);

                confirmQuery($update_post_query);
            }
        }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="post_title">Post Title</label>
            <input type="text" class="form-control" id="post_title" name="post_title" value="<?php echo $post_title; ?>">
        </div>

        <div class="form-group">
            <label for="post_category">Post Category ID</label>
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
            <label for="post_author">Post Author</label>
            <input type="text" class="form-control" id="post_author" name="post_author" value="<?php echo $post_author; ?>">
        </div>

        <div class="form-group">
            <label for="post_status">Post Status</label>
            <select name="post_status" id="post_status" class="form-control">
                <option value="draft" <?php if($post_status == "draft") echo "selected"; ?>>Draft</option>
                <option value="published" <?php if($post_status == "published") echo "selected"; ?>>Published</option>
            </select>
            
        </div>

        <div class="form-group">
            <label>Current Image</label>
            <?php 
                if($post_image == "") 
                    echo "<h4>No Image Set</h4";
                else
            ?>
               <img src="../images/<?php echo $post_image?>" class="img-responsive" alt="Post Image" width="200px">
        </div>

        <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" class="form-control" id="post_image" name="post_image">
        </div>

        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" id="post_tags" name="post_tags" value="<?php echo $post_tags; ?>">
        </div>

        <div class="form-group">
            <label for="post_content">Post Contents</label>
            <textarea class="form-control" id="post_content" name="post_content" cols="30" rows="10" > <?php echo $post_content; ?></textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="edit_post" value="Edit Post">
        </div>
    
    </form>
