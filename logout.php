<?php
// Initialiser la session
session_start();
	
// Détruire la session.
if(session_destroy())
{
   unset($_SESSION['email']);
   // Redirection vers la page de connexion
   header("Location: connexion.php");
}
