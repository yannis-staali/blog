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

            <header>
                <div class="container container_nav">
                    <div class="site_title">
                        <h1>Umami</h1>
                        <p class="subtitle">A blog exploring new flavor</p>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="index.php?page=inscription">inscription</a></li>
                            <li><a href="index.php?page=connexion">connexion</a></li>
                            <!-- <li><a href="index.php?page=profil">profil</a></li> -->
                            <li><a href="index.php?page=articles">articles</a></li>
                            <!-- <li><a href="index.php?page=creer_article">creer_article</a></li> -->
                            <!-- <li><a href="index.php?page=admin">Admin</a></li> -->
                        </ul>
                    </nav>
                </div>      
            </header>

            <section class="container container_flex">  <!-- partie intro du haut -->
                <article class="intro_featured">
                    <h2 class="intro_title">Looking for perfection</h2>
                    <img src="Assets/images/mix4.jpg" alt="" class="intro_image">
                    <p class="intro_info">We are always improving our skills to provide the best experience</p>
                    <p class="intro_body">At the Food-lab we have the best R&D departement of the country where    
                    we can explore the limits of food and catering</p>
                    <a href="#" class="intro_more">Tell me more</a>
                </article>
            </section>

            <section class="container container_flex container_main">  <!-- CONTAINER DE ARTICLES + ASIDE ------>  

                <main class="home_main">   <!--MAIN avec les 3 articles a gauche -->
                    <?php foreach ($billets as $billet): ?>
                    <article class="home_article_each">  <!-- partie qui englobe chaque article -->
                        <div class="home_article_each_image"> <!-- partie image de chaque article -->
                        <?php
                            // Affiche l'image de l'article (blob) si elle existe ou alors une image par defaut
                            if($billet['data'] != '') { 
                            echo "<img src='display.php?display=$billet[id]'>";
                            }
                            else echo "<img src='Assets/images/default.jpg'>"; //200 par 160px     
                        ?>
                        </div> <!-- FIN partie image de chaque article \\\\ -->
                        <div class="home_article_each_text"> <!-- partie texte de chaque article -->
                            <a href="<?= "index.php?page=article&id=" . $billet['id'] ?>"><h2 class="article_title"><?= $billet['titre'] ?></h2></a>
                            <p class="article_content">Le : <?= $billet['date'] ?></p>
                            <p class="article_content">Categorie : <?= $billet['categorie'] ?></p>
                            <p class="article_content"><?= $billet['article'] ?></p>
                        </div> <!--FIN partie texte de chaque article \\\\\\ -->
                    </article>  <!--FIN  partie qui englobe chaque article \\\\\ -->
                    <?php endforeach; ?>
                </main>  <!-- FIN DU MAIN avec les 3 articles \\\\\-->
            
                <aside class="home_aside">  <!-- PARTIE ASIDE,a propos etc... -->
                    <div class="aside_widget">
                        <h2 class="widget_title">A propos</h2>
                        <img src="Assets/images/perso.jpg" alt="" class="widget_image">
                        <p class="widget_body"></p>
                    </div>
                    <div class="aside_widget">
                        <h2 class="widget_title">Work in a team</h2>
                        <div class="widget_collab">
                            <h2 class="widget_collab_title"></h2>
                            <img src="Assets/images/team.jpg" alt="" class="widget_image">
                        </div>
                    <div class="widget_collab">
                        <h2 class="widget_collab_title">Want to make pizzas ?</h2>
                        <img src="Assets/images/pizzafume.gif" alt="" class="widget_image">
                    </div>    
                    <div class="widget_collab">
                        <h2 class="widget_collab_title">Need a chef to learn ?</h2>
                        <img src="Assets/images/chef.jpg" alt="" class="widget_image">
                    </div>        
                    </div>
                </aside> <!--  FIN PARTIE ASIDE ,a propos etc...\\\\ -->  

            </section> <!--\\//\\\/// FIN CONTENEUR PRINCIPAL\\///\\\/---------->
                            
            <footer class="home_footer">
                <p>Ceci est un Footer</p>
            </footer>
            <!--Inclusion du Footer -->
            <?php include_once 'Vue/includes/footer.php'?>

            <!--Inclusion des Scripts -->     
            <script src="Assets/js/app.js"></script> 
    </body>
</html>
