<?php


//dans tunnel-01.php, créer un formulaire avec :
// - un champ texte nommé "product"
// - un champ numérique nommé "quantity"
// le formulaire doir envoyer les données à tunnel-02.php

//dans tunnel-02.php, récupérez les données et insérez les dans les clés "product"
//et "quantity" de la variable de Session
//affichez les clés "product" et "quantity" de la variable de session
//ajouter un lien nommé "commander" qui renvoit vers la page tunnel-03.php

//dans tunnel-03.php, affichez les clés "product" et "quantity" de la variable de session

?>
<!DOCTYPE html>

<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Titre</title>

  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel ="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel ="stylesheet" href="assets/css/bootstrap-theme.min.css" />


</head>

<body>
  <div class="container">

    <form action="tunnel-02.php" method="post" class="form-horizontal">
      <fieldset>

        <!-- Form Name -->
        <legend>Produit et quantité à saisir</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="product"></label>
          <div class="col-md-4">
            <input id="product" name="product" placeholder="Nom du produit" required="" class="form-control input-md" type="text" value="" />
          </div>
        </div>

        <!-- numeric input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="quantity"></label>
          <div class="col-md-4">
            <input id="quantity" name="quantity" placeholder="Quantité du produit" required="" class="form-control input-md" type="number" value="" />
          </div>
        </div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="valide"></label>
          <div class="col-md-4">
            <button id="valide" name="valide" class="btn btn-primary">Valider</button>
          </div>
        </div>

      </fieldset>
    </form>

  </div>


  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
