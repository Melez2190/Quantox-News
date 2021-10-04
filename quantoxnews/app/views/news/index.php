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
            
            

            <img class="news-img" src="<?php echo $news->img_url ?>">
            <p  class="news-text"><?php echo $news->title ?></p>
            <p class="card-text"><?php  echo mb_strimwidth("$news->content", 0, 200, "..."); ?></p>
            <p class="news-text"><?php echo $news->name_category ?>
           
            <p class="news-text">Create:<?php echo getTimeDifference($news->created_at);  ?></p>

            
            
              <div class="d-flex justify-content-between align-items-center">

                <div class="btn-group">

                <a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT; ?>/news/single/<?php echo $news->id ?>" >View</a>
                <?php if(isset($_SESSION['admin_id'])): ?>

                <a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT; ?>/news/updateNews/<?php echo $news->id ?>" >Update</a>
                <form action="<?php echo URLROOT . "/news/deleteNews/" . $news->id ?>" method="POST">
            <input type="submit" name="delete" value="Delete" class="btn red">
            <?php endif; ?>
        </form>
                </div>
              
              </div>
              </div>
          </div>
         
     
<?php endforeach; ?>

      </div>

      </div>
     






