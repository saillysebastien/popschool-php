<?php

// créez une version json de veille-htlm.php

require('veille-connect.php');
require('vendor/autoload.php');

$sql = "SELECT * FROM veille";
$data = $conn->fetchAll($sql);
$json = json_encode($data, JSON_PRETTY_PRINT);
echo $json;
