<?php

include('include/header-todolist.php');
require('vendor/autoload.php');
require('todolist-connect.php');

$informations = [];
$errors = [];
$id = null;
$title = '';
$description = null;
$deadline = null;
$done = false;

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];

  $todo = $conn->fetchAssoc('SELECT * FROM todo WHERE id = ?', [$id]);

  if (!$todo) {
    header('Location: todolist-select-html.php', true, 302);
    exit();
  }

  $title = $todo['title'];
  $description = $todo['description'];
  $deadline = $todo['deadline'];
  $done = $todo['done'];
} else {
  header('Location: todolist-select-html.php', true, 302);
  exit();
}

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
  } else {
    $description = null;
  }

  if (isset($_POST['deadline']) && !empty(trim($_POST['deadline']))) {
    $deadline = $_POST['deadline'];
  } else {
    $deadline = null;
  }

  if (isset($_POST['done'])) {
    $done = true;
  } else {
    $done = false;
  }

  if ($valid) {
    try {
      $count = $conn->update('todo', [
        'title' => $title,
        'description' => $description,
        'deadline' => $deadline,
        'done' => $done,
      ], ['id' => $id]);

      $lastInsertId = $conn->lastInsertId();
    } catch (Exception $e) {
      // echo $e->getMessage();
      header('Location: error500.html', true, 302);
      exit();
    }

    $informations['form'] = "<div class='alert alert-success center'> $count . ' tâche modifiée (id : ' . $lastInsertId . ')'</div>\n";
    }
}

?>
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

  <div class="container">

    <legend class="center">Modification d'une tâche</legend>
    <div class="separate"></div>

    <form  class="form-horizontal" action="<?= basename(__FILE__) ?>" method="post">

      <div class="form-group col-md-12 center">
        <label class="col-md-4 control-label" for="title">Nom de la tâche</label>
        <div class="col-md-4">
        <input type="text" name="title" value="<?= htmlentities($title) ?>" placeholder="Titre *" class="center"/>
      </div>
      </div>

      <div class="form-group col-md-12 center">
        <label class="col-md-4 control-label" for="description">Description de la tâche</label>
        <div class="col-md-4">
        <input type="text" name="description" value="<?= htmlentities($description) ?>" placeholder="Description" class="center"></input>
      </div>
      </div>

      <div class="form-group col-md-12 center">
        <label class="col-md-4 control-label" for="deadline">Date de la tâche</label>
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
        <input type="submit" value="Valider" class="btn btn-primary">
        <a href="todolist-select-html.php" id="retour" name="retour" class="btn btn-danger">Retour</a>
      </div>

    </form>

  </div>

</body>
</html>
