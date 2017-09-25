<?php
require('connect.php');

// $request = $db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages');
//
// while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
//   $perso = new Personnage($donnees);
//   echo $perso->nom(), ' a ', $perso->forcePerso(), ' de force, ', $perso->degats(), ' de dégâts, ', $perso->experience(), ' d\'expérience et est au niveau ', $perso->niveau(), '<br />';
// }

class Personnage {
  private $id;
  private $nom;
  private $forcePerso;
  private $degats;
  private $niveau;
  private $experience;

  public function hydrate(array $donnees) {
    foreach ($donnees as $key => $value) {
      $method = 'set'.ucfirst($key);

      if (method_exists($this, $method)) {
        $this->method($value);
      }
    }
  }

  public function id() {
    return $this->id;
  }

  public function nom() {
    return $this->nom;
  }

  public function forcePerso() {
    return $this->forcePerso;
  }

  public function degats() {
    return $this->degats;
  }

  public function niveau() {
    return $this->niveau;
  }

  public function experience() {
    return $this->experience;
  }

  public function setId($id) {
    $id = (int) $id;
    if ($id > 0) {
      $this->id = $id;
    }
  }

  public function setNom($nom) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($nom)) {
      $this->nom = $nom;
    }
  }

  public function setForcePerso($forcePerso) {
    $forcePerso = (int) $forcePerso;

    if ($forcePerso >= 1 && $forcePerso <= 100) {
      $this->forcePerso = $forcePerso;
    }
  }

  public function setDegats($degats) {
    $degats = (int) $degats;

    if ($degats >= 0 && $degats <= 100) {
      $this->degats = $degats;
    }
  }

  public function setNiveau($niveau) {
    $niveau = (int) $niveau;

    if ($niveau >= 1 && $niveau <= 100) {
      $this->niveau = $niveau;
    }
  }

  public function setExperience($experience) {
    $experience = (int) $experience;

    if ($experience >= 1 && $experience <= 100) {
      $this->experience = $experience;
    }
  }
}
