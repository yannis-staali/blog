<?php

require_once 'Modele/User.php';


class ControleurConnexion 
{

    /**
     * Controle la page connexion
     * rajouter check password etc..
     */

    public function __construct()
    {
        
    }

    public function route_connexion() 
    {
        if (isset($_POST['submit']))
        {
            $user = new User();
            $check = $user->check_login($_POST['login']);
            if($check== false)
            {
                echo 'EXISTE';
            }
            else echo 'INCONNU';
    
        }
    

        require 'Vue/vueConnexion.php';
    }

}

