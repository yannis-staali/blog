<!doctype html>
<html lang="fr">

    <head>
        <title>Accueil</title>
        <!-- inclusion des head -->
        <?php include_once 'Vue/includes/head.php'?>
    </head>
    
	<body class="body_home">
		 <!-- Inclusion du header -->
		 <?php include_once 'Vue/includes/header.php'?>

        <!-- Main -->
        <main class="connexion_main"> 
            <section class="connexion_box_form">
				<h1>Connexion</h1>
				<form action="" method="POST">
					
					<div class="log_form">
					<label><b>login</b></label>
					<input type="text"  name="login">
					</div>

					<div class="pass_form">
					<label><b>Password</b></label>
					<input type="password" name="password">
					</div>
					
					<div class="submit">
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