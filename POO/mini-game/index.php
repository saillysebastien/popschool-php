<?php
require('connect.php');
include('personnagesManager.php');

function chargerClasse($classname) {
  require $classname.'.php';
}

spl_autoload_register('chargerClasse');

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$manager = new PersonnagesManager($db);

if (isset($_POST['creer']) && isset($_POST['nom'])) {
  $perso = new Personnage(['nom' => $_POST['nom']]);
  if (!$perso->nomValide()) {
    $message = 'Le nom choisi est invalide.';
    unset($perso);
  }
  elseif ($manager->exists($perso->nom())) {
    $message = 'Le nom est déjà pris.';
    unset($perso);
  }
  else {
    $manager->add($perso);
  }
}

elseif (isset($_POST['utiliser']) && isset($_POST['nom'])) {
  if ($manager->exists($_POST['nom'])) {
    $perso =  $manager->get($_POST['nom']);
  }
  else {
    $message = 'Ce personnage n\'existe pas !';
  }
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Mini jeu de combat</title>

  <meta charset="utf-8" />
</head>
<body>
  <p>Nombre de personnages crées: <?= $manager->count() ?></p>
  <?php
  if (isset($message)) {
    echo '<p>', $message, '</p>';
  }
  if (isset($perso)) {
    ?>
    <fieldset>
      <legend> Mes informations</legend>
      <p>
        Nom: <?= htmlspecialchars($perso->nom()) ?><br />
        Dégats: <?= $perso->degats() ?>
      </p>
    </fieldset>

    <fieldset>
      <legend>Qui frapper ?</legend>
      <p>
        <?php
        $persos = $manager->getList($perso->nom());
        if (empty($persos)) {
          echo 'Personne à frapper !';
        }
        else {
          foreach ($persos as $unPerso) {
            echo '<a href="?frapper=', $unPerso->id(), '">',htmlspecialchars($unPerso->nom()), '</a> (degats : ', $unPerso->degats(), ')<br />';
          }
        }
        ?>
      </p>
    </fieldset>

    <?php
  }
  else {
    ?>
    <form action="" method="post">
      <p>
        Nom : <input type="text" name="nom" maxlength="50" required />
        <input type="submit" value="Créer ce personnage" name="creer" />
        <input type="submit" value="Utiliser ce personnage" name="utiliser" />
      </p>
    </form>
    <?php
  }
  ?>
</body>
</html>
