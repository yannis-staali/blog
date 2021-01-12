<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/style.css" />
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreBlog">ADMIN</h1></a>
                <a href="index.php?page=admin&choice=categories">Categories</a>
                <p>PAGE ADMIN</p>

                <!-- mettre une navbar avec les 4 choices possibles -->

            </header>
            <div id="contenu">
             
             <?php
                if(isset($_GET['choice']) && $_GET['choice'] = 'categories')
                {
                    echo "<h2>Liste des utilisateurs</h2>";
                    echo "<table>";
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
                }
                if(isset($_GET['action']))
                {
                    header('Location: index.php?page=admin&choice=categories');   
                    exit();
                    // header("index.php?page=admin&choice=categories");
                }
             ?>
        <!-- Mettre des if en serie de GET['choice'] -->
        <!-- Qui vont afficher tel ou tel Morceau de html -->
        <!-- Les requetes et les variables de contenu se feront dans le controleur -->

            </div>
            <footer id="piedBlog">
               CECI EST UN FOOTER
            </footer>
        </div> <!-- #global -->
    </body>
</html>