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
                    echo "<p><a href=index.php?page=articles&categorie=".$cat['id'].">".$cat['nom']."</a></p>";
                    // echo "<p><a href=index.php?articles.php&page=articles&categorie=".$cat['id'].">".$cat['nom']."</a></p>";
                    // index.php?page=articles&categorie=1
                endforeach; ?>
            </div> 

            <div class="articles billets">
                <?php  foreach($request as $result): 

                    echo "<div class='billets'><h3>".$result['titre']."</h3>
                        <p>Le : ".$result['date']."</p>
                        <p>".$result['article']."</p>
                        <a href=index.php?page=article&id=".$result['id'].">Accedez à l'article</a>";
                        if($result['data'] != '')
                        {
                            echo "<img src='display.php?display=$result[id]'>";
                        }
                        echo "</div>";
                endforeach; ?>
            </div>

                <?php
                //\\\\\\\\\\\\\\PAGINATION\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                //page precedente
                if($currentpage >1)
                {
                    if(isset($_GET['categorie']))
                    {
                        $categorie = $_GET['categorie'];
                        $precedent = $currentpage -1;
                        echo "<a href=index.php?page=articles&categorie=$categorie&pagination=$precedent> Page précédente</a>";

                    }
                    elseif(!isset($_GET['categorie']))
                    {
                        $precedent = $currentpage -1;
                        echo "<a href=index.php?page=articles&pagination=$precedent> Page précédente</a>";
                    }
                }

                //numerotation des pages
                $j = 1;
                for($i=1; $i<=$pages; $i++)
                {   
                    if($j != $currentpage)
                    {   
                        if(isset($_GET['categorie']))
                        {
                            $categorie = $_GET['categorie'];
                            echo "<a href=index.php?page=articles&categorie=$categorie&pagination=$j> $j </a>";
                        }
                        elseif(!isset($_GET['categorie']))
                        {
                            echo "<a href=index.php?page=articles&pagination=$j> $j </a>";

                        }
                    }
                    if($j ==$currentpage)
                    {
                        echo $currentpage;
                    }
                    // echo $currentpage;
                    $j++;
                }   

                //page suivante
                if($currentpage < $pages)
                {
                    if(isset($_GET['categorie']))
                    {
                        $categorie = $_GET['categorie'];
                        $suivant = $currentpage +1;
                        echo "<a href=index.php?page=articles&categorie=$categorie&pagination=$suivant> Page suivante(cat) </a>";

                    }
                    elseif(!isset($_GET['categorie']))
                    {
                        $suivant = $currentpage +1;
                        echo "<a href=index.php?page=articles&pagination=$suivant> Page suivante</a>";
                    }
                    
                }
                echo'<pre>';
                echo 'page actuelle '. $currentpage;
                echo'<pre>';
                echo 'nombre d\'articles '. $count;
                echo'<pre>';
                echo 'nombre de pages '. $pages;

                ?>

            <div>
                <?php if(isset($bouton_precedent)): echo $bouton_precedent; endif; ?>
            </div>
            <div>
                <!-- <?php if(isset($bouton_suivant)): echo $bouton_suivant; endif; ?> -->
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