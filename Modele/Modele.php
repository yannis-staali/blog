<?php

/**
 * Classe abstraite Modele.
 * Centralise les services d'accès à une base de données.
 * Connexion + executer requete
 */
abstract class Model {

    /** Objet PDO d'accès à la BD */
    private $bdd;

    /**
     * Exécute une requête SQL éventuellement paramétrée
     * 
     * @param string $sql La requête SQL
     * @param array $params : Les valeurs associées à la requête
     * @return PDOStatement Le résultat renvoyé par la requête
     */
    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql); // exécution directe (ex pour les requetes SELECT)
        }
        else {
            $resultat = $this->getBdd()->prepare($sql);  // requête préparée (pour les INSERT etc...)
            $resultat->execute($params);
        }
        return $resultat;
    }

    /**
     * Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
     * 
     * @return PDO L'objet PDO de connexion à la BDD
     */
    private function getBdd() {
        // if ($this->bdd == null) {
            // Création de la connexion
            $this->bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8',
                    'root', '',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // }
        return $this->bdd;
    }

}