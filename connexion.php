<?php
session_start();
?>
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
   if (isset($_POST['email'])) {

      $cnx = connexionPDO();
      $prep = $cnx->prepare("SELECT * FROM user WHERE mail_user=?");
      $prep->BindValue(1, $_POST['email']);
      $prep->execute();
   ?>
   <?php
      if ($ligne = $prep->fetch(PDO::FETCH_OBJ)) {
         $rep = $ligne->mdp_user;
         if (password_verify($_POST['mdp'], $rep)) {
            $_SESSION["email"] = $ligne->mail_user;

            header("Location: index.php");
         }
      }
   }
   ?>
   <form action="" method="post">
      <fieldset name="saperlipopette">
         <h3>Connexion</h3>
         <div id="modif2">
            <br />
            <br />
            <input type="text" name="email" placeholder="Email" />
            <input type="password" name="mdp" placeholder="Mot de passe" />
         </div>
         </br>
         <input name="sacrebleu" type="submit" value="Connexion " name="submit" />
         <h4>Vous êtes nouveau ici ? <a href="inscription.php">S'inscrire</a></h4>
      </fieldset>
   </form>
</body>

</html>