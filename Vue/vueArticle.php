<!doctype html>
<html lang="fr">

    <head>
        <title>Article</title>
        <!-- inclusion des head -->
        <?php include_once 'Vue/includes/head.php'?>
    </head>

<body>
    <div class="article_container_general">
            <!-- Inclusion du header -->
            <?php include_once 'Vue/includes/header.php'?>

            <!-- Main -->
        <main class="article_container_main"> 
                    <!-- Affichage des articles -->
                    <section class="article_container_each"> 
                            <?php foreach ($billets as $billet): ?>
                                <article class="article_image_block_id">
                                    <?php
                                    if($billet['data'] != '')
                                    {
                                        echo "<img class='article_image_id' src='display.php?display=$billet[id]'>";
                                    }
                                    else echo "<img class='article_image_id' src='Assets/images/default.jpg'>"; //200 par 160px    
                                    ?>
                                </article>
                                <article class="article_text_id">
                                    <h1 class="article_title_id"><?= $billet['titre'] ?></h1>   
                                    <p>Posté par : <?= $billet['login'] ?></p>
                                    <p>Le : <?= $billet['date'] ?></p>
                                    <p>Categorie : <?= $billet['categorie'] ?></p>
                                    <p><?= $billet['article'] ?></p>
                                </article>
                            <?php endforeach; ?>                   
                    </section>
                        
                        <!-- Affichage des commentaires -->
                    <section class="article_com_id">
                            <?php foreach($commentaires as $comm): ?>
                                <div class="article_each_com_id">
                                    <p>Posté par : <?= $comm['login'] ?></p>
                                    <p>Le : <?= $comm['date'] ?></p>
                                    <p><?= $comm['commentaire'] ?></p>
                                </div>
                            <?php endforeach; ?>
                    </section>
                    
                    <section class="article_block_form">
                            <!-- L'ajout de commentaire n'est possible que si l'utilisateur est connecté -->
                            <?php if($_SESSION['utilisateur']): ?>       
                            <!-- formulaire d'ajout de commentaire -->
                            <form class="article_form_add_com" action="" method="POST">
                                <div class="article_form_text">
                                    <label>Votre commentaire</label>
                                    <textarea name="com_sub" rows="5" cols="30" placeholder="Texte article"></textarea>
                                </div>  
                                <div class="article_form_submit">
                                    <input type="submit" id='submit' name="submit">
                                </div>
				            </form>        
                            <?php endif; ?>
                    </section>  
        </main>       
         

            <!--Inclusion du Footer -->
            <?php include_once 'Vue/includes/footer.php'?>

            <!--Inclusion des Scripts -->
            <?php //include_once 'Vue/includes/scripts.php'?>        
            <script src="Assets/js/app.js"></script>  
    </div>  
</body>
