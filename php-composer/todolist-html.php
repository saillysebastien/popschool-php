<?php
include("include/header-todolist.php");
require('vendor/autoload.php');
require('todolist-connect.php');

$sql = "SELECT * FROM todo";
$stmt = $conn->query($sql);


?>
<div class="container">
  <form class="form-horizontal">
    <fieldset>

      <!-- Form Name -->
      <legend>Liste des tâches</legend>

      <!-- Button (Double) -->
      <?php
      if ($stmt = $conn->query("SELECT * FROM todo")) {
        while ($row = $stmt->fetch()) {
          printf('
          <div class="form-group">
          <label class="col-md-4 control-label" for="edit_button">Id n° %s %s</label>
          <div class="col-md-8">
          <a href="todolist-update-html.php?id=%s" id="edit_button%s" name="edit%s" class="btn btn-success">Éditer</a>
          <a href="todolist-delete-html.php?id=%s" id="del_button%s" name="del%s" class="btn btn-danger">Supprimer</a>
          </div>
          </div>
          ',
          $row["id"],
          $row["title"],
          $row["id"],
          $row["id"],
          $row["id"],
          $row["id"],
          $row["id"],
          $row["id"]
        );
      }
    }
    ?>
  </fieldset>
</form>
