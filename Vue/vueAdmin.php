<!doctype html>
<html lang="fr">

    <head>
        <title>Admin</title>
        <!-- inclusion des head -->
        <?php include_once 'Vue/includes/head.php'?>
    </head>

    <body>
        <div class="admin_container_general">

            <!-- Inclusion du header -->
            <?php include_once 'Vue/includes/header.php'?>

                <div class="admin_container_main">
                    <section class="admin_headblock">
                        <h1 class="admin_title">PAGE ADMIN</h1>
                        <a href="index.php?page=admin&choice=categories">Categories</a>
                        <a href="index.php?page=admin&choice=articles">articles</a>
                        <a href="index.php?page=admin&choice=utilisateurs">utilisateurs</a>
                        <a href="index.php?page=admin&choice=commentaires">commentaires</a>
                    </section>
                    
                    <section class="admin_content">
                        <?php  
                        // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                        //ici choix d'afficher les CATEGORIES ---------------------------
                        if(isset($_GET['choice']) && $_GET['choice'] == 'categories')
                        {
                            echo "<h3>Liste des categories</h3>";
                            echo "<table class='admin_table'>";
                            echo "<tr><th>ID</th><th>Nom</th><th>Action</th></tr>";
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
                                header('Refresh:1; index.php?page=admin&choice=categories');  
                    
                            }
                        }
                        
                        // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                        //ici choix d'afficher les ARTICLES ------------------------
                        if(isset($_GET['choice']) && $_GET['choice'] == 'articles')
                        {   
                            echo "<h3>Liste des articles</h3>";
                            echo "<table class='admin_table' >";
                            echo "<tr><th>ID</th><th>Titre</th><th>Date</th><th>Utilisateur</th><th>Action</th></tr>";
                            foreach($recup as $value)
                            {
                                //   echo $value;
                                    $idselect = $value['id'];
                                    echo "<tr>";
                                    echo "<td>".$value['id']."</td>";
                                    echo "<td>".$value['titre']."</td>";
                                    echo "<td>".$value['date']."</td>";
                                    echo "<td>".$value['id_utilisateur']."</td>";                   
                                    echo "<td><a href=\"index.php?page=admin&choice=articles&action=delete&id=$idselect\">Supprimer</a></td>";
                                    echo "</tr>";
                            }
                            echo "</table>";

                            //refresh de la page
                            if(isset($_GET['action']))
                            {
                                header('Refresh:1; index.php?page=admin&choice=articles');  
                            }
                        }

                        // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                        //ici choix d'afficher les UTILISATEURS -----------------------
                        if(isset($_GET['choice']) && $_GET['choice'] == 'utilisateurs')
                        {  
                            echo "<h3>Liste des utilisateurs</h3>";
                            echo "<table class='admin_table'>";
                            echo "<tr><th>ID</th><th>Login</th><th>ID_droits</th><th>Action</th></tr>"; //Nom des colonnes
                            foreach($recup as $value)
                            {
                                //   echo $value;
                                    $idselect = $value['id'];
                                    echo "<tr>";
                                    echo "<td>".$value['id']."</td>";
                                    echo "<td>".$value['login']."</td>";
                                    echo "<td>".$value['id_droits']."</td>";
                                    echo "<td><a href=\"index.php?page=admin&choice=utilisateurs&action=delete&id=$idselect\">Supprimer</a></td>";//boutton supprimer
                                    echo "</tr>";
                            }
                            echo "</table>";

                            if(isset($_GET['action']))
                            {
                                header('Refresh:1; index.php?page=admin&choice=utilisateurs');  
                            }
                        }

                        // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                        //ici choix d'afficher les COMMENTAIRES -----------------------
                        if(isset($_GET['choice']) && $_GET['choice'] == 'commentaires')
                        {  
                            echo "<h3>Liste des commentaires</h3>";
                            echo "<table class='admin_table comm'>";
                            echo "<tr><th>ID</th><th>Texte</th><th>Article</th><th>User</th><th>Date</th></th><th>Action</th></tr>"; //Nom des colonnes
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
                                    echo "<td><a href=\"index.php?page=admin&choice=commentaires&action=delete&id=$idselect\">Suppr</a></td>";//boutton supprimer
                                    echo "</tr>";
                            }
                            echo "</table>";

                            if(isset($_GET['action']))
                            {
                                header('Refresh:1; index.php?page=admin&choice=commentaires');  
                            }
                        }
                        ?>
                    </section>
                </div>  <!--Fin container main///\\\-->

            <!--Inclusion du Footer -->
            <?php include_once 'Vue/includes/footer.php'?>

            <script src="Assets/js/app.js"></script> 
        </div> <!--Fin container general ///\\\-->
    </body>
</html>