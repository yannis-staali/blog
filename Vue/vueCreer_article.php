<!doctype html>
<html lang="fr">

    <head>
        <title>Creer Article</title>
        <!-- inclusion des head -->
        <?php include_once 'Vue/includes/head.php'?>
    </head>

    <body>

        <div class="container_general">
         <!-- Inclusion du header -->
        <?php include_once 'Vue/includes/header.php'?>

            <!-- Main -->
            <div class="container_main">
                <div id="container_main_block">
                    <form class="container_form" action="" method="POST" enctype="multipart/form-data">
                        <h1>CREER UN ARTICLE</h1>
                        <div class="block_send">
                            <label>Titre</label>
                            <input type="text"  name="titre">
                        </div>
                        <div class="block_send">
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
                        </div>
                        <div class="block_send">
                            <label>Créer une catégorie</label>
                            <input type="text" name="categorie2">
                        </div>
                    
                        <div class="block_send">
                            <label>Texte</label>
                            <textarea name="article" rows="5" cols="30" placeholder="Texte article"></textarea>
                        </div>
                        
                        <!-- ici insertion image -->
                        <div class="block_send">
                            <label>Inserer une image</label>
                            <input type="file" name="myfile"/>                        
                        </div>
                        <div class="block_submit">
                            <input type="submit" name="submit" value="créer">
                        </div>
                    </form>
                </div> 
            </div> 
        </div>
            <!--Inclusion du Footer -->
            <?php include_once 'Vue/includes/footer.php'?>

            <!--Inclusion des Scripts -->
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
// echo'<pre>';
// var_dump($_FILES); 
// echo'<pre>';
?>