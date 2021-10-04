<?php
   require APPROOT . '/views/includes/head.php';
?>

<?php
   require APPROOT . '/views/includes/navigation.php';
?>



<div class="head-container">

    <div class="row">
 <?php foreach($data as $category): ?> 
    <div class="col-4">
    <div class="category-item">
        <h2>Category: <?php echo $category->name_category ?></h2>
        <a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT; ?>/categories/single/<?php echo $category->id ?>" >View</a>
       <?php if(isLoggedIn()): ?>
        <a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT; ?>/categories/updateCategory/<?php echo $category->id ?>" >Update</a>
        
        <form action="<?php echo URLROOT . "/categories/deleteCategory/" . $category->id ?>" method="POST">
            <input type="submit" name="delete" value="Delete" class="btn btn-sm btn-outline-secondary">
        </form>
        <?php endif; ?>
    </div>
    </div>
   
    
<?php endforeach; ?>
    </div>
</div>
