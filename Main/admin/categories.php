<?php 
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php 
    $page = "categories";
    include_once("includes/header.php");
    include_once("functions.php");
    
    
    $time_out = time() - 120;
    $session = session_id();

    $query = "SELECT * FROM users_online WHERE time > $time_out AND session = '$session'";
    $check_active_session = mysqli_query($connection, $query);

    if(mysqli_num_rows($check_active_session) == 0){
        mysqli_query($connection, "DELETE FROM users_online WHERE session = '$session'");
        include_once("../includes/logout.php");
    }
    
?>

<body>
    <div id="wrapper">
        <!--NAVIGATION-->
        <?php 
            include_once("includes/navigation.php");
        ?>
        <!---END OF NAVIGATION-->
        <!-- START OF PAGE WRAPPER -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To CPanel
                            <small><?php echo $username; ?></small>
                        </h1>
                        <?php include_once("includes/category/add-category.php");?>
                        <?php include_once("includes/category/edit-category.php");?>
                        <?php include_once("includes/category/view-category.php");?>
                    </div>
                </div>
                <!-- /.row -->
                <?php include_once("includes/modal-delete.php"); ?>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
        $('#confirmfordelete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // DOM method because this toh modal return karega to button ke liye we use related target
            var cat_title = button.data('cat_title');
            var cat_id = button.data('cat_id');
            $(this).find('.cat_title').text('Category: ' + cat_title + ' ID: ' + cat_id);
            var delete_href = "categories.php?delete=" + cat_id;
            $('#btntodelete').attr('href', delete_href);
        });
    </script>
</body>

</html>
