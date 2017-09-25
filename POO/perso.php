<?php

class Personnage {
  private $force;
  private $localisation = 'Lens';
  private $experience;
  private $degats;

  public function frapper(Personnage $persoAFrapper) {
    $persoAFrapper->degats += $this->force;
  }

  public function gagnerExperience() {
    // $this->experience = $this->experience + 1;
    $this->experience++;
  }

  public function setForce($force) {
    if (!is_int($force)) {
      trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);

      return;
    }
    if ($force > 100) {
      trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);

      return;
    }
    $this->force = $force;
  }

  public function setExperience($experience) {
      if (!is_int($experience)) {
        trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);

        return;
      }

      if ($experience > 100) {
        trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);

        return;
      }

      $this->experience = $experience;

    }

  public function degats() {
    return $this->degats;
  }

  public function force() {
    return $this->force;
  }

  public function experience() {
    return $this->experience;
  }
}

$perso1 = new Personnage;
$perso2 = new Personnage;

$perso1->setForce(10);
$perso1->setExperience(2);

$perso2->setForce(90);
$perso2->setExperience(58);

$perso1->frapper($perso2);
$perso1->gagnerExperience();

$perso2->frapper($perso1);
$perso2->gagnerExperience();

echo 'Le personnage 1 a ', $perso1->force(), ' de force, contrairement au personnage 2 qui a ', $perso2->force(), ' de force.<br />';

echo 'Le personnage 1 a ', $perso1->experience(), ' d\'expérience, contrairement au personnage 2 qui a ', $perso2->experience(), ' d\'expérience.<br />';

echo 'Le personnage 1 a ', $perso1->degats(), ' de dégâts, contrairement au personnage 2 qui a ', $perso2->degats(), ' de dégâts.<br />';
