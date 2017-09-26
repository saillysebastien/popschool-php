<?php
require('connect.php');
include('personnagesManager.php');

function chargerClasse($classname) {
  require $classname.'.php';
}

spl_autoload_register('chargerClasse');

session_start();

if (isset($_GET['deconnexion'])) {
  session_destroy();
  header('Location: .');
  exit();
}

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$manager = new PersonnagesManager($db);

if (isset($_SESSION['nom'])) {
  $perso = $_SESSION['perso'];
}

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

elseif (isset($_GET['frapper'])) {
  if (!isset($perso)) {
    $message = 'Merci de bien vouloir créer un personnage ou de vous identifier.';
  }
  else {
    if (!$manager->exists((int) $_GET['frapper'])) {
      $message = 'Le personnage que vous voulez frapper n\'existe pas !';
    }
    else {
      $persoAFrapper = $manager->get((int) $_GET['frapper']);

      $retour = $perso->frapper($persoAFrapper);

      switch ($retour) {

        case Personnage::PERSONNAGE_MOI :
        $message = 'Mais pourquoi voulez vous vous frapper ?';
        break;

        case Personnage::PERSONNAGE_FRAPPE :
        $message = 'Le personnage a bien été frappé';

        $manager->update($perso);
        $manager->update($persoAFrapper);
        break;

        case Personnage::PERSONNAGE_TUE :
        $message = 'Vous avez tué ce personnage !';

        $manager->update($perso);
        $manager->delete($persoAFrapper);
        break;
      }
    }
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
    <p><a href="?deconnexion=1">Déconnexion</a></p>

    <fieldset>
      <legend>Mes informations</legend>
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
            echo '<a href="?frapper=', $unPerso->id(), '">', htmlspecialchars($unPerso->nom()), '</a> (degats : ', $unPerso->degats(), ')<br />';
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
<?php
if (isset($perso)) {
  $_SESSION['perso'] = $perso;
}
