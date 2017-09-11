<?php
// créez une base de données qui stocke des présentations
// inserez-y des présenations
//
// une présentation possède les champs suivasnts:
//   - titre
//   - durée en minutes
//   - auteur
//   - date ( jour, pas besoin de l'heure)
//
//   créez une page web qui affiche la lisre des présenations
require('vendor/autoload.php');
include('include/header.php');
require('veille-connect.php');

$sql = "SELECT * FROM veille";
$stmt = $conn->query($sql);

?>

  <h2>Nombre de personnes passées en veille : <?=$stmt->rowCount() ?></h2>
  <?php

  printf("
  <div class = 'container'>;
  <table class = 'table table-bordered table-hover'>
  <thead>
  <tr>
  <td class = 'col-md-2'> Id </td>
  <td class = 'col-md-3'> Auteur </td>
  <td class = 'col-md-3'> Titre </td>
  <td class = 'col-md-2'> Durée </td>
  <td class = 'col-md-2'> Date </td>
  </tr>
  </thead>
  <tbody>");
  while ($row = $stmt->fetch()) {
    printf("<tr> <td class = 'col-md-2'>%s</td> <td class = 'col-md-3'>%s</td> <td class = 'col-md-3'>%s</td> <td class = 'col-md-2'>%s minutes</td> <td class = 'col-md-2'>%s</td>\n</tr>", $row['id'], $row['author'], $row['title'], $row['duration'], $row['passage']);
  }
  printf("
  </table
  </div>");
  ?>
</div><!--//container dans header.php-->

<?php
include('include/footer.php');
 ?>
