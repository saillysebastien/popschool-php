<?php
header("Access-Control-Allow-Origin: *");
include("../config/db.php");
$connection = new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_base
);
$connection->set_charset("utf8");

if(!isset($_POST["student"])) {
  die(json_encode("No data provided"));
}

$params = json_decode($_POST["student"], true);
$request = sprintf("UPDATE eleves SET
                firstname='%s',
                lastname='%s',
                idpromotion=%d
                WHERE id='%s'",
                $params["firstname"],
                $params["lastname"],
                $params["idpromotion"],
                $params["id"]);

if($connection->query($request)) {
  echo json_encode("success");
}
else {
  echo json_encode("failure");
}
?>
