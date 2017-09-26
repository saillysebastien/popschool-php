<?php

include('perso.php');
include('connect.php');

class PersonnesManager {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function add(Personnage $perso) {
    $q = $this->db->prepare('INSERT INTO personnages_v2(nom, type) VALUES(:nom, :type)');

    $q = bindValue(':nom'  , $perso->nom());
    $q = bindValue(':type', $perso->type());

    $q = execute();

    $perso->hydrate([
      'id'=> $this->db->lastInsertId(),
      'degats' => 0,
      'atout' => 0
    ]);
  }
  public function count() {
    return current($this->db->query('SELECT COUNT(*) FROM personnages_v2')->fetch());
  }

  public function delete(Personnage $perso) {
    $this->db->query('DELETE FROM personnages_v2 WHERE id = '.$perso->id());
  }

  public function exists($info) {
    if (is_int($info)) {
      return (bool) current($this->db->query('SELECT FROM personnages_v2 WHERE id = '.$info)->fetch());
    }
    else {
      $q = $this->db->prepare('SELECT COUNT(*) FROM personnages_v2 WHERE nom = :nom');
      $q->execute(['nom' => $info]);

      return (bool) $q->fetchCollumn();
    }
  }

  public function get($info) {
    if (is_int($info)) {
      $q = $this->db->query('SELECT id, nom, degats, timeEndormi, type, atout FROM personnages_v2 WHERE id = '.$info);
      $perso = $q->fetch(PDO::FETCH_ASSOC);
    }
    else {
      $q = $this->db->query('SELECT id, nom, degats, timeEndormi, type, atout FROM personnages_v2 WHERE nom = :nom');
      $q->execute([':nom' => $info]);

      $perso = $q->fetch(PDO::FETCH_ASSOC);
    }

    switch ($perso['type']) {
      case 'guerrier': return new Guerrier($perso);
      case 'magicien': return new Magicien($perso);
      default: return null;
    }
  }

  public function getList($nom) {
    $persos = [];

    $q = $this->db->prepare('SELECT id, nom, degats, timeEndormi, type, atout FROM personnages_v2 WHERE nom <> :nom ORDER BY nom');
    $q->execute(['nom' => $nom]);

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
      switch ($donnees['type']) {
        case 'guerrier': $persos[] = new Guerrier($donnees);
        break;
        case 'magicien': $persos[] = new Magicien($donnees);
        break;
      }
    }
    return $persos;
  }

  public function update(Personnage $perso) {
    $q = $this->db->prepare('UPDATE personnages_v2 SET degats = :degats, timeEndormi = :timeEndormi, atout = :atout WHERE id = :id');

    $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
    $q->bindValue(':timeEndormi', $perso->timeEndormi(), PDO::PARAM_INT);
    $q->bindValue(':atout', $perso->atout(), PDO::PARAM_INT);
    $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);

    $q->execute();
  }
}
