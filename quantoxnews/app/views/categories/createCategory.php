<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container center">
    <h1>
        Create new Category



    <form action="<?php echo URLROOT; ?>/categories/createCategory" method="POST">
        <div class="form-item">
            <input type="text" name="name_category" placeholder="Name...">

            <span class="invalidFeedback">
                <?php echo $data['titleError']; ?>
            </span>
        </div>

       

        <button class="btn green" name="submit" type="submit">Submit</button>
    </form>
</div>

