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
                <!-- <?= $contenu ?> -->
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Blog réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>