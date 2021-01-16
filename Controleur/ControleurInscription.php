<?php
session_start();

require_once 'Modele/User.php';

class ControleurInscription 
{
    // function __construct()
    // {
    //     if(isset($_SESSION['utilisateur']));
    //     {
    //         header('location: index.php?page=accueil');
    //     }
    //     if(!isset($_SESSION['utilisateur']))
    //     {
    //         header('location: index.php?page=inscription');

    //     }
    // }
 

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
                $login = $_POST['login'];
                $hached_pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // hachage
                $email = $_POST['email'];

                $check = $user->insert($login, $hached_pass, $email, '1');   
                header('location: index.php?page=connexion');
            }
            
    
        }

        require 'Vue/vueInscription.php';
    }

}

