<?php $titre = "Articles"; ?>


<!-- gabarit :-------------------- -->
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/style.css" />
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreBlog">ARTICLES</h1></a>
                <p>PAGE AVEC TOUS LES ARTICLES</p>
            </header>
            <div id="contenu">
                <?php  foreach($categories as $cat): 
                    echo "<p><a href=index.php?articles.php&page=articles&categorie=".$cat['id'].">".$cat['nom']."</a></p>";
                    // index.php?page=articles&categorie=1
                endforeach; ?>
            </div> 

            <div class="articles">
                <?php  foreach($request as $result): 

                    echo "<div class='billets'><h3>".$result['titre']."</h3>
                        <p>".$result['date']."</p>
                        <p>".$result['article']."</p>
                        <a href=index.php?page=article&id=".$result['id'].">Accedez à l'article</a></div>";

                endforeach; ?>
            </div>

            <div>
                <?php if(isset($bouton_precedent)): echo $bouton_precedent; endif; ?>
            </div>
            <div>
                <?php if(isset($bouton_suivant)): echo $bouton_suivant; endif; ?>
            </div>
            <footer id="piedBlog">
              Ceci est un footer
            </footer>
        </div> <!-- #global -->
    </body>
</html>

<style>

.billets{
    border: solid 1px black;
    margin-bottom: 5px;
}
</style>