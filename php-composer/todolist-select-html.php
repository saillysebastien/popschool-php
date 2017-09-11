<?php

include('include/header-todolist.php');
require('todolist-connect.php');
$sql = "SELECT * FROM todo";
$stmt = $conn->query($sql);

?>

  <h2>Nombre de tâches enregistré: <?=$stmt->rowCount() ?></h2>
  <?php

  printf("
  <div class = 'container-fluid'>
  <table class = 'table table-bordered table-striped'>
  <thead>
  <tr>
  <td class = 'col-md-1 center'> Id </td>
  <td class = 'col-md-2 center'> Titre </td>
  <td class = 'col-md-4 center'> Description </td>
  <td class = 'col-md-2 center'> Date limite </td>
  <td class = 'col-md-1 center'> Statut </td>
  <td class = 'col-md-1 center'> Editer </td>
  <td class = 'col-md-1 center'> Supprimer </td>
    </tr>
  </thead>
  <tbody>");
  while ($row = $stmt->fetch()) {
    printf("<tr>
    <td class = 'col-md-1 center'>%s</td>
    <td class = 'col-md-2 center'>%s</td>
    <td class = 'col-md-4 center'>%s</td>
    <td class = 'col-md-2 center'>%s</td>
    <td class = 'col-md-1 center'>%s</td>
    <td class = 'col-md-1 center'><a href='todolist-update-html.php?id=%s'><i class='glyphicon glyphicon-edit'></i>&nbsp;</a>
    <td class = 'col-md-1 center'><a  onclick=\"return window.confirm(&quot;Voulez vraiment supprimer cet élément ?&quot;);\" href='todolist-delete-html.php?id=%s'><i class='glyphicon glyphicon-trash'></i>&nbsp;</a>
    </td>\n
    </tr>",
    $row['id'],
    $row['title'],
    $row['description'],
    $row['deadline'],
    $row['done'],
    $row['id'],
    $row['id']
  );
  }
  printf("
  </table
  </div>");
  ?>

  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
