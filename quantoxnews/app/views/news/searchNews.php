<?php
   require APPROOT . '/views/includes/head.php';
?>

<?php
   require APPROOT . '/views/includes/navigation.php';
?>


<div class="container">
    <div class="row">
    <?php foreach($data as $news): ?>

        <div class="col-4">
            
        <a href="<?php echo URLROOT; ?>/news/single/<?php echo $news->id ?>" >
        <img class="news-img" src="<?php echo $news->img_url ?>">
        <p class="card-text"><?php echo $news->title ?></p></a>
        <p class="card-text"><?php  echo mb_strimwidth("$news->content", 0, 150, "...");?></p>
        
        <p class="card-text"><?php echo $news->category_id; ?></p>
      
        



        <p class="news-text">Create:<?php echo getTimeDifference($news->created_at);  ?></p>


        </div>
<?php endforeach; ?>

    </div>
</div>
<?php die(); ?>