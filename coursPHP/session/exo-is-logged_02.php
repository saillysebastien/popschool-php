<?php

session_start();
$url = 'https://duckduckgo.com';
// Si l'utilisateur est loggé, le rediriger sur duckduckgo.com
// Sinon afficher le message "Vous n'êtes pas loggé"

# code...
if (isset($_SESSION['logged']) && $_SESSION['logged']) {
    header("Location:" . $url, true, 302);
  }
  else {
    echo 'Vous n\'êtes pas loggé';
  }
