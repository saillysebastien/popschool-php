<?php

include('include/header-todolist.php');
require('vendor/autoload.php');
require('todolist-connect.php');

$informations = [];
$errors = [];
$id = null;

$valid = true;

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];
} else {
  $valid = false;
  $errors['id'] = 'Vous devez spécifier une tâche à supprimer';
}

if ($valid) {
  try {
    $count = $conn->delete('todo', ['id' => $id]);
  } catch (Exception $e) {
    // echo $e->getMessage();
    header('Location: error500.html', true, 302);
    exit();
  }

  $informations['delete'] = "<div class='alert alert-danger center'>  $count   tâche supprimée (id:  $id  )</div>\n";
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

    <legend class="center" >Suppression d'une tâche</legend>

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
