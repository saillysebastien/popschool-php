<?php

include("include/header.php");
include("include/footer.php");

?>
  <div class="container-fluid col-md-12">
    <ul>
<?php

$request = "SELECT * FROM eleves";
$result = $connection->query($request);

printf("<h2 class='center underline'>");
printf("Le nombre d'élèves s'élève à %d.<br/><br/>", $result->num_rows);
printf("</h2>");

while ($row = $result->fetch_assoc()) {
  printf('
<div class="form-group center border">
  <label class="col-md-4 control-label" for="button1">Eleve: %s %s</label>
  <div class="col-md-8">
    <a href="change_student.php?id=%s" class="btn btn-success">Editer</a>
    <a href="delete_student.php?id=%s" class="btn btn-danger">Supprimer</a>
  </div>
</div>

',
$row["firstname"],
$row["lastname"],
$row["id"],
$row["id"]);
}


?>
</ul>
</div>
