<!DOCTYPE html>
<?php


$url = '';
$tags = [];

if ($_POST) {
  // var_dump($_POST);

  if (isset($_POST['url'])) {
    $url = $_POST['url'];
  }

  if (isset($_POST['tags'])) {
    $tags = $_POST['tags'];
  }
}


?><html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>title</title>

  <!-- stockez les données de l'utilisateur dans
  - la variable $url
  - la variable $tags

  affichez le contenu de ces balises dans la balise body -->
</head>

<body>

  <div>url : <?= htmlentities($url) ?></div>

  <div>tags:</div>
  <ul>
    <?php
    foreach ($tags as $key => $value) {
      echo '<li>' . htmlentities($value) . '</li>';
    }
    ?>
  </ul>

</body>
</html>
