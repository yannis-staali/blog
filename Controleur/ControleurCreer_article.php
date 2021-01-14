<?php

require_once 'Modele/Billet.php';

//voir pour rajouter photo
class ControleurCreer_article {

    public function route_creer_article() {
        
        $billet = new Billet();
        $categories = $billet->get_categories();

        if(isset($_POST['submit']))
        {
            
            //on va verfifier qu'une seule partie categorie est remplie
            if(!empty($_POST['categorie2']) && empty($_POST['categorie']))
            {   
            //on insere le nom de la catégorie 
            $nomcat = $_POST['categorie2'];
            $idnew = $billet->insert_categorie($nomcat);

            //on la recupère l'id de la catégorie car on va en avoir besoin pour la requete INSERT
            $recup = $billet->get_id_categorie($nomcat);
            $recupid = $recup['id'];

            //ici toutes les variables intermédiaires
            $article = $_POST['article'];
            $id_utilisateur = 1; //il faudra remplacer par $_SESSION['user']
            // $date = date("m-d-y H:i:s");
            $date = date("Y-m-d H:i:s");
            $titre = $_POST['titre'];

            // on lance la requete d'insertion avec les variables intermédiaires
            $insertion = $billet->insert_billet($article, $id_utilisateur, $recupid, $date, $titre);
            }
            
            //cette condition ne s'effectue uniquement si la catégorie du menu déroulant est choisie (et pas celle du champ texte )
            if(!empty($_POST['categorie']) && empty($_POST['categorie2']))
            {
            // variables intermédiaire
            $article = $_POST['article'];
            $id_utilisateur = 1; //il faudra remplacer par $_SESSION['user']
            $id_categorie = $_POST['categorie']; //voir quel $_POST utiliser (celui du menu deroulant ou celui du input)
            // $date = date("m-d-y H:i:s");
            $date = date("Y-m-d H:i:s");
            $titre = $_POST['titre'];
            $insertion = $billet->insert_billet($article, $id_utilisateur, $id_categorie, $date, $titre);
            }


           
        }
       
        require 'Vue/vueCreer_article.php';
    }

}

