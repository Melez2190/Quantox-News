
<?php
   require APPROOT . '/views/includes/head.php';
?>

<?php
   require APPROOT . '/views/includes/navigation.php';
?>

<div class="container center">
    <h1>
        Create new News


        

    <form action="<?php echo URLROOT; ?>/news/createNews" method="POST">
        <div class="form-item">
            <input type="text" name="title" placeholder="Name...">

            <span class="invalidFeedback">
                <?php echo $data['titleError']; ?>
            </span>
        </div>
        <div class="form-item">
            <input type="text" name="content" placeholder="Content...">

            <span class="invalidFeedback">
                <?php echo $data['titleError']; ?>
            </span>
        </div>  
        <div class="form-item">
            <input type="text" name="img_url" placeholder="Img url...">

            <span class="invalidFeedback">
                <?php echo $data['titleError']; ?>
            </span>
        </div> 
        
         <div class="form-item">
             <select name="category_id">
               
                <?php foreach($data['categories'] as $category): ?>
                 
                    <option value="<?php echo $category->id;?>"><?php echo $category->name_category; ?></option>
                    
                 <?php endforeach; ?>


                    
            
            </select>
        </div>
       

        <input type="submit" value="Save">
    </form>
</div>