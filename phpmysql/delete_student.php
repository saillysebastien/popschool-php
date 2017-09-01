<?php

include("include/header.php");
include("include/footer.php");

// Si on n’a pas de id dans les paramètres de l’URL, on bloque la page
if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] != 0) {
  // On a un id en GET, on sélectionne la promotion et ses informations
  $request = sprintf("SELECT * FROM eleves WHERE id=%d", $_GET["id"]);
  $result = $connection->query($request);
  $eleves = $result->fetch_assoc();

  // Si on a des variables en POST, on tente de modifier la promotion ciblée
  if (isset($_POST["user_validation"]) && $_POST["user_validation"] == "oui") {
    $request = sprintf("DELETE FROM eleves WHERE id='%s'",
    $_POST["id"]);
    if($connection->query($request)) {
      printf("<div class='alert alert-success'>Elève supprimé</div>");
    }
    else {
      // Gestion d’erreur SQL
      printf("<div class='alert alert-warning'>Erreur: %s</div>", $request->error);
    }
  }

  //message d'alerte si oui n'est pas rentré
  else if (isset($_POST["user_validation"]) && $_POST["user_validation"] != "oui") {
    printf("<div class='alert alert-warning'> ERREUR: Vous devez taper oui pour supprimer !!!</div>");
  }
}
else {
  // message d’alerte si on n’a pas d’id en paramètre d’URL
  die("<div class='alert alert-warning'>Pas d’ID renseigné</div>");
}
?>

<form method="post" class="form-horizontal">
  <fieldset>

    <!-- Form Name -->
    <h2 class="center underline">Supprimer un élève:</h2><br />

    <!-- Text input
    Notez les balises PHP qui permettent l’affichage dynamique -->

    <div class="form-group">
      <label class="col-md-4 control-label" for="deletelastname">Nom de l'élève :</label>
      <div class="col-md-4">
        <input id="deletelastname" name="deletelastname"
        placeholder="Nom de l'élève" class="form-control input-md"
        value="<?=$eleves["lastname"]?>"
        type="text" disabled>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="deletefirstname">Prénom de l'élève :</label>
      <div class="col-md-4">
        <input id="deletefirstname" name="deletefirstname"
        placeholder="Prénom de l'élève" class="form-control input-md"
        value="<?=$eleves["firstname"]?>"
        type="text" disabled>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="user_validation">Voulez vous supprimer la promotion ?</label>
      <div class="col-md-4">
        <input id="user_validation" name="user_validation"
        placeholder="Tapez oui pour supprimez" class="form-control input-md"
        required="" value="" type="text">
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="validate"></label>
      <div class="col-md-4">
        <input type="hidden" name="id" value="<?=$eleves["id"]?>" />
        <button id="validate" name="validate" class="btn btn-primary">Valider</button>
      </div>
    </div>

  </fieldset>
</form>
</div>
