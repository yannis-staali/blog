<header>
    <div class="container_nav">
        <div class="site_title">
            <h1 class="logo">Umami</h1>
            <p class="subtitle">A blog exploring new flavor</p>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php?page=articles">Articles</a></li>

                    <?php if(!$_SESSION['utilisateur']): ?>   
                    <li><a href="index.php?page=inscription">Inscription</a></li>
                    <li><a href="index.php?page=connexion">Connexion</a></li>
                    <?php endif ;?>

                    <?php if($_SESSION['utilisateur'] && $_SESSION['utilisateur']['droits']==1): ?>   
                    <li><a href="index.php?page=profil">profil</a></li>
                    <?php endif ;?>

                    <?php if($_SESSION['utilisateur'] && $_SESSION['utilisateur']['droits']==42): ?>   
                    <li><a href="index.php?page=creer_article">creer_article</a></li>
                    <?php endif ;?>

                    <?php if($_SESSION['utilisateur'] && $_SESSION['utilisateur']['droits']==1337): ?>
                    <li><a href="index.php?page=creer_article">Creer un article</a></li>   
                    <li><a href="index.php?page=admin">Admin</a></li> 
                    
                    <?php endif ;?>
            </ul>
        </nav>
    </div>      
</header>