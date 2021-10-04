
<?php
   require APPROOT . '/views/includes/head.php';
?>

<?php
   require APPROOT . '/views/includes/navigation.php';
?>



    
   
    <div class="head-container">

      <div class="row">
    <?php foreach($data as $news): ?> 

        <div class="col-4">
          
            

            <div class="card-body">
            <a href="news/single/<?php echo $news->id ?>" >

            <img class="news-img" src="<?php echo $news->img_url ?>">
            <p  class="news-text"><?php echo $news->title ?></p>
            </a>
              <p class="card-text"><?php  echo mb_strimwidth("$news->content", 0, 200, "..."); ?></p>
              <div class="d-flex justify-content-between align-items-center">
            <p class="news-text"><?php echo $news->name_category ?>
    </div>
    <div>
            <p class="news-text">Create:<?php echo getTimeDifference($news->created_at);  ?></p>
              
              </div>
            </div>
          </div>
         
     
<?php endforeach; ?>
      </div>

      </div>

  
    




