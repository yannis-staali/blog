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
        $sql = 'SELECT articles.id, articles.article, articles.date, articles.titre, categories.nom as categorie, utilisateurs.login 
                FROM articles 
                INNER JOIN categories on categories.id = articles.id_categorie
                INNER JOIN utilisateurs on utilisateurs.id = articles.id_utilisateur
                ORDER BY date desc 
                LIMIT 3';
        $billets = parent::executerRequete($sql); // on utilise la methode du parent
        return $billets;
    }

    /**
     * Permet d'afficher un billet de blog en particulier
     */
    public function showBillet($id) {
        $sql = "SELECT articles.article, articles.date, articles.titre, categories.nom as categorie, utilisateurs.login 
                FROM articles 
                INNER JOIN categories on categories.id = articles.id_categorie
                INNER JOIN utilisateurs on utilisateurs.id = articles.id_utilisateur
                WHERE articles.id = '$id'
                ORDER BY date desc ";
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
     * Recupère les articles après filtre de categorie
     */
    public function get_art_bycategorie($categorie, $offset)
    {
        $sql = "SELECT articles.id, articles.article, articles.date, articles.titre
                FROM articles 
                WHERE id_categorie = $categorie
                ORDER BY date desc 
                LIMIT 5
                OFFSET $offset";
        $request = parent::executerRequete($sql); // on utilise la methode du parent
        return $request;
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
     * Recupère les articles après filtre de categorie
     */
    public function get_art_byoffset($offset)
    {
        $sql = "SELECT articles.id, articles.article, articles.date, articles.titre
                FROM articles 
                ORDER BY date desc 
                LIMIT 5
                OFFSET $offset";
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

    /**
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
     * Permet d'inserer une nouvelle categorie
     */
    public function insert_categorie($nomcat)
    {
        $sql = "INSERT INTO categories (nom)
                VALUE (?)";
        $request = parent::executerRequete($sql, array($nomcat)); // on utilise la methode du parent
    }

    public function get_id_categorie($nomcat)
    {
        $sql = "SELECT id FROM categories WHERE nom = '$nomcat' ";
        // $sql = "SELECT * FROM categories ";

        $request2 = parent::executerRequete($sql); // on utilise la methode du parent
        $retour = $request2->fetch(PDO::FETCH_ASSOC);
        return $retour;
    }
}