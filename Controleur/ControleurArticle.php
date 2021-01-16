<?php
session_start();

require_once 'Modele/Billet.php';


class ControleurArticle 
{

    private $billet;

    public function __construct() 
    {
        $this->billet = new Billet();
    }

    public function route_article() 
    {
        
       if(isset($_GET['id'])) 
       {
            $id = $_GET['id'];
            $billets = $this->billet->showBillet($id);
            //ici ajouter un appel de methode vers une requete de fetch pour les commentaires avec l'id

            $commentaires = $this->billet->showCommentaire($id);
       }

       //ajout d'un commentaire
       if(isset($_POST['submit']) && !empty($_POST['com_sub']))
       {
            $coms = $_POST['com_sub'];
            $id_article = $_GET['id'];
            $id_utilisateur = $_SESSION['utilisateur']['id']; //il faudra mettre la $_SESSION ici
            $date =  date("Y-m-d H:i:s");

            $insertcom = $this->billet->insert_commentaire($coms, $id_article, $id_utilisateur, $date);

            header("Refresh:0; index.php?page=article&id=$id_article");  
       }
      
        require 'Vue/vueArticle.php';
    }

}

