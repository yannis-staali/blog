<?php
session_start();

require_once 'Modele/User.php';


class ControleurProfil 
{
    function __construct()
    {
        if(!isset($_SESSION['utilisateur']))
        {
            header('location: index.php?page=accueil');
        }
    }

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
                //mettre des variables intermédiaires avec les htmlspecialchars
                $idsession = $_SESSION['utilisateur']['id']; 
                $check = $user->update($_POST['login'], $_POST['password'], $_POST['email'], $idsession = $_SESSION['utilisateur']['id'], $idsession);   
                // echo $check;
            }
            
    
        }
        
        require 'Vue/vueProfil.php';
    }

}

