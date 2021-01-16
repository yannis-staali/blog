<!doctype html>
<html lang="fr">

    <head>
        <title>Creer Article</title>
        <!-- inclusion des head -->
        <?php include_once 'Vue/includes/head.php'?>
    </head>

    <body>
         <!-- Inclusion du header -->
         <?php include_once 'Vue/includes/header.php'?>

            <div id="global">
         
                    <a href="index.php"><h1 id="titreBlog">CREER ARTICLE</h1></a>
                    <p>PAGE CREER ARTICLE</p>

                <div id="contenu_create_article">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="create_titre">
                        <label>Titre</label>
                        <input type="text"  name="titre">
                        </div>

                        <label for="categorie">Categorie:</label><br />
                        <select name="categorie">
                        <option value=""></option>
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
                    
                        <div class="create_texte">
                        <label>Texte</label>
                        <textarea name="article" rows="5" cols="30" placeholder="Texte article"></textarea>
                        </div>

                        <!-- ici insertion image -->
                        <input type="file" name="myfile"/>

                        <input type="submit" name="submit" value="créer">
                    </form>
                </div> 
            </div> 

            <!--Inclusion du Footer -->
            <?php include_once 'Vue/includes/footer.php'?>

            <!--Inclusion des Scripts -->
            <?php //include_once 'Vue/includes/scripts.php'?>        
        <script src="Assets/js/app.js"></script> 
    </body>
</html>


<?php

    //meme que while
    // foreach($categories as $value)
    // {
    //     echo $value['nom'];
    //     echo $value['id'];
    // }

    
?>
<?php 
echo'<pre>';
var_dump($_FILES); 
echo'<pre>';
?>