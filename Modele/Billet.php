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
     * Il faudra rajouter la catégorie et le nom de l'auteur
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

    /** Renvoie les informations sur un billet
     * 
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    // public function getBillet($idBillet) {
    //     $sql = 'select BIL_ID as id, BIL_DATE as date,'
    //             . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
    //             . ' where BIL_ID=?';
    //     $billet = $this->executerRequete($sql, array($idBillet));
    //     if ($billet->rowCount() > 0)
    //         return $billet->fetch();  // Accès à la première ligne de résultat
    //     else
    //         throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    // }


}