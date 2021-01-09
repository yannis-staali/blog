<?php

require_once 'Modele/User.php';

class ControleurInscription 
{

  /**
   * Controle la page Inscription
   * Voir eventuellement ajouter un check email
   * Ajouter check password
   * Ajouter INSERT DANS BDD
   * Ajouter password hach etc...
   */

    public function route_inscription() 
    {
        if (isset($_POST['submit']))
        {
            $user = new User();
            $check = $user->check_login_inscription($_POST['login']);
            if($check== false)
            {
                echo 'login deja pris';
            }
            else 
            {
                $check = $user->insert($_POST['login'], $_POST['password'], $_POST['email'], '1');   
                echo $check;
            }
            
    
        }

        require 'Vue/vueInscription.php';
    }

}

