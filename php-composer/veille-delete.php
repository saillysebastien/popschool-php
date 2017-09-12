<?php

include('include/header.php');
require('vendor/autoload.php');
require('veille-connect.php');

$informations = [];
$errors = [];
$id = null;

$valid = true;

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];
} else {
  $valid = false;
  $errors['id'] = 'Vous devez spécifier une veille à supprimer';
}

if ($valid) {
  try {
    $count = $conn->delete('veille', ['id' => $id]);
  } catch (Exception $e) {
    header('Location: error500.html', true, 302);
    exit();
  }

  $informations['delete'] = "<div class='alert alert-danger center'>  $count veille supprimée (id:  $id  )</div>\n";
}

?>


    <div>
      <?php
      if (isset($informations['delete'])) {
        echo $informations['delete'];
      }
      ?>
    </div>
    <div class="container">

      <a href="veilles-html.php" name="retour" class="btn btn-danger centered">Retour</a>

    <div>
      <?php
      if (isset($errors['id'])) {
        echo $errors['id'];
      }
      ?>
    </div>
  </div>

  </body>
</html>
