<?php

    class EnseigneMenuManager{
        // ATTRIBUTS
        private $_db;
        // METHODES
        public function __construct($db){
            $this->setDb($db);
        }
        public function setDb(PDO $db){
            $this->_db = $db;
        }
        // CRDE
        public function add(EnseigneMenu $m){
            $q = $this->_db->prepare('INSERT INTO ENSEIGNE_MENU(enseigne_id, menu_id) VALUES(:eid,:mid)');
            $q->bindValue(':eid', $m->enseigne_id(), PDO::PARAM_INT);
            $q->bindValue(':mid', $m->menu_id(), PDO::PARAM_INT);
            $q->execute();
        }

        public function delete(EnseigneMenu $m){
            $q = $this->_db->prepare('DELETE FROM ENSEIGNE_MENU WHERE enseigne_id = :eid AND menu_id = :mid');
            $q->bindValue(':eid', $m->enseigne_id(), PDO::PARAM_INT);
            $q->bindValue(':mid', $m->menu_id(), PDO::PARAM_INT);
            $q->execute();
        }

        public function exists(EnseigneMenu $m){
            $q = $this->_db->prepare('SELECT COUNT(*) FROM ENSEIGNE_MENU WHERE enseigne_id = ? AND menu_id = ?');
            $q->execute([$m->enseigne_id(),$m->menu_id()]);
            $donnees = $q->fetch();
            return (bool) $donnees[0];
        }
    }