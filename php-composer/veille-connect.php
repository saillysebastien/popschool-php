<?php

$config = new \Doctrine\DBAL\Configuration();

$connectionParams = [
  'dbname' => 'prezlist',
  'user' => 'root',
  'password' => 'wlprrlqhgUyftCnY',
  'host' => '127.0.0.1',
  'driver' => 'pdo_mysql',
  'charset' => 'utf8mb4'
];

try {
  $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
  $conn->connect();
} catch (Exception $e) {
  // echo $e->getMessage();
  //$todo logger l'erreur
  header('Location: error500.html', true, 302);
  exit();
}
?>
