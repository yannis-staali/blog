<?php

require_once 'Modele/Billet.php';


// Il faudra ajouter les commentaires
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
       }
      
        require 'Vue/vueArticle.php';
    }

}

