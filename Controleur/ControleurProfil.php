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
            $login = htmlspecialchars($_POST['login']);
            $check = $user->check_login_inscription($login);
            if($check== false)
            {
                echo 'login deja pris';
            }
            else 
            {   
                //mettre des variables intermédiaires
                $password = htmlspecialchars($_POST['password']);
                $email = htmlspecialchars($_POST['email']);

                $idsession = $_SESSION['utilisateur']['id']; 
                $check = $user->update($login, $password, $email, $idsession = $_SESSION['utilisateur']['id'], $idsession);   
                // echo $check;
            }
            
    
        }
        
        require 'Vue/vueProfil.php';
    }

}

