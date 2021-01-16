<?php
session_start();

require_once 'Modele/Billet.php';

//voir pour rajouter photo
class ControleurCreer_article 
{
    function __construct()
    {
        //verifie que la personne connectée est un admin ou un moderateur
        if(!isset($_SESSION['utilisateur']))
        {
            header('location: index.php?page=accueil');
        }
        if(isset($_SESSION['utilisateur']))
        {
            $tableau = ['1337', '42'];
            $droitsSession = $_SESSION['utilisateur']['droits'];
            if(in_array($droitsSession, $tableau) == false)
            {
                header('location: index.php?page=accueil');
            }
        }
    }

    public function route_creer_article() 
    {
        
        $billet = new Billet();
        $categories = $billet->get_categories();

        if(isset($_POST['submit']))
        {
            
            //on va verfifier qu'une seule partie categorie est remplie
            if(!empty($_POST['categorie2']) && empty($_POST['categorie']))
            {   
                //on insere le nom de la catégorie 
                $nomcat = htmlspecialchars($_POST['categorie2']);
                $idnew = $billet->insert_categorie($nomcat);

                //on la recupère l'id de la catégorie car on va en avoir besoin pour la requete INSERT
                $recup = $billet->get_id_categorie($nomcat);
                $recupid = $recup['id'];

                //ici toutes les variables intermédiaires
                $article = htmlspecialchars($_POST['article']);
                $id_utilisateur = $_SESSION['utilisateur']['id']; //il faudra remplacer par $_SESSION['user']
                $date = date("Y-m-d H:i:s");
                $titre = htmlspecialchars($_POST['titre']);
                $data = file_get_contents($_FILES['myfile']['tmp_name']);

                // on lance la requete d'insertion avec les variables intermédiaires
                // $insertion = $billet->insert_billet($article, $id_utilisateur, $recupid, $date, $titre);
                $insertion = $billet->insert_billet2($article, $id_utilisateur, $recupid, $date, $titre, $data);
            }
            
            //\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
            //cette condition ne s'effectue uniquement si la catégorie du menu déroulant est choisie (et pas celle du champ texte )
            if(!empty($_POST['categorie']) && empty($_POST['categorie2']))
            {
                // variables intermédiaire
                $article = htmlspecialchars($_POST['article']);
                $id_utilisateur = $_SESSION['utilisateur']['id']; //il faudra remplacer par $_SESSION['user']
                $id_categorie = htmlspecialchars($_POST['categorie']); //voir quel $_POST utiliser (celui du menu deroulant ou celui du input)
                $date = date("Y-m-d H:i:s");
                $titre = htmlspecialchars($_POST['titre']);
                $data = file_get_contents($_FILES['myfile']['tmp_name']);

                // $insertion = $billet->insert_billet($article, $id_utilisateur, $id_categorie, $date, $titre);
                $insertion = $billet->insert_billet2($article, $id_utilisateur, $id_categorie, $date, $titre, $data);

            }


           
        }
       
        require 'Vue/vueCreer_article.php';
    }

}

