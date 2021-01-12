<?php
require_once 'Modele/Billet.php';

class ControleurAdmin 
{

    public function route_admin() 
    {
        //on va faire la suite des 4 if et les requtes associées
        //if isset(GET [choise] = ex commentaires .... )
        if(isset($_GET['choice']))
        {

            $table = $_GET['choice'];
            $objet = new Billet();
            $recup = $objet->select_table();

        
        }
        if(isset($_GET['action']) && $_GET['action'] = 'delete')
        {
            $table = $_GET['choice'];
            $id = $_GET['id'];
            $delete = $objet-> delete_line($table, $id);

            //ajouter un refresh
        }
        require 'Vue/vueAdmin.php';
    }

}

