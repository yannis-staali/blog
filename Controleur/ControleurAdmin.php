<?php
session_start();

require_once 'Modele/Billet.php';

class ControleurAdmin 
{
    //retour à l'envoyeur
    function __construct()
    {
        if(!isset($_SESSION['utilisateur']))
        {
            header('location: index.php?page=accueil');
        }
        if($_SESSION['utilisateur']['droits'] !== '1337')
        {
            header('location: index.php?page=accueil');
        }
    }

    public function route_admin() 
    {
  
        if(isset($_GET['choice']))
        {

            $table = $_GET['choice'];
            $objet = new Billet();
            $recup = $objet->select_table($table);

        }
        if(isset($_GET['action']) && $_GET['action'] = 'delete')
        {
            $table = $_GET['choice'];
            $id = $_GET['id'];
            $delete = $objet-> delete_line($table, $id);

            //ajouter un refresh
            header("Refresh:1; url=index.php?page=admin&choice=$table");
        }
        require 'Vue/vueAdmin.php';
    }

}

