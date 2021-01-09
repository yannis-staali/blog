<?php $titre = "Mon Blog"; ?>

<?php foreach ($billets as $billet):
    ?>
    <article>
        <header>
            <!-- <a href="<?= "index.php?page=article&id=" . $billet['id'] ?>"> -->
                <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
            </a>
            <p>Posté par : <?= $billet['login'] ?></p>
            <p>Le : <?= $billet['date'] ?></p>
        </header>
        <p>Categorie : <?= $billet['categorie'] ?></p>
        <p><?= $billet['article'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>
<!-- Il faudra ajouter les commentaires et un formulaire d'ajout de commentaire -->
<!-- Refaire une boucle foreach avec les commentaires -->