
    <!-- INSERTED CATEGPORIES -->
    <div class="col-xs-12">
       <h3>Categories</h3>
        <table class="table table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>Category Title</th>
                <?php
                if($user_role == "admin"){
                    echo "<th></th>";
                    echo "<th></th>";
                }
                ?>
            </tr>
            <tbody>
                <?php
                        $query = "SELECT * FROM categories";
                        $select_all_categories_query = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                                echo "<tr>";
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                echo "<td>$cat_id</td>";
                                echo "<td>$cat_title</td>";
                                if($user_role == "admin"){
                                    echo "<td> <button type='button' class='btn btn-danger' data-target='#confirmfordelete' data-toggle='modal' data-cat_title = '$cat_title' data-cat_id = '$cat_id'> <span class='fa fa-times'></span> Delete </button></td>";
                                    echo "<td><a href='categories.php?edit=$cat_id' class='btn btn-primary'><span class='fa fa-pencil'></span> Edit</a></td> ";
                                }
                                echo "</tr>";
                        }

                        if( isset($_GET['delete'] ) ) {
                            $delete_id = $_GET['delete'];
                            $query = "DELETE FROM categories WHERE cat_id = $delete_id";
                            $delete_query = mysqli_query($connection, $query);
                            header("Location: categories.php");                                                
                        }
            ?>
            </tbody>
        </table>
    </div>
    <!--END OF INSERTED CATEGORIES-->