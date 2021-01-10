<?php

require_once 'Modele/Billet.php';

class ControleurArticles {

    public function route_articles() {
        
        //on verifie la valeur de $_GET['start'] pour afficher la bonne "page" d'articles
        if(!isset($_GET['start']))
        {
            // le offset permet de choisir les articles en décalage
            $offset= 0;
        }
        else $offset = $_GET['start'];

        //on instancie notre model
        $billet = new Billet();
        $categories = $billet->getcategories(); // cette methode récupère les categories

        //on verifie si une categorie a été choisie
        if(isset($_GET['categorie']))
        {
            $categorie = $_GET['categorie'];
            $count = $billet->count_articles_cat($categorie); //compte le nombre de billet de telle categorie
            $request = $billet->get_art_bycategorie($categorie, $offset); //recupere tous les articles de telle categorie
        }
        else
        {
            $count = $billet->count_articles(); //compte le nombre total d'articles
            $request = $billet->get_art_byoffset($offset); // recupère les articles en respectant le décalage

        }

        //affichage du bonton precedent
        if($offset > 1)
        {
            if(isset($_GET["categorie"])) 
            {
                $cat = $_GET['categorie'];
                $offset = $offset -5;
                $bouton_precedent = "<a href=index.php?page=articles&categorie=$cat&start=$offset> Page précédente </a>";
            }
            else
            {
                $offset = $offset -5;
                $bouton_precedent = "<a href=index.php?page=articles&start=$offset> Page précédente </a>";
            }
        }

        //affichage du bouton suivant
        if($offset + 5 < $count)
        {
            if(isset($_GET["categorie"])) 
            {
                $cat = $_GET['categorie'];
                $offset = $offset +5;
                $bouton_suivant = "<a href=index.php?page=articles&categorie=$cat&start=$offset> Page suivante</a>";
            }
            else
            {
                $offset = $offset +5;
                $bouton_suivant = "<a href=index.php?page=articles&start=$offset> Page suivante </a>";

            }
        }
       

        require 'Vue/vueArticles.php';
    }

}

