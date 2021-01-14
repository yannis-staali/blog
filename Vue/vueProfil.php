<!doctype html>
<html lang="fr">

    <head>
        <title>Profil</title>
        <!-- inclusion des head -->
        <?php include_once 'Vue/includes/head.php'?>
    </head>
    
	<body class="">
		<!-- Inclusion du header -->
        <?php include_once 'Vue/includes/header.php'?>

        <main class=""> 
            <section class="">
				<h1 class="title_register">MODIFE TON PROFIL</h1>
				<form action="" method="POST">
					
					<div class="">
					<label><b>login</b></label>
					<input type="text"  name="login">
					</div>

                    <div class="">
					<label><b>Email</b></label>
					<input type="text"  name="email">
					</div>

					<div class="">
					<label><b>Password</b></label>
					<input type="password" name="password">
					</div>
                    
                    <div class="">
					<label><b>Confirm</b></label>
					<input type="password" name="password2">
                    </div>
                    
					<div class="">
					<input type="submit" id='submit' name="submit" value="GO">
					</div>
				</form>
			</section>
        </main> 

        <!--Inclusion du Footer -->
        <?php include_once 'Vue/includes/footer.php'?>

        <!--Inclusion des Scripts -->
		<?php //include_once 'Vue/includes/scripts.php'?>        
        <script src="Assets/js/app.js"></script> 
    </body>
    
</html>