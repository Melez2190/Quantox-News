<?php
   require APPROOT . '/views/includes/head.php';
?>

<?php
    require APPROOT . '/views/includes/navigation.php';
?>
 

<div class="container">
    <div class="row">
        <div class="col-12">
            

        <img class="single-img" src="<?php echo $data[0]->img_url ?>">
        <p class="card-text"><?php echo $data[0]->title ?></p>
        <p class="card-text"><?php echo $data[0]->content; ?></p>
        <a href="<?php echo URLROOT; ?>/categories"><p class="card-text"><?php echo $data[0]->name_category; ?></p></a>
      
        



        <p class="news-text">Create:<?php echo getTimeDifference($data[0]->created_at);  ?></p>


<?php if(!isset($_SESSION['admin_id'])): ?>
    <form action="<?php echo URLROOT; ?>/subscriptions/subscribeNews" method="POST">
        <input type="hidden" name="news_id" value="<?php echo $data[0]->id ?>">
        <input type="email" name="user_email" placeholder="Email">
        <input type="submit" name="btn-subscriber" value="Subscribe">
    </form>
    <?php endif; ?>
        </div>
    </div>
</div>



