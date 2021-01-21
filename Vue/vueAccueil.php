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
                <div class="container_nav">
                    <div class="site_title">
                        <h1 class="logo">Umami</h1>
                        <p class="subtitle">A blog exploring new flavor</p>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="index.php?page=inscription">Inscription</a></li>
                            <li><a href="index.php?page=connexion">Connexion</a></li>
                            <!-- <li><a href="index.php?page=profil">profil</a></li> -->
                            <li><a href="index.php?page=articles">Articles</a></li>
                            <!-- <li><a href="index.php?page=creer_article">creer_article</a></li> -->
                            <!-- <li><a href="index.php?page=admin">Admin</a></li> -->
                        </ul>
                    </nav>
                </div>      
            </header>

          <section class="container_intro">    <!-- partie intro du haut -->
                <!-- <article class="intro_featured"> -->
                    <img src="Assets/images/blue.png" alt="" class="intro_image">
                <!-- </article> -->
            </section>

            <section class="container_subintro">  <!-- partie intro du haut -->
                <article class="subintro_featured">
                   <h2>"Eating is a necessity but cooking is an art"</h2>
                </article>
            </section>

            <section class="container_main">  <!-- CONTAINER DE ARTICLES + ASIDE ------>  

                <main class="home_main">   <!--MAIN avec les 3 articles a gauche -->
                    <?php foreach ($billets as $billet): ?>
                    <article class="home_article_each">  <!-- partie qui englobe chaque article -->
                        <div class="home_article_each_image"> <!-- partie image de chaque article -->
                        <?php
                            // Affiche l'image de l'article (blob) si elle existe ou alors une image par defaut
                            if($billet['data'] != '') { 
                            echo "<img class='image_article' src='display.php?display=$billet[id]'>";
                            }
                            else echo "<img src='Assets/images/default.jpg'>"; //200 par 160px     
                        ?>
                        </div> <!-- FIN partie image de chaque article \\\\ -->
                        <div class="home_article_each_text"> <!-- partie texte de chaque article -->
                            <a href="<?= "index.php?page=article&id=" . $billet['id'] ?>"><h2 class="article_title"><?= $billet['titre'] ?></h2></a>
                            <p class="article_content">Le : <?= $billet['date'] ?></p>
                            <p class="article_content">Categorie : <?= $billet['categorie'] ?></p>
                            <p class="article_content"><?= $billet['article'] ?></p>
                            <a class="boutton_continue" href="<?= "index.php?page=article&id=" . $billet['id'] ?>"><p>Continue reading</p></a>
                        </div> <!--FIN partie texte de chaque article \\\\\\ -->
                    </article>  <!--FIN  partie qui englobe chaque article \\\\\ -->
                    <?php endforeach; ?>
                </main>  <!-- FIN DU MAIN avec les 3 articles \\\\\-->
            
                <aside class="home_aside">  <!-- PARTIE ASIDE,a propos etc... -->
                    <div class="aside_widget">  <!-- premier aside en haut "a propos" -->
                        <h3 class="widget_title">A propos</h3>
                        <img src="Assets/images/perso.jpg" alt="" class="widget_image">
                        <p class="widget_body">Food and drinks lover, always looking for new taste and savor i'm sharing with you some of my secret recipes.</p>
                    </div> <!--FIN premier aside en haut "a propos//\\\\" -->
                    <div class="aside_widget"> <!-- deuxieme aside en bas avec les 3 widget collab -->
                        <h3 class="widget_title">Work in a team</h3>
                        <div class="widget_collab">
                            <h2 class="widget_collab_title"></h2>
                            <img src="Assets/images/team.jpg" alt="" class="widget_image">
                            <p class="widget_body">Want to learn how to work in a "brigade" team ? Ask us to book an appointment.</p>
                        </div>
                        <div class="widget_collab">
                            <h3 class="widget_collab_title">Want to make pizzas ?</h3>
                            <img src="Assets/images/pizza.jpg" alt="" class="widget_image">
                            <p class="widget_body">The most emblematic Italian dish revealed with an ancestral italian grandmother's recipe.</p>
                        </div>    
                        <div class="widget_collab">
                            <h3 class="widget_collab_title">Need a chef to learn ?</h3>
                            <img src="Assets/images/chef.jpg" alt="" class="widget_image">
                            <p class="widget_body">You need someone to take care of your journey into the culinary arts ? Keep us in touch.</p>
                        </div><!--FIN deuxieme aside en haut "a propos//\\\\" -->        
                    </div>
                </aside> <!--  FIN PARTIE ASIDE ,a propos etc...\\\\ -->  

            </section> <!--\\//\\\/// FIN CONTENEUR PRINCIPAL\\///\\\/---------->
                            
            <footer class="home_footer">
                <setion class="foot_container_main">
                    <article class="foot_block">
                        <div class="foot_logo"> 
                            <h1>Umami</h1>     
                        </div>
                        <div class="foot_social"> 
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-twitch"></i></a>                  
                        </div>
                    </article>

                    <article class="foot_block">
                        <h4>About</h4>
                        <a href="index.php">Our strory</a>
                        <a href="index.php">Methodology</a>
                        <a href="index.php">Keep in touch</a>
                    </article>

                    <article class="foot_block">
                        <h4>Contact</h4>
                        <a href="index.php">Contact us</a>
                        <a href="index.php">Press</a>  
                    </article>
                    
                    <article class="foot_block">
                        <h4>Download</h4>
                        <a href="index.php"> Apple Store</a>
                        <a href="index.php">Google Play</a>
                        <a href="index.php">Stadia</a>  
                    </article>
                </setion>
                <div class="foot_production">
                    <p>Yaya-production™</p>
                </div>
            </footer>
            <!--Inclusion du Footer -->
            <?php include_once 'Vue/includes/footer.php'?>

            <!--Inclusion des Scripts -->     
            <script src="Assets/js/app.js"></script> 
    </body>
</html>
