<?php

require('vendor/autoload.php');
include('include/header.php');
require('veille-connect.php');

$informations = [];
$messages = [];
$author = '';
$title = null;
$duration = null;
$passage = null;

if ($_POST) {
  $valid = true;

  if (isset($_POST['author']) && !empty(trim($_POST['author']))) {
    $author = $_POST['author'];
  } else {
    $valid = false;
    $messages['author'] = "<div class='alert alert-warning center'>Vous devez spécifier un auteur</div>";
  }

  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
  }

  if (isset($_POST['duration']) && !empty(trim($_POST['duration']))) {
    $duration = $_POST['duration'];
  }

  if (isset($_POST['passage']) && !empty(trim($_POST['passage']))) {
    $passage = $_POST['passage'];
  }

  if ($valid) {
    try {
      $count = $conn->insert('veille', [
        'author' => $author,
        'title' => $title,
        'duration' => $duration,
        'passage' => $passage,
      ]);
      $lastInsertId = $conn->lastInsertId();

    } catch (Exception $e) {
      // echo $e->getMessage();
      header('Location: error500.html', true, 302);
      exit();
    }
    $informations['form'] = "<div class='alert alert-success center'> $count Veille créee (id :  $lastInsertId)</div>\n";
  }
}

?>
<div class="container-fluid">

<div>
  <?php
  if (isset($informations['form'])) {
    echo $informations['form'];
  }
  ?>
</div>

  <form action="<?= basename(__FILE__) ?>?id=<?= $lastInsertId ?>" method="post">

    <div>
      <?php
      if (isset($errors['title'])) {
        echo $errors['title'];
      }
      ?>
    </div>

    <div class="separate"></div>
    <!-- Form Name -->
    <legend class="center underline">Créer un passage en veille</legend><br />

    <!-- Text input-->
    <div class="col-md-12 form-group center">
      <label class="col-md-4 control-label" for="author">Auteur:</label>
      <div class="col-md-4">
        <input id="author" name="author" placeholder="Indiquez ici le nom de la personne passé en veille" class="form-control input-md" type="text">
      </div>
    </div>

    <div class="col-md-12 form-group center">
      <label class="col-md-4 control-label" for="title">Titre de la veille :</label>
      <div class="col-md-4">
        <input id="title" name="title" placeholder="Indiquez ici le titre de la veille" class="form-control input-md"  type="text">
      </div>
    </div>

    <div class="col-md-12 form-group center">
      <label class="col-md-4 control-label" for="duration">Durée de la veille :</label>
      <div class="col-md-4">
        <input id="duration" name="duration" placeholder="Indiquez ici la durée en minutes de la veille" class="form-control input-md"  type="number">
      </div>
    </div>

    <div class="col-md-12 form-group center">
      <label class="col-md-4 control-label" for="passage">Date de la veille :</label>
      <div class="col-md-4">
        <input id="passage" name="passage" placeholder="AAAA/MM/JJ" class="form-control input-md"  type="date">
      </div>
    </div>

    <!-- Button -->
    <div class="col-md-12 form-group center">
      <label class="col-md-4 control-label" for="validate"></label>
      <div class="col-md-4">
        <button id="validate" name="validate" class="btn btn-primary">Valider</button>
        <a href="veilles-html.php" name="retour" class="btn btn-danger">Retour</a>

      </div>
    </div>

  </form>
</div>

<?php

include('include/footer.php');
?>
