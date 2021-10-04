<?php require 'head.php'; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <?php if(!isset($_SESSION['admin_id'])): ?>
<a href="<?php echo URLROOT; ?>/index"><?php echo SITENAME; ?></a>
<?php else: ?>
<a href="<?php echo URLROOT; ?>/admins/dashboard"><?php echo SITENAME; ?></a>
<?php endif; ?>

 
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li class="nav-item nav-navbar">
        

        <a class="item-nav" href="<?php echo URLROOT; ?>/news/index">News</a>
    </li> 
    <li class="nav-item">
        <a class="item-nav" href="<?php echo URLROOT; ?>/categories/index">Category</a>
    </li>
     <li class="nav-item">
            <div class="input-group">
        <div class="form-outline">
            <form action="<?php echo URLROOT; ?>/news/searchNews" method="POST">
            <input type="text"  name="search" class="form-control" />
            <input class="btn btn-primary" type="submit" value="Search">
            </form>
        </div>
        
        
</li>   

     </li>
      <li class="nav-item">
      <?php if(isset($_SESSION['admin_id'])) : ?>
            
                <a class="nav-link" href="<?php echo URLROOT; ?>/admins/logout">Log out</a>
            <?php else : ?>
                <a  class="nav-link" href="<?php echo URLROOT; ?>/admins/login">Login</a>
            <?php endif; ?>
      </li>

      
    </ul>
  </div>
</nav>
</div>