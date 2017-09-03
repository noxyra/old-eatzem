<?php

class EntrepriseMenuManager{

    // ATTRIBUTS

    private $_db;

    // METHODES

    public function __construct($db){
        $this->setDb($db);
    }

    public function setDb(PDO $db){
        $this->_db = $db;
    }

    public function add(EntrepriseMenu $d){
        $q = $this->_db->prepare('INSERT INTO ENTREPRISE_MENU(entreprise_id, menu_id) VALUES(:eid, :mid)');
        $q->bindValue(':eid', $d->entreprise_id(), PDO::PARAM_INT);
        $q->bindValue(':mid', $d->menu_id(), PDO::PARAM_INT);
        $q->execute();
    }

    public function delete(EntrepriseMenu $d){
        $q = $this->_db->prepare('DELETE FROM ENTREPRISE_MENU WHERE entreprise_id = :eid AND menu_id = :mid');
        $q->bindValue(':eid', $d->entreprise_id(), PDO::PARAM_INT);
        $q->bindValue(':mid', $d->menu_id(), PDO::PARAM_INT);
        $q->execute();
    }

    public function exists(EntrepriseMenu $d){
        $q = $this->_db->prepare('SELECT COUNT(*) FROM ENTREPRISE_MENU WHERE entreprise_id = ? AND menu_id = ?');
        $q->execute([$d->entreprise_id(), $d->menu_id()]);
        $donnees = $q->fetch();
        return (bool) $donnees[0];
    }

}