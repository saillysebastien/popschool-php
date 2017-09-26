<?php

class Personnage {

  // Je rappelle : tous les attributs en privé !

  private $_force;
  private $_localisation;
  private $_experience;
  private $_degats;


  // Déclarations des constantes en rapport avec la force.

  const FORCE_PETITE = 20;
  const FORCE_MOYENNE = 50;
  const FORCE_GRANDE = 80;


  public function __construct($forceInitiale) {
    $this->setForce($forceInitiale);
  }

  public function deplacer() {

  }


  public function frapper() {

  }


  public function gagnerExperience() {

  }

  public function setForce($force) {
    if (in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE])) {
      $this->force= $force;
    }
  }

  public static function parler() {
    echo 'Je vais tous vous tuer !';
  }
}


$perso = new Personnage(Personnage::FORCE_MOYENNE);
$perso->parler();
