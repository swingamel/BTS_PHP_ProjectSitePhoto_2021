<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site photo</title>
    <link rel="stylesheet" href="css/global.css">
</head>

<body>
    <ul class="menu">
        
        <?php
        if (isset($_SESSION["email"])) {
        ?>
            <?php echo "Bienvenue " . $_SESSION["email"] ?>
            <li><a href="index.php"><img src="images/accueil.png" /> ACCUEIL</a></li>
            <li><a href="affiche_liste_photos.php"><img src="images/photos.png " /> LES PHOTOS</a></li>
            <li><a href="article.php?user=id_user"><img src="images/photos.png " /> LES ARTICLES</a></li>
            <li><a href="logout.php"><img src="images/deconnexion.png" /> DECONNEXION</a></li>
        <?php
        } else {
        ?>
            <li><a href="index.php"><img src="images/accueil.png " /> ACCUEIL</a></li>
            <li><a href="affiche_liste_photos.php"><img src="images/photos.png " /> LES PHOTOS</a></li>
            <li><a href="connexion.php"><img src="images/connexion.png " /> CONNEXION</a></li>
    </ul>
<?php } ?>
</body>

</html>