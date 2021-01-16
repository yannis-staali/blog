<?php
    $dbh = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $id = isset($_GET['display'])? $_GET['display'] : "";

    $stat = $dbh->prepare("SELECT * FROM articles WHERE id=?");

    $stat->bindParam(1, $id);
    $stat->execute();
    $row = $stat->fetch();

    // header('Content-Type:'.$row['mime']);
    echo $row['data'];
  
?>