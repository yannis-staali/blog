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
                //Variables intermédiaires
                $hached_pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // hachage
                $email = htmlspecialchars($_POST['email']);

                $idsession = $_SESSION['utilisateur']['id']; 
                $check = $user->update($login, $hached_pass, $email, $idsession = $_SESSION['utilisateur']['id'], $idsession);   
           
            }
            
    
        }
        
        require 'Vue/vueProfil.php';
    }

}

