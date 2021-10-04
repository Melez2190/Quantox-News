<?php
   require APPROOT . '/views/includes/head.php';
?>


    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="navbar">
<form action="<?php echo URLROOT; ?>/admins/login" method ="POST">
		<div class="login-box">
			<h1>Login</h1>

			
                <input class="textbox" type="text" placeholder="Name *" name="name">
				<i class="fa fa-user" aria-hidden="true"></i>

                    <span class="invalidFeedback">
                <?php echo $data['usernameError']; ?>
                    </span>
			

           

			
				<input type="password" placeholder="Password *" name="password">
				<i class="fa fa-lock" aria-hidden="true"></i>

                    <span class="invalidFeedback">
                        <?php echo $data['passwordError']; ?>
                    </span>
		
    
			<button id="submit" class="btn btn-danger" type="submit" value="submit">Submit</button>

            
		</div>
        </form>