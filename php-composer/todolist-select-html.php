<?php

include('include/header-todolist.php');
require('todolist-connect.php');
$sql = "SELECT * FROM todo";
$stmt = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Passage en veille</title>

  <link rel="stylesheet" href="../../assets/css/style.css" />
  <link rel ="stylesheet" href="../assets/css/bootstrap.min.css" />
  <link rel ="stylesheet" href="../assets/css/bootstrap-theme.min.css" />

</head>
<body>

  <h2>Taches à effectuer : <?=$stmt->rowCount() ?></h2>
  <?php

  printf("
  <div class = 'container'>
  <table class = 'table table-bordered table-hover'>
  <thead>
  <tr>
  <td class = 'col-md-2'> Id </td>
  <td class = 'col-md-2'> Titre </td>
  <td class = 'col-md-3'> Description </td>
  <td class = 'col-md-3'> Date limite </td>
  <td class = 'col-md-2'> Statut </td>
  </tr>
  </thead>
  <tbody>");
  while ($row = $stmt->fetch()) {
    printf("<tr> <td class = 'col-md-2'>%s</td> <td class = 'col-md-2'>%s</td> <td class = 'col-md-3'>%s</td> <td class = 'col-md-3'>%s</td> <td class = 'col-md-2'>%s</td>\n</tr>", $row['id'], $row['title'], $row['description'], $row['deadline'], $row['done']);
  }
  printf("
  </table
  </div>");
  ?>

  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
