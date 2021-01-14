<!doctype html>
<html lang="fr">

    <head>
        <title>Admin</title>
        <!-- inclusion des head -->
        <?php include_once 'Vue/includes/head.php'?>
    </head>

    <body>
        <!-- Inclusion du header -->
        <?php include_once 'Vue/includes/header.php'?>

        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreBlog">ADMIN</h1></a>
                <a href="index.php?page=admin&choice=categories">Categories</a>
                <a href="index.php?page=admin&choice=articles">articles</a>
                <a href="index.php?page=admin&choice=utilisateurs">utilisateurs</a>
                <a href="index.php?page=admin&choice=commentaires">commentaires</a>
                <p>PAGE ADMIN</p>

                <!-- mettre une navbar avec les 4 choices possibles -->

            </header>
            <div id="contenu">
             
             <?php

             //voir pour mettre tout ça dans le controleur
                
                // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                //ici choix d'afficher les CATEGORIES ---------------------------
                if(isset($_GET['choice']) && $_GET['choice'] == 'categories')
                {
                    echo "<h2>Liste des categories</h2>";
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Nom</th></tr>";
                    foreach($recup as $value)
                    {
                        $idselect = $value['id'];
                        echo "<tr>";
                            echo "<td>".$value['id']."</td>";
                            echo "<td>".$value['nom']."</td>";
                            echo "<td><a href=\"index.php?page=admin&choice=categories&action=delete&id=$idselect\">Supprimer</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";

                    //refresh de la page
                    if(isset($_GET['action']))
                    {
                        header('Refresh:0; index.php?page=admin&choice=categories');  
            
                    }
                }
                 
                 // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                 //ici choix d'afficher les ARTICLES ------------------------
                 if(isset($_GET['choice']) && $_GET['choice'] == 'articles')
                 {   
                      echo "<h2>Liste des articles</h2>";
                      echo "<table>";
                      echo "<tr><th>ID</th><th>Nom</th><th>ID_utilisateur</th><th>ID_categorie</th><th>Date</th><th>Titre</th></tr>";
                      foreach($recup as $value)
                      {
                        //   echo $value;
                            $idselect = $value['id'];
                            echo "<tr>";
                            echo "<td>".$value['id']."</td>";
                            echo "<td>".$value['id_utilisateur']."</td>";
                            echo "<td>".$value['id_categorie']."</td>";
                            echo "<td>".$value['date']."</td>";
                            echo "<td>".$value['titre']."</td>";
                            echo "<td><a href=\"index.php?page=admin&choice=articles&action=delete&id=$idselect\">Supprimer</a></td>";
                            echo "</tr>";
                      }
                      echo "</table>";

                      //refresh de la page
                      if(isset($_GET['action']))
                      {
                          header('Refresh:0; index.php?page=admin&choice=articles');  
                      }
                 }

                  // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                  //ici choix d'afficher les UTILISATEURS -----------------------
                  if(isset($_GET['choice']) && $_GET['choice'] == 'utilisateurs')
                  {  
                       echo "<h2>Liste des utilisateurs</h2>";
                       echo "<table>";
                       echo "<tr><th>ID</th><th>Login</th><th>Email</th><th>ID_droits</th></tr>"; //Nom des colonnes
                       foreach($recup as $value)
                       {
                         //   echo $value;
                             $idselect = $value['id'];
                             echo "<tr>";
                             echo "<td>".$value['id']."</td>";
                             echo "<td>".$value['login']."</td>";
                             echo "<td>".$value['email']."</td>";
                             echo "<td>".$value['id_droits']."</td>";
                             echo "<td><a href=\"index.php?page=admin&choice=utilisateurs&action=delete&id=$idselect\">Supprimer</a></td>";//boutton supprimer
                             echo "</tr>";
                       }
                       echo "</table>";

                       if(isset($_GET['action']))
                       {
                           header('Refresh:0; index.php?page=admin&choice=utilisateurs');  
                       }
                  }

                  // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                  //ici choix d'afficher les COMMENTAIRES -----------------------
                  if(isset($_GET['choice']) && $_GET['choice'] == 'commentaires')
                  {  
                       echo "<h2>Liste des commentaires</h2>";
                       echo "<table>";
                       echo "<tr><th>ID</th><th>Commentaires</th><th>Id_article</th><th>ID_utilisateur</th><th>Date</th></tr>"; //Nom des colonnes
                       foreach($recup as $value)
                       {
                         //   echo $value;
                             $idselect = $value['id'];
                             echo "<tr>";
                             echo "<td>".$value['id']."</td>";
                             echo "<td>".$value['commentaire']."</td>";
                             echo "<td>".$value['id_article']."</td>";
                             echo "<td>".$value['id_utilisateur']."</td>";
                             echo "<td>".$value['date']."</td>";
                             echo "<td><a href=\"index.php?page=admin&choice=commentaires&action=delete&id=$idselect\">Supprimer</a></td>";//boutton supprimer
                             echo "</tr>";
                       }
                       echo "</table>";

                       if(isset($_GET['action']))
                       {
                           header('Refresh:0; index.php?page=admin&choice=commentaires');  
                       }
                  }
             ?>
            <!-- Voir pour mettre tout ça dans le controleur --> 
                
            </div>  
        </div>

        <!--Inclusion du Footer -->
        <?php include_once 'Vue/includes/footer.php'?>

        <?php //include_once 'Vue/includes/scripts.php'?>        
        <script src="Assets/js/app.js"></script> 
    </body>
</html>