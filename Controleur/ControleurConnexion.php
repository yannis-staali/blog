<?php
session_start();

require_once 'Modele/User.php';


class ControleurConnexion 
{

    function __construct()
    {
        if(isset($_SESSION['utilisateur']))
        {
            header('location: index.php?page=accueil');
        }
    }

    public function route_connexion() 
    {
        if (isset($_POST['submit']))
        {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $user = new User();
            $checklog = $user->check_login($login);
            $checkpass = $user->check_pass_hash($login, $password);
            $droits = $user->check_droits($login);
            $id = $user->get_id($login);

            if($checklog == false && $checkpass == false)
            {
                $_SESSION['utilisateur']['id'] =  $id;
                $_SESSION['utilisateur']['droits']= $droits;

                if($_SESSION['utilisateur']['droits']== '1337')
                {
                    header('location: index.php?page=admin');
                }
                else
                    header('location: index.php?page=profil');
            }
            else echo 'INCONNU';
    
        }
    
        debug($_SESSION);
        require 'Vue/vueConnexion.php';
    }

}

