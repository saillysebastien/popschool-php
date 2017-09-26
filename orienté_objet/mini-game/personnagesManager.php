<?php

include('personnage.php');

class PersonnagesManager {
  private $bdd;

  public function __construct($db) {
    $this->setDb($db);
  }

  public function add(Personnage $perso) {
    $q = $this->bdd->prepare('INSERT INTO personnages(nom) VALUES(:nom)');
    $q->bindValue(':nom', $perso->nom());
    $q->execute();

    $perso->hydrate([
      'id' => $this->bdd->lastInsertId(),
      'degats' => 0,
    ]);
  }

  public function count() {
    return current($this->bdd->query('SELECT COUNT(*) FROM personnages')->fetch());
  }

  public function delete(Personnage $perso) {
    $this->bdd->exec('DELETE FROM personnages WHERE id = '.$perso->id());
  }

  public function exists($info) {
    if (is_int($info)) {
      return (bool) current($this->bdd->query('SELECT COUNT(*) FROM personnages WHERE id = '.$info)->fetch());
    }

    $q = $this->bdd->prepare('SELECT COUNT(*) FROM personnages WHERE nom = :nom');
    $q->execute([':nom' => $info]);

    return (bool) current($q->fetch());
  }

  public function get($info) {
    if (is_int($info)) {
      $q = $this->bdd->query('SELECT id, nom, degats FROM personnages WHERE id = '.$info);
      $donnees = $q->fetch(PDO::FETCH_ASSOC);

      return new Personnage($donnees);
    }
    else {
      $q = $this->bdd->prepare('SELECT id, nom, degats FROM personnages WHERE nom = :nom');
      $q->execute(['nom' => $info]);

      return new Personnage($q->fetch(PDO::FETCH_ASSOC));
    }
  }

  public function getList($nom) {
    $persos =  [];

    $q = $this->bdd->prepare('SELECT id, nom, degats FROM personnages WHERE nom <> :nom ORDER BY nom');
    $q->execute([':nom' => $nom]);

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
      $persos[] = new Personnage($donnees);
    }

    return $persos;
  }

  public function update(Personnage $perso) {
    $q = $this->bdd->prepare('UPDATE personnages SET degats = :degats WHERE id = :id');

    $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
    $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);

    $q->execute();
  }

  public function setDb(PDO $db) {
    $this->bdd = $db;
  }
}
