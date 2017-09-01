<?php

$login='';
$password='';
$toto = 'toto';
$pass = '123';

$empty = '';
$valide = 'Bienvenue';
$nopass = 'Mot de passe incorrect';
$nologin = 'Login incorrect';
$nopassnologin = 'Mot de passe et login incorrect';

if ($_POST) {
  if (isset($_POST['login'])) {
    $login = $_POST['login'];
  }

  if (isset($_POST['password'])) {
    $password = $_POST['password'];
  }
}

if ($login == $empty && $password == $empty) {
  $empty;
} elseif ($login == $toto && $password != $pass) {
  $nopass;
} elseif ($login != $toto && $password == $pass) {
  $nologin;
} elseif ($login == $toto && $password == $pass) {
  $valid;
} elseif ($login != $toto && $password != $pass) {
  $nopassnogin;
}

?><!DOCTYPE html>

<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />



</head>

  <!-- créer un formulaire de login:
  - champ login
  - champ password

  récupérer ces données coté php puis :
  - affichez les données de l'utilisateur dans les champs
  - vérifier que :
  - le login correspond à "toto"
  - le password correspond à "123"
  - afficher un message d'erreur si le login ou le mot de passe est faux
  - afficher un message de bienvenue si le login et le mot de passe sont corrects -->

  <form action="login.php" method="post">

    <input type="text" name="login" value="<?php echo htmlentities($login); ?>" placeholder="login"/><br />

    <input type="password" name="password" value="<?php echo htmlentities($password); ?>" placeholder="Mot de passe" /><br />

    <input type="submit" value="Envoyer" />

  </form>

</html>
