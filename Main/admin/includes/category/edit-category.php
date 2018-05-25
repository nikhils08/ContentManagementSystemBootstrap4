<!--EDIT CATEGORY FORM-->
<div class="col-xs-6">
    <?php
        editCategory();
        //USED TO FETCH CATEGORY TITLE ACCORDING TO EDIT GET REQUEST
        $edit_cat_title = fetchCategoryForEdit();
    ?>
    <?php if(isset($edit_cat_title))
            {   
    ?>
    <h3>Edit Category</h3>
    <form action="" method="post">
        <label for="cat_title">Category Title<span class="text-danger"> &#42;</span></label>
        <div class="form-group">
            <input type="text" class="form-control" id="cat_title" name="cat_title" value="<?php echo $edit_cat_title;?>"> </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="edit_submit" value="Edit Category"> </div>
    </form>
    <?php 
            }
    ?>
</div>
<!--END OF EDIT CATEGORY-->