<?php
require('connect.php');
include('personnage.php');

class PersonnagesManager {
  private $bdd;

  public function __construct($db) {
    $this->setDb($db);
  }

  public function add(Personnage $perso) {
    $q = $this->bdd->prepare('INSERT INTO personnages(nom, forcePerso, degats, niveau, experience) VALUES(:nom, :forcePerso, :degats, :niveau, :experience)');

    $q->bindValue(':nom', $perso->nom());
    $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
    $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
    $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
    $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);

    $q->execute();
  }

  public function delete(Personnage $perso){
    $this->bdd->exec('DELETE FROM personnages WHERE id = '.$perso->id());
  }

  public function update(Personnage $perso) {
    $q->$this->bdd->prepare('UPDATE personnages SET forcePerso = :forcePerso, degats = :degats, niveau = :niveau, experience = :experience WHERE id= :id');

    $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
    $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
    $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
    $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
    $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);

    $q->execute();
  }

  public function get($id) {
    $id = (int) $id;

    $q = $this->bdd->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages WHERE id = '.$id);
    $donnes = $q->fetch(PDO::FETCH_ASSOC);

    return new Personnage($donnees);
  }

  public function getList() {

    $persos = [];
    $q->$this->bdd->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages ORDER BY nom');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
      $persos[] = new Personnage($donnees);
    }
    return $persos;
  }

  public function setDb(PDO $db) {
    $this->bdd = $db;
  }
}

$perso = new Personnage([
  'nom' => 'Victor',
  'forcePerso' => 5,
  'degats' => 0,
  'niveau' => 1,
  'experience' => 0
]);

$manager = new PersonnagesManager($db);
$manager->add($perso);
