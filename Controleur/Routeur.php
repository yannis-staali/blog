<?php
session_start();

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

    // Route une requête entrante : exécution l'action associée
    // c'est ici qu'on va choisir le bon controleur en fonction du choix de page
    public function routerRequete() 
    {
            if (isset($_GET['page'])) 
            {
                if ($_GET['page'] == 'inscription')
                {
                    $inscription = new ControleurInscription();
                    $inscription->route_inscription();
                }
                if ($_GET['page'] == 'connexion')
                {
                    $connexion = new ControleurConnexion();
                    $connexion->route_connexion();
                }
                if ($_GET['page'] == 'profil')
                {
                    $profil = new ControleurProfil();
                    $profil->route_profil();
                }
                if ($_GET['page'] == 'articles') //tous les articles
                {
                    $articles = new ControleurArticles();
                    $articles->route_articles();
                }
                if ($_GET['page'] == 'article') // un seul en particulier // a rajouter id
                {
                    $article = new ControleurArticle();
                    $article->route_article();
                }
                if ($_GET['page'] == 'creer_article') 
                {
                    $creerArticle = new ControleurCreer_article();
                    $creerArticle->route_creer_article();
                }
                if ($_GET['page'] == 'admin')
                {
                    $admin = new ControleurAdmin();
                    $admin->route_admin();
                }
                if ($_GET['page'] == 'accueil')
                {
                    $accueil = new ControleurAccueil();
                    $accueil->route_accueil();
                }
                if ($_GET['page'] == 'deconnexion')
                {
                    require_once 'Controleur/ControleurDeconnexion.php';
                }
            }
            else 
            {  
                $accueil = new ControleurAccueil();
                $accueil->route_accueil();
                // $this->ctrlAccueil->route_accueil(); // aucune action définie : affichage de l'accueil
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
