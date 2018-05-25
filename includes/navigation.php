<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse col-lg-12 col-md-12">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <a class="navbar-brand" href="index.php">
        <span class="navbar-link"> <!--ICON HERE--> <span class="nav-category"  style="font-size: 50px;" >NIKHIL&#39;S BLOG</span></span></a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <?php
                        
                        $query = "SELECT * FROM categories";
                        $select_all_categories_query = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                            $cat_id = $row['cat_id'];                            
                            $category_title = $row['cat_title'];
                            echo    "<li class='nav-item'><a class='navbar-link text-primary nav-link' href='main/categories.php?c_id=$cat_id'><span class='nav-category'>$category_title</span><span class='sr-only'>(current)</span></a></li>";
                            echo "&nbsp;";
                        }
                            
                    ?>
            
            <li class="nav-item">
                <a class="btn text-success navbar-link" href="main/admin/index.php"><span class="nav-category">Admin</span> <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>