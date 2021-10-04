<div class="container center">
    <h1>
        Update news

<a href="<?php echo URLROOT ?>/admins/dashboard">Back</a>
        
<?php
   require APPROOT . '/views/includes/head.php';
?>

<?php
   require APPROOT . '/views/includes/navigation.php';
?>
    <form action="" method="POST">
    


        <div class="form-item">
            <input type="text" name="title" value="<?php echo $data['post']->title ?>">

        </div>
        <div class="form-item">
            <input type="text" name="content" value="<?php echo $data['post']->content ?>">

        </div>  
        <div class="form-item">
            <input type="text" name="img_url" value="<?php echo $data['post']->img_url ?>">

            
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
    <p> <?php echo "<pre>";
     print_r($data['post']); 
     echo "</pre>";?></p>
</div>