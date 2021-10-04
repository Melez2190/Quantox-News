
<?php
   require APPROOT . '/views/includes/head.php';
?>

<?php
   require APPROOT . '/views/includes/navigation.php';
?>
SUBSRIBERS: <br> <hr>


<div class="wraper-sub">
<?php 



        foreach($data as $sub): ?>
        
        

        Email : <strong> <?php echo $sub->user_email ?></strong> <br>
        <?php if(!empty($sub->title)): ?>
        Vest: <strong><?php echo $sub->title  ?> </strong><br>
        <?php elseif(empty($sub->title) && !empty($sub->name_category)): ?>
        Kategorija: <strong><?php echo $sub->name_category;  ?> </strong><br> <hr>
        <?php else: ?>
        Vest: <?php echo $sub->title  ?> <br>
        Kategorija: <?php echo $sub->name_category;  ?> <br> <hr>

        <?php endif; ?>
        <br><hr>
        <?php endforeach;
?>
</div>