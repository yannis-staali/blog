<!doctype html>
<html lang="fr">

    <head>
        <title>Article</title>
        <!-- inclusion des head -->
        <?php include_once 'Vue/includes/head.php'?>
    </head>

    <body>
        <!-- Inclusion du header -->
        <?php include_once 'Vue/includes/header.php'?>

        <!-- Affichage des articles -->
        <article> 
        <?php foreach ($billets as $billet): ?>
                    <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
        
                <p>Posté par : <?= $billet['login'] ?></p>
                <p>Le : <?= $billet['date'] ?></p>
            </header>
            <p>Categorie : <?= $billet['categorie'] ?></p>
            <p><?= $billet['article'] ?></p>
        <?php endforeach; ?>
        </article>
        
        <!-- Affichage des commentaires -->
        <section class="comm">
            <?php foreach($commentaires as $comm): ?>
                <div class="billet">
                <p>Posté par : <?= $comm['login'] ?></p>
                <p>Le : <?= $comm['date'] ?></p>
                <p><?= $comm['commentaire'] ?></p>

                </div>
            <?php endforeach; ?>
        </section>
        <hr />

         <!-- L'ajout de commentaire n'est possible que si l'utilisateur est connecté -->
         <?php if($_SESSION['utilisateur']): ?>       
        <!-- formulaire d'ajout de commentaire -->
        <h1 class="">Mettre un commentaire</h1>
				<form action="" method="POST">
					
					<div class="">
					<label>Votre commentaire</label>
                    <textarea name="com_sub" rows="5" cols="30" placeholder="Texte article"></textarea>
					<!-- <input type="text"  name="login"> -->
					</div>
                    
					<div class="submit">
					<input type="submit" id='submit' name="submit">
					</div>
				</form>
          <?php endif; ?>      

        <!--Inclusion du Footer -->
        <?php include_once 'Vue/includes/footer.php'?>

        <!--Inclusion des Scripts -->
        <?php //include_once 'Vue/includes/scripts.php'?>        
        <script src="Assets/js/app.js"></script>  
    </body>

<style>

.billet{
    border: 2px solid black;
    margin-bottom: 2px;
}
</style>