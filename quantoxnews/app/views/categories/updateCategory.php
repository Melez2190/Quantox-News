<?php
   require APPROOT . '/views/includes/head.php';
?>

<?php
   require APPROOT . '/views/includes/navigation.php';
?>
<div class="container center">
    <h1>
        Update Category

        

    <form action="" method="POST">
    


        <div class="form-item">
            <input type="text" name="name_category" value="<?php echo $data['post']->name_category ?>">

        </div>
        
        
       
          
                    
        <input type="submit" value="Save">
        

    </form>
    
</div>