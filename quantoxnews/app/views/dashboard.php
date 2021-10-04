
<?php require_once 'includes/head.php';  ?>
<?php require_once 'includes/navigation.php';  ?>


<main>
  

  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="index" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      
      <span class="fs-4">Admin Dashboard</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
     
      <li>
        <a href="index.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo URLROOT ?>/news/index" class="nav-link text-white" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          News
        </a>
      </li>
      <li>
        <a href="<?php echo URLROOT ?>/categories/index" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
         Category
        </a>
      </li>
      <li>
        <a href="<?php echo URLROOT ?>/subscriptions/index" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Subscribers
        </a>
      </li>
    </ul>
    <hr>
    <div class="container">
    <?php if(isLoggedIn()): ?>
        <a class="btn green" href="<?php echo URLROOT; ?>/categories/createCategory">
            Create Category
        </a>
    <?php endif; ?>
  </div>

  <div class="container">
    <?php if(isLoggedIn()): ?>
        <a class="btn green" href="<?php echo URLROOT; ?>/news/createNews">
            Create News
        </a>
    <?php endif; ?>

   
  </div>
  <div class="container">
    <?php if(isLoggedIn()): ?>
        <a class="btn green" href="<?php echo URLROOT; ?>/news/index">
            Update/Delete News
        </a>
    <?php endif; ?>
  </div>

    <div class="container">
    <?php if(isLoggedIn()): ?>
        <a class="btn green" href="<?php echo URLROOT; ?>/categories/index">
            Update/Delete Category
        </a>
    <?php endif; ?>
    </div>

 
  
  
</main>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="sidebars.js"></script>
     
  </body>
</html>