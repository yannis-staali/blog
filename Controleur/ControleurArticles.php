<?php

require_once 'Modele/Billet.php';

class ControleurArticles 
{

    public function route_articles() 
    {
        //on instancie notre model
        $billet = new Billet();
        $categories = $billet->getcategories(); // cette methode récupère les categories

        // variable intermédiaire pour pagination
        if(isset($_GET['pagination']) && !empty($_GET['pagination']))
        {
            $currentpage = $_GET['pagination'];
        }
        else $currentpage = 1;

        //nombre d'articles par page
        $parPage = 5;

        //on verifie si une categorie a été choisie
        if(isset($_GET['categorie']))
        {
            $categorie = $_GET['categorie']; //pour mettre un filtre categorie
            $count = $billet->count_articles_cat($categorie); //compte le nombre de billet de telle categorie
            $pages = ceil($count / $parPage); // compte le nombre de pages
            $premier = ($currentpage * $parPage) - $parPage; // determine le premier article a afficher
            $request = $billet->get_art_bycategorie($categorie, $parPage, $premier); // recupère les articles en respectant le décalage
        }
        // si pas de categories choisies :
        if(!isset($_GET['categorie']))
        {
            $count = $billet->count_articles(); //compte le nombre total d'articles
            $pages = ceil($count / $parPage); // compte le nombre de pages
            $premier = ($currentpage * $parPage) - $parPage; // determine le premier article a afficher
            $request = $billet->get_art_byoffset($parPage, $premier); // recupère les articles en respectant le décalage
        }
    
        require 'Vue/vueArticles.php';
    }

}

