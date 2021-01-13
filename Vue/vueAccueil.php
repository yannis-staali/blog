<?php $titre = "Mon Blog"; ?>

<?php foreach ($billets as $billet):
    ?>
    <article>
        <header>
            <a href="<?= "index.php?page=article&id=" . $billet['id'] ?>">
                <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
            </a>
            <p>Le : <?= $billet['date'] ?></p>
        </header>
        <p>Categorie : <?= $billet['categorie'] ?></p>
        <p><?= $billet['article'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>

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
                <a href="index.php"><h1 id="titreBlog">Mon Blog</h1></a>
                <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
                <a href="index.php?page=inscription"><h1 >Page inscription</h1></a>
                <a href="index.php?page=connexion"><h1 >Page connexion</h1></a>
                <a href="index.php?page=profil"><h1 >Page profil</h1></a>
                <a href="index.php?page=articles"><h1 >Page articles</h1></a>
                <a href="index.php?page=creer_article"><h1 >Page creer_article</h1></a>
                <a href="index.php?page=admin"><h1 >Page Admin</h1></a>
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