 <!--ADD CATEGORY FORM-->
<div class="col-xs-6">
    <?php 
        addCategory();
        if($user_role == "admin"){
    ?>
    <h3>Add Category</h3>
    <form action="" method="post">
        <label for="cat_title">Category Title<span class="text-danger"> &#42;</span></label>
        <div class="form-group">
            <input type="text" class="form-control" id="cat_title" name="cat_title"> </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="submit" value="Add Category"> </div>
    </form>
    <?php 
        }
    ?>
</div>
<!--END OF ADD CATEGORY-->