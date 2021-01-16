<!doctype html>
<html lang="fr">

    <head>
        <title>Accueil</title>
        <!-- inclusion des head -->
        <?php include_once 'Vue/includes/head.php'?>
    </head>

    <body>
        <!-- Inclusion du header -->
        <?php include_once 'Vue/includes/header.php'?>

        <!-- Main -->
        <main>
            <section id="global">
                <header>
                    <a href="index.php"><h1 id="titreBlog">Mon Blog</h1></a>
                    <a href="index.php?page=inscription"><h1 >Page inscription</h1></a>
                    <a href="index.php?page=connexion"><h1 >Page connexion</h1></a>
                    <a href="index.php?page=profil"><h1 >Page profil</h1></a>
                    <a href="index.php?page=articles"><h1 >Page articles</h1></a>
                    <a href="index.php?page=creer_article"><h1 >Page creer_article</h1></a>
                    <a href="index.php?page=admin"><h1 >Page Admin</h1></a>
                </header>
            <section id="contenu">
            <section>
                <?php foreach ($billets as $billet): ?>
                    
                        <header>
                            <a href="<?= "index.php?page=article&id=" . $billet['id'] ?>">
                                <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
                            </a>
                            <p>Le : <?= $billet['date'] ?></p>
                        </header>
                        <p>Categorie : <?= $billet['categorie'] ?></p>
                        <p><?= $billet['article'] ?></p>         
                        <hr />
                        <?php
                        if($billet['data'] != '')
                        {
                            echo "<img src='display.php?display=$billet[id]'>";
                        }
                        ?>
                <?php endforeach; ?>
            </section>
        </main>

        <!--Inclusion du Footer -->
        <?php include_once 'Vue/includes/footer.php'?>

        <!--Inclusion des Scripts -->
		<?php //include_once 'Vue/includes/scripts.php'?>        
        <script src="Assets/js/app.js"></script> 
    </body>
</html>