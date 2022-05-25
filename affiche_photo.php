<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Affiche Information Photo</title>
  <link rel="stylesheet" href="global.css">
</head>

<body>
  <?php
  include "bd_connexion.php";
  include "bloc_pied.html";
  include "bloc_menu.html.php";
  ?>
  <?php
  $cnx = connexionPDO();
  $req = $cnx->prepare("SELECT id_photo, titre_photo, texte_photo, type.id_type, texte_arti, nom_type, photo
                        from photo
                        inner join article
                        on photo.id_arti = article.id_arti
                        inner join type
                        on article.id_type = type.id_type
                        where id_photo = ?");
  $req->BindValue(1, $_GET['numero']);
  $req->execute();
  ?>
  <?php while ($ligne = $req->fetch()) { ?>
    <div id=action>
      <fieldset name="personalia">
        <legend><?php echo "{Détail de la photo n° " . $ligne["id_photo"] . "}" ?></legend>
        <?php echo "Titre : " . $ligne["titre_photo"] ?></br></br>
        <?php echo "Texte : " . $ligne["texte_photo"] ?></br></br>
        <?php echo "Attachée à l'article n°" . $ligne["id_type"] . " : " ?><?php echo "" . $ligne["texte_arti"]; ?></br></br>
        <?php echo "Type de l'article : " . $ligne["nom_type"] ?></br></br>
        <img src="photos/<?php echo $ligne['photo'] ?>" width="300px" height="170px" /></br>
      <?php }
      ?>
      </fieldset>
    </div>

</body>

</html>