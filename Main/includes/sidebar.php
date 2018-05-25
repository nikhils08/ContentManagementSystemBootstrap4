<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="search"> <span class="input-group-btn">
                                    <button class="btn btn-default" name="submit" type="submit">
                                        <span class="glyphicon glyphicon-search"></span> </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Login -->
    <div class="well">
        <h4>Login</h4>
        <form action="includes/login.php" method="post">
            <!--<div class="input-group"-->
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Enter your Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter your Password">
            </div>
            <div class="form-group">
                    <button class="btn btn-success" name="login" type="submit"><span class="glyphicon glyphicon-log-in"></span> Login</button>
            </div>
            <!--/div-->
            
            <div class="form-group">
                <a href="forgot.php?forgot=<?php echo uniqid(true); ?>">Forgot Password</a>
            </div>
            
        </form>
        <!-- /.input-group -->
    </div>

   <!-- Side Widget Well -->
        <div class="well" id="registerWell">
            <h4>New User? Register Yourself</h4>
            <a href="register.php" class="btn btn-primary"> <span class="glyphicon glyphicon-edit"></span> Register </a>
        </div>
   
   
   
    <?php

        $query = "SELECT * FROM categories";
        $select_all_categories_query = mysqli_query($connection, $query);

    ?>
        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <?php
            while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                    $cat_id = $row['cat_id'];
                    $category_title = $row['cat_title'];
                    echo "<li><a href='categories.php?c_id=$cat_id'>$category_title</a></li>";
            }
?>
                    </ul>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        
</div>
