<?php

include('include/header.php');
require('vendor/autoload.php');
require('veille-connect.php');

$informations = [];
$messages = [];
$author = '';
$title = null;
$duration = null;
$passage = null;

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];

  $veille = $conn->fetchAssoc('SELECT * FROM veille WHERE id = ?', [$id]);

  if (!$veille) {
    header('Location: veille-html.php', true, 302);
    exit();
  }

  $author = $veille['author'];
  $title = $veille['title'];
  $duration = $veille['duration'];
  $passage = $veille['passage'];
} else {
  header('Location: veille-html.php', true, 302);
  exit();
}

if ($_POST) {
  $valid = true;

  if (isset($_POST['author']) && !empty(trim($_POST['author']))) {
    $author = $_POST['author'];
  } else {
    $valid = false;
    $errors['auteur'] = 'Vous devez spécifier un auteur';
  }

  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
  } else {
    $title = null;
  }

  if (isset($_POST['duration']) && !empty(trim($_POST['duration']))) {
    $duration = $_POST['duration'];
  } else {
    $duration = null;
  }

  if (isset($_POST['passage']) && !empty(trim($_POST['passage']))) {
    $passage = $_POST['passage'];
  } else {
    $duration = null;
  }

  if ($valid) {
    try {
      $count = $conn->update('veille', [
        'author' => $author,
        'title' => $title,
        'duration' => $duration,
        'passage' => $passage,
      ], ['id' => $id]);

      $lastInsertId = $conn->lastInsertId();
    } catch (Exception $e) {
      // echo $e->getMessage();
      header('Location: error500.html', true, 302);
      exit();
    }

    $informations['form'] = "<div class='alert alert-success center'>$count veille modifiée (id : $id )</div>\n";
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
        <label class="col-md-4 control-label" for="author">Auteur de la veille</label>
        <div class="col-md-4">
          <input type="text" name="author" value="<?= htmlentities($author) ?>" placeholder="author" class="center"></input>
        </div>
      </div>

      <div class="form-group col-md-12 center">
        <label class="col-md-4 control-label" for="title">Titre de la veille</label>
        <div class="col-md-4">
          <input type="text" name="title" value="<?= htmlentities($title) ?>" placeholder="Titre *" class="center"/>
        </div>
      </div>


      <div class="col-md-12 form-group center">
        <label class="col-md-4 control-label" for="duration">Durée de la veille :</label>
        <div class="col-md-4">
          <input id="duration" name="duration" class="form-control input-md bug"  type="number" value="<?= htmlentities($duration) ?>" />
        </div>
      </div>

      <div class="col-md-12 form-group center">
        <label class="col-md-4 control-label" for="passage">Date de la veille :</label>
        <div class="col-md-4">
          <input id="passage" name="passage" class="form-control input-md bug"  type="date"  value="<?= htmlentities($passage) ?>" />
        </div>
      </div>

      <div class="form-group col-md-12 center">
        <input type="submit" value="Valider" class="btn btn-primary" />
        <a href="veilles-html.php" id="retour" name="retour" class="btn btn-danger">Retour</a>
      </div>

    </form>

  </div>

</body>
</html>
