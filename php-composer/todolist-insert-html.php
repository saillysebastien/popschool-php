<?php

require('vendor/autoload.php');
require('todolist-connect.php');

$informations = [];
$errors = [];
$title = '';
$description = null;
$deadline = null;
$done = false;

if ($_POST) {
  $valid = true;

  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
  } else {
    $valid = false;
    $errors['title'] = 'Vous devez spécifier un titre';
  }

  if (isset($_POST['description']) && !empty(trim($_POST['description']))) {
    $description = $_POST['description'];
  }

  if (isset($_POST['deadline']) && !empty(trim($_POST['deadline']))) {
    $deadline = $_POST['deadline'];
  }

  if (isset($_POST['done'])) {
    $done = true;
  }

  if ($valid) {
    try {
      $count = $conn->insert('todo', [
        'title' => $title,
        'description' => $description,
        'deadline' => $deadline,
        'done' => $done,
      ]);

      $lastInsertId = $conn->lastInsertId();
    } catch (Exception $e) {
      // echo $e->getMessage();
      header('Location: error500.html', true, 302);
      exit();
    }

    $informations['form'] = $count . ' tâche créée (id : ' . $lastInsertId . ')';
  }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Liste des tâches</title>


  <link rel ="stylesheet" href="../assets/css/bootstrap.min.css" />
  <link rel ="stylesheet" href="../assets/css/bootstrap-theme.min.css" />
  <link rel="stylesheet" href="../assets/css/style.css" />



  <body>

    <div class="container">

      <div>
        <?php
        if (isset($informations['form'])) {
          echo $informations['form'];
        }
        ?>
      </div>

      <form action="<?= basename(__FILE__) ?>?id=<?= $id ?>" method="post">

        <div>
          <?php
          if (isset($errors['title'])) {
            echo $errors['title'];
          }
          ?>
        </div>

        <div class="separate"></div>
        <legend class="center">Création d'une tâche</legend>
        <div class="separate"></div>

        <form  class="form-horizontal" action="<?= basename(__FILE__) ?>" method="post">

          <div class="form-group col-md-12 center">
            <label class="col-md-4 control-label" for="title">Nom de la veille</label>
            <div class="col-md-4">
              <input type="text" name="title" value="<?= htmlentities($title) ?>" placeholder="Titre *" class="center"/>
            </div>
          </div>

          <div class="form-group col-md-12 center">
            <label class="col-md-4 control-label" for="description">Description de la veille</label>
            <div class="col-md-4">
              <input type="text" name="description" value="<?= htmlentities($description) ?>" placeholder="Description" class="center"></input>
            </div>
          </div>

          <div class="form-group col-md-12 center">
            <label class="col-md-4 control-label" for="deadline">Durée de la veille</label>
            <div class="col-md-4">
              <input class="center" type="datetime" name="deadline" placeholder="AAAA-MM-JJ HH:MM:SS" value="<?= htmlentities($deadline) ?>"/>
            </div>
          </div>

          <div class="form-group col-md-12 center">
            <label class="col-md-4 checkbox-inline" for="done"> Cochez si la tâche est effectué</label>
            <div class="col-md-4">
              <input type="checkbox" name="done" value="1" <?php if ($done) { echo 'cheched'; } ?> />
            </div>
          </div>

          <div class="form-group col-md-12 center">
            <input type="submit" value="valider" class="btn btn-primary">
            <a href="todolist-select-html.php" name="retour" class="btn btn-danger">Retour</a>
          </div>

        </form>

      </div>

    </body>
    </html>
