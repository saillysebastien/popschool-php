<?php

session_start();

$product = '';
$quantity = '';

if (isset($_SESSION['product'])) {
  $product = $_SESSION['product'];
}

if (isset($_SESSION['quantity'])) {
  $quantity = $_SESSION['quantity'];
}

?><!DOCTYPE html>

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

    <form action="tunnel-01.php" method="post" class="form-horizontal">
      <fieldset>

        <!-- Form Name -->
        <legend>Confirmation d'achat</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="product">Produit acheté</label>
          <div class="col-md-4">
            <input id="product" name="product" placeholder="" class="form-control input-md" type="text" value="<?php echo htmlentities($product); ?>" disabled>
          </div>
        </div>

        <!-- numeric input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="quantity">Quantité selectionné</label>

          <div class="col-md-4">
            <input id="quantity" name="quantity" placeholder="" class="form-control input-md" type="text" value="<?php echo htmlentities($quantity); ?>" disabled>
          </div>
        </div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="return">Retour à l'accueil</label>
          <div class="col-md-4">
            <button id="return" name="return" class="btn btn-primary">Retour</button>
          </div>
        </div>

      </fieldset>
    </form>




  </div>


  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
