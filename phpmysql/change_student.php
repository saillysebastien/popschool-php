<?php
include("include/header.php");
include("include/footer.php");

?>

    <?php
    // Si on n’a pas de id dans les paramètres de l’URL, on bloque la page
    if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] != 0) {

      // Si on a des variables en POST, on tente de modifier la promotion ciblée
      if (isset($_POST["elevelastname"]) && $_POST["elevelastname"] != " ") {
        $request = sprintf("UPDATE eleves SET lastname='%s', firstname='%s' WHERE id='%s'",
        $_POST["elevelastname"], $_POST["elevefirstname"], $_POST["id"]);
        if($connection->query($request)) {
          printf("<div class='alert alert-success'>Elève modifié</div>");
        }
        else {
          // Gestion d’erreur SQL
          printf("<div class='alert alert-warning'>Erreur: %s</div>", $connection->error);
        }
      }

      // On a un id en GET, on sélectionne la promotion et ses informations
      $request = sprintf("SELECT * FROM eleves WHERE id=%s", $_GET["id"]);
      $result = $connection->query($request);
      $eleve = $result->fetch_assoc();
    }
    else {
      // message d’alerte si on n’a pas d’id en paramètre d’URL
      printf("<div class='alert alert-danger'>Pas d’ID renseigné</div>");
      die();
    }
    ?>
    <form method="post" class="form-horizontal">
      <fieldset>

        <!-- Form Name -->
        <h2 class="center underline">Modifier un élève:</h2><br />

        <!-- Text input
        Notez les balises PHP qui permettent l’affichage dynamique -->

        <div class="form-group">
          <label class="col-md-4 control-label" for="elevelastname">Nom de l'élève :</label>
          <div class="col-md-4">
            <input id="elevelastname" name="elevelastname"
             class="form-control input-md center"
            required="" value="<?=$eleve["lastname"]?> <?=$eleve["firstname"]?>"
            type="text" disabled>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="elevelastname"></label>
          <div class="col-md-4">
            <input id="elevelastname" name="elevelastname"
            placeholder="Nouveau nom de l'élève" class="form-control input-md center"
            required="" value=""
            type="text">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="elevefirstname"></label>
          <div class="col-md-4">
            <input id="elevefirstname" name="elevefirstname"
            placeholder="Nouveau prénom de l'élève" class="form-control input-md center"
            required="" value=""
            type="text">
          </div>
        </div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="validate"></label>
          <div class="col-md-4">
            <input type="hidden" name="id" value="<?php printf("%s", $eleve["id"]);?>">
            <button id="validate" name="validate" class="btn btn-primary">Valider</button>
          </div>
        </div>

      </fieldset>
    </form>
  </div>
