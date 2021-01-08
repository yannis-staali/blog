<?php

// require_once 'Modele/Billet.php';
// require_once 'Vue/Vue.php';

class ControleurAdmin 
{

    // private $billet;

    // public function __construct() {
    //     $this->billet = new Billet();
    // }

// Affiche la liste de tous les billets du blog
    public function route_Admin() 
    {
        // $billets = $this->billet->getBillets();
        // $vue = new Vue("Accueil");
        // $vue->generer(array($billets));
        require 'Vue/vueAdmin.php';
    }

}

