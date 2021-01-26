<!doctype html>
<html lang="fr">

    <head>
        <title>Inscription</title>
        <!-- inclusion des head -->
        <?php include_once 'Vue/includes/head.php'?>
    </head>
    
	<body>

		<div class="container_general">
			<!-- Inclusion du header -->
			<?php include_once 'Vue/includes/header.php'?>
				
			<!-- Main -->
			<main class="container_main"> 
				<section class="container_main_block">
					<form class="container_form" action="" method="POST">	
					<h1>CREER UN COMPTE</h1>
					
						<div class="block_send">
							<label>login</label>
							<input type="text"  name="login">
						</div>
						<div class="block_send">
							<label>Email</label>
							<input type="text"  name="email">
						</div>
						<div class="block_send">
							<label>Password</label>
							<input type="password" name="password">
						</div>	
						<div class="block_send">
							<label>Confirm</label>
							<input type="password" name="password2">
						</div>		
						<div class="block_submit">
							<input type="submit" name="submit" value="GO">
						</div>
					</form>
				</section>
			</main>    

			<!--Inclusion du Footer -->
			<?php include_once 'Vue/includes/footer.php'?>

				<!--Inclusion des Scripts -->
				<script src="Assets/js/app.js"></script> 
		</div>
    </body>
    
</html>

<style>


</style>