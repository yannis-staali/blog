<?php

require_once 'Modele/Modele.php';
require_once 'Modele/Billet.php';

class ControleurAccueil 
{

    private $billet;

    public function __construct() 
    {
        $this->billet = new Billet();
    }

// Affiche tous les articles du blog
    public function route_accueil() 
    {
        $billets = $this->billet->getBillets();
       
        // echo'<pre>';
        // var_dump($billets);
        // echo'<pre>';
        require 'Vue/vueAccueil.php';
    }

}

