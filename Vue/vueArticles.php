<!doctype html>
<html lang="fr">

    <head>
        <title>Accueil</title>
        <!-- inclusion des head -->
        <?php include_once 'Vue/includes/head.php'?>
    </head>

    <body>
        <div class="container_general_articles">
             <!-- Inclusion du header -->
             <?php include_once 'Vue/includes/header.php'?>

           
            <main class="container_main_articles"> 
                     <!-- Affichage des categories -->
                    <section class="articles_categories_list">
                        <h2 class="articles_categories_titles">Categories</h2>
                        <?php  foreach($categories as $cat): ?>
                            <?php
                            echo "<p><a href=index.php?page=articles&categorie=".$cat['id'].">".$cat['nom']."</a></p>";
                            // echo "<p><a href=index.php?articles.php&page=articles&categorie=".$cat['id'].">".$cat['nom']."</a></p>";
                            // index.php?page=articles&categorie=1
                            ?>
                        <?php endforeach; ?>
                    </section> 
                    
                    <section class="container_articles_each">
                        <?php  foreach($request as $result): 
                            echo "<div class='contain_both' ";
                                echo "<article class='image_block_id_articles'>";
                                if($result['data'] != '')
                                {
                                    echo "<img class='image_id_articles' src='display.php?display=$result[id]'>";
                                }
                                else echo "<img class='image_id_articles' src='Assets/images/default.jpg'>"; 
                                echo "</article>";

                                echo "<div class='texte_block_id_articles'><h3>".$result['titre']."</h3>
                                    <p>Le : ".$result['date']."</p>
                                    <p>".$result['article']."</p>
                                    <a href=index.php?page=article&id=".$result['id'].">Accedez à l'article</a>"; 
                                    echo "</div>";
                            echo "</div>";
                        endforeach; ?>
                    </section>
            </main>   

                    <section class="pagination_container">
                        <article class="pagination_main">
                            <?php
                            //\\\\\\\\\\\\\\PAGINATION\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                            //page precedente
                            if($currentpage >1)
                            {
                                if(isset($_GET['categorie']))
                                {
                                    $categorie = $_GET['categorie'];
                                    $precedent = $currentpage -1;
                                    echo "<a href=index.php?page=articles&categorie=$categorie&pagination=$precedent>Précédente</a>";

                                }
                                elseif(!isset($_GET['categorie']))
                                {
                                    $precedent = $currentpage -1;
                                    echo "<a href=index.php?page=articles&pagination=$precedent>Précédente</a>";
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
                                    echo "&nbsp$currentpage";
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
                                    echo "<a href=index.php?page=articles&categorie=$categorie&pagination=$suivant>Suivante(cat) </a>";

                                }
                                elseif(!isset($_GET['categorie']))
                                {
                                    $suivant = $currentpage +1;
                                    echo "<a href=index.php?page=articles&pagination=$suivant>Suivante</a>";
                                }
                                
                            } 
                            ?>
                        </article>
                    </section>

                    <!--Inclusion du Footer -->
                    <?php include_once 'Vue/includes/footer.php'?>

                    <!--Inclusion des Scripts -->
                    <script src="Assets/js/app.js"></script> 
                    
       </div> <!-- FIN du conteneur general ////\\\\///\\/\\-->
    </body>
</html>

