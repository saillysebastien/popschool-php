<?php

include("config/db.php");
$connection = new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_base
);

 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>PHP 2017</title>


  <link rel ="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel ="stylesheet" href="assets/css/bootstrap-theme.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />



<body>

  <div class="container">

    <header>
    <nav class="navbar navbar-fixed-top navbar-inverse bg-inverse">

        <ul class="nav nav-tabs nav-fixed">
          <li class="navbar"><a href="index.php">Accueil</a></li>
          <li class="navbar"><a href="students.php">Eleves</a></li>
          <li class="navbar"><a href="promotions.php">Promotions</a></li>
          <li class="navbar navbar-right"><a href="create_student.php">Création d'éleves</a></li>
          <li class="navbar navbar-right"><a href="create_promotion.php">Création de promotion</a></li>

        </ul>

    </nav>
  </header>
</div>
