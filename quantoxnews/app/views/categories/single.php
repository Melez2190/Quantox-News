<?php
   require APPROOT . '/views/includes/head.php';
?>

<?php
    require APPROOT . '/views/includes/navigation.php';
?>

<div class="head-container">

      <div class="row">

<?php foreach($data['post'] as $post): ?>
   
    
    <div class="col-4">
          <div class="card-body">

 
            

        <img class="news-img" src="<?php echo $post->img_url ?>">
        <p class="card-text"><?php echo $post->name_category; ?></p>
        

        <p class="news-text"><?php echo $post->title; ?></p>
        <p class="card-text"><?php  echo mb_strimwidth("$post->content", 0, 200, "..."); ?></p>
        
        

      
        



        <p class="news-text">Create:<?php echo getTimeDifference($post->created_at);  ?></p>
        </div>
    </div>
<hr>
<?php endforeach; ?>
</div>
</div>

<?php if(!isset($_SESSION['admin_id'])): ?>

<form action="<?php echo URLROOT; ?>/subscriptions/subscribeCategory" method="POST">
        <input type="hidden" name="category_id" value="<?php echo $data['categories']->id ?>">
        <input type="email" name="user_email" placeholder="Email">
        <input type="submit" name="btn-subscriber" value="Subscribe">
    </form>
<?php endif; ?>
