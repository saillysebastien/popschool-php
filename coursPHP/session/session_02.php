<?php

//demarage de la session
session_start();

//affichage de la valeur de la clé
if (isset($_SESSION['key'])) {
  echo $_SESSION['key'];
}

 ?>
