<?php

include("include/header.php");
include("include/footer.php");

if ($result = $connection->query("SELECT * FROM eleves")) {
  printf("<h2>");
  printf("Le résultat de la requête contient %d élèves.<br/>", $result->num_rows);
  printf("
  </h2>
  <br />
  <table class = 'table table-bordered table-hover'>
  <thead>
  <tr>
  <td class = 'col-md-4 id'> Id </td>
  <td class = 'col-md-4'> lastname </td>
  <td class = 'col-md-4'> firstname </td>
  </tr>
  </thead>
  <tbody>");

  while ($row = $result->fetch_assoc()) {
    printf("<tr> <td class = 'col-md-4 id'>%s</td> <td class = 'col-md-4 id'>%s</td> <td class = 'col-md-4'>%s</td>\n</tr>",  $row["id"], $row["lastname"], $row["firstname"]);
  }
}
else {
  printf("Erreur de requête");
}
printf("

</tbody>
</table>");
?>

</div>
