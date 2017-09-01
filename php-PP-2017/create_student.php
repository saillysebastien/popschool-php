<?php
include("include/header.php");
include("include/footer.php");
// Si on a reçu des paramètres en POST grâce au formulaire
if(isset($_POST["elevelastname"]) && $_POST["elevelastname"] != " ") {
  // On prépare la requête au serveur de base de données
  $request = sprintf("INSERT INTO eleves (id, lastname, firstname, idpromotion) VALUES ('', '%s', '%s', '%s' )",
  $_POST["elevelastname"], $_POST["elevefirstname"], $_POST["idpromotion"]);
  if($connection->query($request)) {
    // Si on est ici, c’est que ça a marché
    printf("<div class='alert alert-success'>Elève créé</div>\n<a href='students.php'>Retour à la liste des élèves</a>");
  }
  else {
    // Si on est ici, c’est que ça a foiré. Message pour la gestion d’erreur MySQL
    printf("<div class='alert alert-warning'>Erreur: %s</div>", $connection->error);
  }
}
?>

<div class="container">
  <form method="POST" class="form-horizontal">
    <fieldset>
      <!-- Form Name -->
      <legend class="center underline">Créer un élève :</legend>
      <!-- Text input-->
      <div class="form-group center">
        <label class="col-md-4 control-label" for="elevelastname">Nom de l'élève :</label>
        <div class="col-md-4">
          <input id="elevelastname" name="elevelastname" placeholder="Indiquez ici le nom de l'élève" class="form-control input-md" required="" type="text">
        </div>
      </div>

      <div class="form-group center">
        <label class="col-md-4 control-label" for="elevefirstname">Prénom de l'élève :</label>
        <div class="col-md-4">
          <input id="elevefirstname" name="elevefirstname" placeholder="Indiquez ici le prénom de l'élève" class="form-control input-md" required="" type="text">
        </div>
      </div>

      <div class="form-group center">
        <label class="col-md-4 control-label" for="idpromotion">Id de la promotion :</label>
        <div class="col-md-4">
          <input id="idpromotion" name="idpromotion" placeholder="Indiquez ici l'id de la promotion" class="form-control input-md" required="" type="text">
        </div>
      </div>

      <!-- Button -->
      <div class="form-group center">
        <label class="col-md-4 control-label" for="validate"></label>
        <div class="col-md-4">
          <button id="validate" name="validate" class="btn btn-primary">Valider</button>
        </div>
      </div>

    </fieldset>
  </form>
</div>
