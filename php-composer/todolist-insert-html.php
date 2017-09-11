<?php

include('include/header-todolist.php');
require('vendor/autoload.php');
require('todolist-connect.php');

$messages = [];
$title = '';
$description = null;
$deadline = null;
$done = null;

if ($_POST) {
  $valid = true;

  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
  } else {
    $valid = false;
    $messages['title'] = "<div class='alert alert-warning center'>Vous devez spécifier un titre</div>";
  }

  if (isset($_POST['description']) && !empty(trim($_POST['description']))) {
    $description = $_POST['description'];
  }

  if (isset($_POST['deadline']) && !empty(trim($_POST['deadline']))) {
    $deadline = $_POST['deadline'];
  }

  if (isset($_POST['done']) && !empty(trim($_POST['done']))) {
    $deadline = $_POST['done'];
  }

  if ($valid) {
    try {
      $conn->insert('todo', [
        'title' => $title,
        'description' => $description,
        'deadline' => $deadline,
        'done' => (bool) $done,
      ]);
    } catch (Exception $e) {
      header('Location: error500.html', true, 302);
      exit();
    }
    $messages['form'] = "<div class='alert alert-success center'>Tâche créée</div>";
  }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Création de tache</title>
  <link rel ="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel ="stylesheet" href="assets/css/bootstrap-theme.min.css" />
  <link rel ="stylesheet" href="assets/css/style.css" />

</head>
<body>

  <div class="container-fluid">


    <?php
    if (isset($messages['form'])) {
      echo $messages['form'];
    }

    if (isset($messages['title'])) {
      echo $messages['title'];
    }
     ?>

     <h1 class="col-md-offset-4 col-md-4 center">Création d'une tâche</h1>
     <div class="separate"></div>

    <form  class="form-horizontal center" action="<?= basename(__FILE__) ?>" method="post">

      <div class="form-group col-md-12">
        <input type="text" name="title" value="<?= htmlentities($title) ?>" placeholder="Titre *" class="center"/>
      </div>

      <div class="form-group col-md-12">
        <input type="text" name="description" value="<?= htmlentities($task['description']) ?>" placeholder="Description" class="center"></input>
      </div>

      <div class="form-group col-md-12">
        <input type="datetime" name="deadline" placeholder="AAAA-MM-JJ HH:MM:SS" value="<?= htmlentities($deadline) ?>" class="center"/>
      </div>

      <div class="for-group col-md-12">
      <label class="col-md-offset-2 col-md-2 checkbox-inline" for="done"> Cochez si la tâche est effectué</label>
      <input class="col-md-4" type="checkbox" name="done" value="1" <?php if ($done) { echo 'cheched'; } ?> />
    </div>

      <div class="form-group col-md-12">
        <input type="submit" value="valider" class="btn btn-primary"><br />
      </div>

    </form>

  </div>

  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
