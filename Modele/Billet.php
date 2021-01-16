<?php

require_once 'Modele/Modele.php';


/**
 *  CETTE CLASSE DEVIENDRA LA CLASSE ARTICLE A LA FIN DE L'IMPLEMENTATION
 * 
 */
class Billet extends Model 
{

    /** 
     * 
     * Il faudra rajouter la catégorie et le nom de l'auteur dans la vue 
     * Cette methode permet d'afficher les 3 derniers billets pour la page accueil
     */
    public function getBillets() {
        $sql = "SELECT articles.data, articles.id, articles.article, DATE_FORMAT(articles.date, '%d/%m/%Y à %Hh') AS date, articles.titre, categories.nom as categorie, utilisateurs.login 
                FROM articles 
                INNER JOIN categories on categories.id = articles.id_categorie
                INNER JOIN utilisateurs on utilisateurs.id = articles.id_utilisateur
                ORDER BY date desc 
                LIMIT 3";
        $billets = parent::executerRequete($sql); // on utilise la methode du parent
        return $billets;
    }

    /**
     * Permet d'afficher un billet de blog en particulier
     */
    public function showBillet($id) {
        $sql = "SELECT articles.data, articles.id, articles.article, DATE_FORMAT(articles.date, '%d/%m/%Y à %Hh') AS date, articles.titre, categories.nom as categorie, utilisateurs.login
                FROM articles 
                INNER JOIN categories on categories.id = articles.id_categorie
                INNER JOIN utilisateurs on utilisateurs.id = articles.id_utilisateur
                WHERE articles.id = '$id'
                ORDER BY date desc ";
        $billets = parent::executerRequete($sql); // on utilise la methode du parent
        return $billets;
    }

    /**
     * Permet d'afficher les commentaires
     */
    public function showCommentaire($id)
    {
        $sql = "SELECT commentaires.commentaire, DATE_FORMAT(commentaires.date, '%d/%m/%Y à %Hh') AS date, utilisateurs.login
                FROM commentaires
                INNER JOIN utilisateurs on commentaires.id_utilisateur = utilisateurs.id 
                WHERE commentaires.id_article = $id ";
        $billets = parent::executerRequete($sql); // on utilise la methode du parent
        return $billets;

    }

    /**
     * Permet de recuperer les catégories du blog
     */
    public function getcategories()
    {
        $sql = "SELECT * FROM categories";
        $categories = parent::executerRequete($sql); // on utilise la methode du parent
        return  $categories;
    }

    /**
     * Permet juste de compter le nombre d'articles de telle categorie
     */
    public function count_articles_cat($categorie)
    {
        $sql = "SELECT* FROM articles WHERE id_categorie = $categorie";
        $count = parent::executerRequete($sql); // on utilise la methode du parent
        $count = $count->rowCount();
        return $count;
    }

    /**
     * Compte le nombre d'articles total
     */
    public function count_articles()
    {
        $sql = "SELECT* FROM articles";
        $count = parent::executerRequete($sql); // on utilise la methode du parent
        $count = $count->rowCount();
        return $count;
    }

    /**
     * Compte le nombre d'articles total
     */
    public function count_that()
    {
        $sql = "SELECT* FROM articles";
        $count = parent::executerRequete($sql); // on utilise la methode du parent
        $count = $count->rowCount();
        return $count;
    }

    /**
     * Recupère les articles après filtre de categorie
     * avec la modif pour recup le blob
     */
    public function get_art_bycategorie($categorie, $parPage, $premier)
    {
        $sql = "SELECT articles.id, articles.article, DATE_FORMAT(articles.date, '%d/%m/%Y à %Hh') AS date, articles.titre, articles.data
                FROM articles 
                WHERE id_categorie = $categorie
                ORDER BY date desc 
                LIMIT $parPage
                OFFSET $premier"; // la première variables est le LIMIT, la deuxieme est le OFFSET
        $request = parent::executerRequete($sql); // on utilise la methode du parent
        return $request;
    }

    /**
     * Recupère les articles après filtre de categorie
     * avec la modif pour recup le blob
     */     
    public function get_art_byoffset($parPage, $premier)
    {
        $sql = "SELECT articles.id, articles.article, DATE_FORMAT(articles.date, '%d/%m/%Y à %Hh') AS date, articles.titre, articles.data
                FROM articles 
                ORDER BY date desc 
                LIMIT $parPage
                OFFSET $premier";
        $request = parent::executerRequete($sql); // on utilise la methode du parent
        return $request;
    }

    /**
     * Permet de recuperer les categories pour la page creer_article
     * Et les placer dans le déroulant select
     */
    public function get_categories()
    {
        $sql = "SELECT * FROM categories";
        $request = parent::executerRequete($sql); // on utilise la methode du parent
         $request =  $request->fetchAll(PDO::FETCH_ASSOC);
        // $request =  $request->fetchColumn(1);

        return $request;
    }

    /**\\\\\\\\methode de recup si ça foire
     * Permet d'inseret un nouvel article
     */
    public function insert_billet($article, $id_utilisateur, $id_categorie, $date, $titre)
    {
        $sql = "INSERT INTO articles (article, id_utilisateur, id_categorie, date, titre)
                VALUE (?, ?, ?, ?, ?)";
        $request = parent::executerRequete($sql, array($article, $id_utilisateur, $id_categorie, $date, $titre)); // on utilise la methode du parent
        return  $request;
    }

    /**
     * ON VA TESTER AVEC LE BLOB
     */
    public function insert_billet2($article, $id_utilisateur, $id_categorie, $date, $titre, $data)
    {
        $sql = "INSERT INTO articles (article, id_utilisateur, id_categorie, date, titre, data)
                VALUE (?, ?, ?, ?, ?, ?)";
        $request = parent::executerRequete($sql, array($article, $id_utilisateur, $id_categorie, $date, $titre, $data)); // on utilise la methode du parent
        return  $request;
    }

     /**
     * Permet d'inseret un nouvel article
     */
    public function insert_commentaire($commentaire, $id_article, $id_utilisateur, $date)
    {
        $sql = "INSERT INTO commentaires (commentaire, id_article, id_utilisateur, date)
                VALUE (?, ?, ?, ?)";
        $request = parent::executerRequete($sql, array($commentaire, $id_article,  $id_utilisateur, $date)); // on utilise la methode du parent
        return  $request;
    }

    /**
     * Permet d'inserer une nouvelle categorie
     */
    public function insert_categorie($nomcat)
    {
        $sql = "INSERT INTO categories (nom)
                VALUE (?)";
        $request = parent::executerRequete($sql, array($nomcat)); // on utilise la methode du parent
    }

    /**
     * Permet de recuperer l'id d'une categorie 
     */
    public function get_id_categorie($nomcat)
    {
        $sql = "SELECT id FROM categories WHERE nom = '$nomcat' ";
        // $sql = "SELECT * FROM categories ";

        $request2 = parent::executerRequete($sql); // on utilise la methode du parent
        $retour = $request2->fetch(PDO::FETCH_ASSOC);
        return $retour;
    }

    //ICI PARTIE ADMIN

    /**
     * Permet à l'admin d'afficher une table
     */
    public function select_table($table)
    {
        $sql = "SELECT * FROM  $table  ";
        $request = parent::executerRequete($sql); // on utilise la methode du parent
        $retour = $request->fetchAll(PDO::FETCH_ASSOC);
        return $retour;
    }

    /**
     * Permet de supprimer une ligne de la table
     */
    public function delete_line($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = $id ";
        $request = parent::executerRequete($sql); // on utilise la methode du parent

    }
}