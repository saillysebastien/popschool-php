<?php
include('connect.php');

$request = $db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages');

while ($perso = $request->fetch(PDO::FETCH_ASSOC)) {
  echo $perso['nom'], ' a ', $perso['forcePerso'], ' de force, ', $perso['degats'], ' de dégâts, ', $perso['experience'], ' d\'expérience et est au niveau ', $perso['niveau'], '.', '<br />';
}

class Personnage {
  private $id;
  private $nom;
  private $forcePerso;
  private $degats;
  private $niveau;
  private $experience;

  public function id() {
    return $this->_id;
  }

  public function nom() {
    return $this->_nom;
  }

  public function forcePerso() {
    return $this->_forcePerso;
  }

  public function degats() {
    return $this->_degats;
  }

  public function niveau() {
    return $this->_niveau;
  }

  public function experience() {
    return $this->_experience;
  }

  public setId($id) {
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
      $this->_forcePerso = $forcePerso;
    }
  }

  public function setDegats($degats) {
    $degats = (int) $degats;

    if ($degats >= 0 && $degats <= 100) {
      $this->_degats = $degats;
    }
  }

  public function setNiveau($niveau) {
    $niveau = (int) $niveau;

    if ($niveau >= 1 && $niveau <= 100) {
      $this->_niveau = $niveau;
    }
  }

  public function setExperience($experience) {
    $experience = (int) $experience;

    if ($experience >= 1 && $experience <= 100) {
      $this->_experience = $experience;
    }
  }
}
