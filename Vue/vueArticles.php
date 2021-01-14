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

                <?php
                //ici morceau de code pour faire la pagination
                //rajouter un if a chaque fois pour filtrer la categorie
                if($currentpage >1)
                {
                    $precedent = $currentpage -1;
                    echo "<a href=index.php?page=articles&pagination=$precedent> Page précédente </a>";
                }

                $j = 2;
                for($i=2; $i<=$pages; $i++)
                {
                    echo "<a href=index.php?page=articles&pagination=$j> Page $j</a>";
                    $j++;
                }

                if($currentpage < $pages)
                {
                    $suivant = $currentpage +1;
                    echo "<a href=index.php?page=articles&pagination=$suivant> Page suivante</a>";
                }
                ?>

            <div>
                <?php if(isset($bouton_precedent)): echo $bouton_precedent; endif; ?>
            </div>
            <div>
                <?php if(isset($bouton_suivant)): echo $bouton_suivant; endif; ?>
            </div>
            <footer id="piedBlog">
              Ceci est un footer
            </footer>
        </div> 

         <!--Inclusion du Footer -->
         <?php include_once 'Vue/includes/footer.php'?>

         <!--Inclusion des Scripts -->
         <?php //include_once 'Vue/includes/scripts.php'?>        
        <script src="Assets/js/app.js"></script> 

    </body>
</html>

<style>

.billets{
    border: solid 1px black;
    margin-bottom: 5px;
}
</style>