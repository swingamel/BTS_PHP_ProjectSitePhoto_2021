<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Affiche mes articles</title>
    <link rel="stylesheet" href="css/global.css">
</head>

<body>
    <?php
    include "bd_connexion.php";
    include "bloc_pied.html";
    include "bloc_menu.html.php";
    echo "<h1>Mes Articles</h1>";
    ?>
    <form action="" method="get">
        <?php
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT titre_arti, date_arti, texte_arti, nom_type
                        from article
                        inner join type
                        on article.id_type = type.id_type
                        inner join user
                        on article.id_user = user.id_user
                        where user.id_user = ?");
        $req->BindValue(1, $_GET['user']);
        $req->execute();
        ?>
        <div id="modif">
            Liste des articles
        </div>
        <table name="reines">
            <tr name="programmation">
                <?php while ($ligne = $req->fetch()) { ?>
                    <td><?php echo $ligne["date_arti"]; ?></td>
                    <td><?php echo $ligne["titre_arti"]; ?></td>
                    <td><?php echo $ligne["texte_arti"]; ?></td>
                    <td><?php echo $ligne["nom_type"]; ?></td>
                    <td><a href='article.php?article=id_article'>Voir les photos</a></td>
            </tr>
        <?php }
        ?>
        </table>
</body>

</html>