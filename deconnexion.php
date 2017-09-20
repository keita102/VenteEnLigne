<?php
session_start(); // Permet de reutiliser du PHP dans une autre page seulement en rappeler la fonction session_start();
session_destroy(); // Permet de fermer session de toute les pages jusqu'a une prochaine connexion

  header('Location: http://localhost/VenteEnLigne/index.php');
  exit();
?>
