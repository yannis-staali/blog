<?php

/**
 * Permet d'afficher les images en BLOB de la bdd
 * On effectue une requete de recuperation de l'image
 * on l'echo à la fin 
 * (l'image est identifié grace a l'id de l'article que l'on met dans $_GET['display'])
 * 
 * C'est comme si ce fichier hebergeait l'image lorqu'on fait appel a lui (voir dans la vue Accueil.php)
 *
 *  echo "<img class='image_article' src='display.php?display=$billet[id]'>";
 */
    $dbh = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $id = isset($_GET['display'])? $_GET['display'] : "";

    $stat = $dbh->prepare("SELECT * FROM articles WHERE id=?");

    $stat->bindParam(1, $id);
    $stat->execute();
    $row = $stat->fetch();

    // header('Content-Type:'.$row['mime']);
    echo $row['data'];
  
?>