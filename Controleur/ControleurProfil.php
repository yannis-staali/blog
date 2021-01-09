<?php

require_once 'Modele/User.php';


class ControleurProfil 
{

    public function route_profil() 
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
                $idsession = '4'; //mettre la $_SESSION['id'] pour recup l'id
                $check = $user->update($_POST['login'], $_POST['password'], $_POST['email'], '1', $idsession);   
                echo $check;
            }
            
    
        }
        
        require 'Vue/vueProfil.php';
    }

}

