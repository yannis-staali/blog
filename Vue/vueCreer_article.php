<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/style.css" />
        <title>Creer un article></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreBlog">CREER ARTICLE</h1></a>
                <p>PAGE CREER ARTICLE</p>
            </header>
            <div id="contenu_create_article">

               <form action="" method="POST">
                    <!-- titre -->
                    <div class="create_titre">
					<label>Titre</label>
					<input type="text"  name="titre">
					</div>

                    <!-- categorie -->
                    <label for="categorie">Categorie:</label><br />
                    <select name="categorie">
                    <option value="">--Choisir une categorie--</option>
                        <?php 
                            $i =0;
                            //cette boucle peut être remplacé par la même en foreach (voir en bas du script)
                            while(isset($categories[$i]))
                            { 
                                echo "<option value=".$categories[$i]['id'].">".$categories[$i]['nom']."</option>";
                                $i++;
                            } 
                        ?>
                    </select>

                    <div class="create_categorie">
					<label>Créer une catégorie</label>
					<input type="text" name="categorie2">
					</div>
                 
                    <!-- texte -->
                    <div class="create_texte">
					<label>Texte</label>
					<input type="text"  name="article">
					</div>

                    <input type="submit" name="submit" value="créer">

               </form>

            </div> <!-- #contenu -->
            <footer id="piedBlog">
               <p>Ceci est un footer</p>
            </footer>
        </div> <!-- #global -->
    </body>
</html>


<?php

    //meme 
    // foreach($categories as $value)
    // {
    //     echo $value['nom'];
    //     echo $value['id'];
    // }

    
?>