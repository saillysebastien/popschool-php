<?php

class Compteur {

  // Déclaration de la variable $compteur

  private static $compteur = 0;


  public function __construct() {
    // On instancie la variable $compteur qui appartient à la classe (donc utilisation du mot-clé self).
    self::$compteur++;
  }


  public static function getCompteur() // Méthode statique qui renverra la valeur du compteur.
  {
    return self::$compteur;
  }

}

$test1 = new Compteur;
$test2 = new Compteur;
$test3 = new Compteur;

echo Compteur::getCompteur();
