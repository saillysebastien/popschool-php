<?php

include("include/header.php");
include("include/footer.php");

?>
  <div class="container-fluid col-md-12">
    <ul>

<?php

$request = "SELECT * FROM promotions";
$result = $connection->query($request);

if ($result = $connection->query("SELECT * FROM promotions")) {
printf("<h2 class='center underline'>");
printf("Le nombre de promotion s'élève à %d.<br/><br />", $result->num_rows);
printf("</h2>");
}

while ($row = $result->fetch_assoc()) {
  printf('
<div class="form-group center">
  <label class="col-md-8 control-label center" for="button2">Promotion: %s <br /> Date de début: %s <br /> Date de fin: %s</label>
  <div class="col-md-4">
    <a href="change_promotion.php?id=%s" class="btn btn-success">Editer</a>
    <a href="delete_promotion.php?id=%s" class="btn btn-danger">Supprimer</a>
  </div>
</div>
</fieldset>
</form>
',
$row["name"],
$row["startdate"],
$row["enddate"],
$row["id"],
$row["id"]);
}


?>
</ul>
</div>
