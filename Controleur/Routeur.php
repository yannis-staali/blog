<?php
require_once 'Controleur/ControleurBillet.php';

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurInscription.php';
require_once 'Controleur/ControleurConnexion.php';
require_once 'Controleur/ControleurProfil.php';
require_once 'Controleur/ControleurArticles.php';
require_once 'Controleur/ControleurArticle.php';
require_once 'Controleur/ControleurCreer_article.php';
require_once 'Controleur/ControleurAdmin.php';
// require_once 'Vue/Vue.php';

class Routeur 
{
    // private $ctrlBillet;
    private $ctrlAccueil;
    private $ctrlInscription;
    private $ctrlConnexion;
    private $ctrlProfil;
    private $ctrlArticles;
    private $ctrlArticle;
    private $ctrlCreer_article;
    private $ctrlAdmin;

    public function __construct() 
    {   
        // $this->ctrlBillet = new ControleurBillet();
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlInscription = new ControleurInscription();
        $this->ctrlConnexion = new ControleurConnexion();
        $this->ctrlProfil = new ControleurProfil();
        $this->ctrlArticles = new ControleurArticles();
        $this->ctrlArticle = new ControleurArticle();
        $this->ctrlCreer_article = new ControleurCreer_article();
        $this->ctrlAdmin = new ControleurAdmin();
    }

    // Route une requête entrante : exécution l'action associée
    // c'est ici qu'on va choisir le bon controleur en fonction du choix de page
    public function routerRequete() 
    {
            if (isset($_GET['page'])) 
            {
                //charge la page billet
                if ($_GET['page'] == 'billet')
                {
                    // $idBillet = intval($this->getParametre($_GET, 'id'));
                    // $this->ctrlBillet->billet($idBillet);
                }
                if ($_GET['page'] == 'inscription')
                {
                    $this->ctrlInscription->route_inscription();
                }
                if ($_GET['page'] == 'connexion')
                {
                    $this->ctrlConnexion->route_connexion();
                }
                if ($_GET['page'] == 'profil')
                {
                    $this->ctrlProfil->route_profil();
                }
                if ($_GET['page'] == 'articles') //tous les articles
                {
                    $this->ctrlArticles->route_articles();
                }
                if ($_GET['page'] == 'article') // un seul en particulier // a rajouter id
                {
                    $this->ctrlArticle->route_article();
                }
                if ($_GET['page'] == 'creer_article') 
                {
                    $this->ctrlCreer_article->route_creer_article();
                }
                if ($_GET['page'] == 'admin')
                {
                    $this->ctrlAdmin->route_admin();
                }
                // else if ($_GET['action'] == 'commenter') 
                // {
                //     $auteur = $this->getParametre($_POST, 'auteur');
                //     $contenu = $this->getParametre($_POST, 'contenu');
                //     $idBillet = $this->getParametre($_POST, 'id');
                //     $this->ctrlBillet->commenter($auteur, $contenu, $idBillet);
                // }
            }
            else 
            {  
                $this->ctrlAccueil->route_accueil(); // aucune action définie : affichage de l'accueil
            }
    }
    
    // // Affiche une erreur
    // private function erreur($msgErreur) 
    // {
    //     $vue = new Vue("Erreur");
    //     $vue->generer(array('msgErreur' => $msgErreur));
    // }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) 
    {
        if (isset($tableau[$nom])) 
        {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }

}
