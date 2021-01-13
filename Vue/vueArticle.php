

<?php foreach ($billets as $billet):
    ?>
    <article>
        <header>
                <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
       
            <p>Posté par : <?= $billet['login'] ?></p>
            <p>Le : <?= $billet['date'] ?></p>
        </header>
        <p>Categorie : <?= $billet['categorie'] ?></p>
        <p><?= $billet['article'] ?></p>
    </article>
    <?php endforeach; ?>
    <section class="comm">
        <?php foreach($commentaires as $comm): ?>
            <div class="billet">
            <p>Posté par : <?= $comm['commentaire'] ?></p>
            <p>Posté par : <?= $comm['date'] ?></p>
            <p>Posté par : <?= $comm['login'] ?></p>
            </div>
        <?php endforeach; ?>
    </section>
    <hr />

<!-- var_dump( $commentaires ); -->


<!-- Il faudra ajouter les commentaires et un formulaire d'ajout de commentaire -->
<!-- Refaire une boucle foreach avec les commentaires -->

<style>

.billet{
    border: 2px solid black;
    margin-bottom: 2px;
}
</style>