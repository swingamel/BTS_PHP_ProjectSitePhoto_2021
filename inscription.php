<!DOCTYPE html>
<html>

<head></head>

<body>
    <?php
    include "bd_connexion.php";
    include "bloc_pied.html";
    include "bloc_menu.html.php";
    ?>
    <?php
    if (isset($_POST['util'], $_POST['name'], $_POST['mail'], $_POST['mdp'])) {

        $pass = $_POST['mdp'];
        $hash = password_hash($pass, PASSWORD_BCRYPT);

        $cnx = connexionPDO();
        $prep = $cnx->prepare("INSERT INTO user VALUES (NULL, :nom_user, :prenom_user, :mdp_user, :mail_user)");
        $prep->execute(array(
            'nom_user' => $_POST['util'],
            'prenom_user' => $_POST['name'],
            'mdp_user' => $hash = password_hash($pass, PASSWORD_BCRYPT),
            'mail_user' => $_POST['mail']
        ));
    ?>
        <?php

        if ($prep) {
            echo "<h6>Vous êtes inscrit avec succès.</br>Cliquez ici pour vous <a href='connexion.php'>connecter</a></h6>";
        }
    } else {
        ?>
        <form action="" method="post">
            <fieldset name="samerlipopette">
                <h3>Inscription</h3>
                <div id="modif3">
                    <br />
                    <br />
                    <input type="text" name="util" placeholder="Nom d'utilisateur" required />
                    <input type="text" name="name" placeholder="Prenom d'utilisateur" required />
                    <input type="text" name="mail" placeholder="Email" required />
                    <input type="password" name="mdp" placeholder="Mot de passe" required />
                </div>
                </br>
                <input name="sacrableu" type="submit" name="submit" value="S'inscrire" />
                <h4>Déjà inscrit ? <a href="login.php">Connectez-vous ici</a></h4>
            </fieldset>
        </form>
    <?php
    }
    ?>
</body>

</html>