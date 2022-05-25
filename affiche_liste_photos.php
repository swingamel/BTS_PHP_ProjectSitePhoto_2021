<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Recherche Photo</title>
  <link rel="stylesheet" href="css/global.css">
  <style>
    a {
      color: #ffffff;
      ;
    }
  </style>
</head>

<body>
  <?php
  include "bd_connexion.php";
  include "bloc_pied.html";
  include "bloc_menu.html.php";
  echo "<h1>Nos photos</h1>";
  ?>
  <?php
  $cnx = connexionPDO();
  $req = $cnx->prepare("SELECT id_type, nom_type from type");
  $req->execute();
  ?>
  <form action="" method="get">
    <fieldset>
      <legend>{Choix du type d'article}</legend>
      <select name="liste">
        <option> Choisir le type </option>
        <?php foreach ($req as $ligne) { ?>
          <option><?php echo $ligne["nom_type"]; ?></option>
        <?php } ?>
      </select>
      <input type="submit" name="button" value="RECHERCHER">
    </fieldset>
  </form>
  <?php
  if (isset($_GET['button'])) {
    $cnx = connexionPDO();
    $req = $cnx->prepare("SELECT id_photo, photo.titre_photo, texte_photo, photo
                        from article
                        inner join photo
                        on article.id_arti = photo.id_arti
                        inner join type
                        on article.id_type = type.id_type
                        where nom_type = ?");
    $req->BindValue(1, $_GET['liste']);
    $req->execute();
  ?>
    <table>
      <tr>
        <?php while ($ligne = $req->fetch()) { ?>
          <td><a href="affiche_photo.php?numero=<?php echo $ligne["id_photo"]; ?>"><?php echo $ligne["titre_photo"]; ?></a></td>
          <td><?php echo $ligne["texte_photo"]; ?></td>
          <td><img src="photos/<?php echo $ligne['photo']; ?>" width="300px" height="170px" /></td>
      </tr>
  <?php }
      } ?>
    </table>
</body>

</html>


