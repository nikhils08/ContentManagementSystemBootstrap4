<?php 
    if(isset($_POST['checkBoxArray'] ) ){
        
        $bulkOptions = $_POST['bulk_options'];
        
        foreach($_POST['checkBoxArray'] as $postValueId){
            switch($bulkOptions){
                case 'published':
                case 'draft':
                    $query = "UPDATE posts SET post_status = '$bulkOptions' WHERE post_id = $postValueId";
                    $update_status = mysqli_query($connection, $query);
                    header("Location: posts.php");
                    break;
                
                case 'delete':
                    $query = "DELETE FROM posts WHERE post_id = $postValueId";
                    $delete_post = mysqli_query($connection, $query);
                    header("Location: posts.php");
                    break;
                    
                default:
                    echo "<h3> ";
            }
        }
    }
?>



<!--VIEW ALL POSTS START-->

<div class="col-xs-12 table-responsive">
   <form action="" method="post">
   
   
       
        <div id="bulkOperationContainer" class="col-xs-4">
           <select name="bulk_options" id="" class="form-control">
               <option value="">Select Option</option>
               <option value="published">Publish</option>
               <option value="draft">Draft</option>
               <option value="delete">Delete</option>
           </select>
        </div>   
        
        <div class="col-xs-4">
            <input type="submit" name="submit_bulk" value="Apply" class="btn btn-primary">
            <a href="posts.php?source=add_post" class="btn btn-warning">Add New</a>
        </div>
   
    <table class="table table-bordered table-hover">
        
        <tr>
           <th><input type="checkbox" id="selectAllBoxes" class = "form-control"></th>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th></th>
            <th></th>
        </tr>

        <tbody>
        <?php
            if($user_role == "admin")
                $query = "SELECT * FROM posts, users WHERE posts.post_author = users.user_id ORDER BY posts.post_date DESC";
            else{
                $user_id = $_SESSION['user_id'];
                $query = "SELECT * FROM posts, users WHERE posts.post_author = users.user_id AND posts.post_author = $user_id ORDER BY posts.post_date DESC";
            }
            $select_all_posts_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_author = $row['user_firstname'] . " " . $row['user_lastname'];
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_date = $row['post_date'];
                    echo "<tr>";
                    echo "<td><input type = 'checkbox' name = 'checkBoxArray[]' class = 'checkBoxes' value = '$post_id'></td>";
                    echo "<td>$post_id</td>";
                    echo "<td>$post_author</td>";
                    echo "<td>$post_title</td>";
                
                
                    $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                    $select_all_categories_query = mysqli_query($connection, $query);
                    confirmQuery($select_all_categories_query);
                    if($row = mysqli_fetch_assoc($select_all_categories_query)) {
                        $post_category_title = $row['cat_title'];
                    }
                    echo "<td>$post_category_title</td>";
                    echo "<td>$post_status</td>";
                    if($post_image == "")
                        echo "<td><h4>No Image Set</h4></td>";
                    else
                        echo "<td><img src = '../images/$post_image' alt = 'Post Image' height = '120px'></td>";
                    echo "<td>$post_tags</td>";
                    echo "<td>$post_comment_count</td>";
                    echo "<td>$post_date</td>";
                    echo "<td><a href='posts.php?delete=$post_id' class='btn btn-danger'><span class='fa fa-times'></span> DELETE</a></td> ";
                    echo "<td><a href='posts.php?source=edit_post&p_id=$post_id' class='btn btn-primary'><span class='fa fa-pencil'></span> EDIT</a></td> ";
                    echo "</tr>";
            }

        ?>

        </tbody>
    </table>
    </form>
    
    <?php 
    
        if( isset( $_GET['delete'] ) ) {
                $delete_post_id = $_GET['delete'];
                $query = "DELETE FROM posts WHERE post_id = {$delete_post_id}";
                $delete_query = mysqli_query($connection, $query);
                confirmQuery($delete_query);
                header('Location: posts.php');
        }
     
    ?>
    
    
</div>

<!--VIEW ALL POSTS END-->