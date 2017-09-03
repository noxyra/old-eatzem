<?php // WELCOME TO CONTROLLER

    class EntrepriseHorairesManager{

        // ATTRIBUTS

        private $_db;

        // METHODES

        public function __construct($db){
            $this->setDb($db);
        }

        public function setDb(PDO $db){
            $this->_db = $db;
        }

        public function add(EntrepriseHoraires $d){
            $q = $this->_db->prepare('INSERT INTO ENTREPRISE_HORAIRES(entreprise_id, horaires_id) VALUES(:eid, :hid)');
            $q->bindValue(':eid', $d->entreprise_id(), PDO::PARAM_INT);
            $q->bindValue(':hid', $d->horaires_id(), PDO::PARAM_INT);
            $q->execute();
        }

        public function delete(EntrepriseHoraires $d){
            $q = $this->_db->prepare('DELETE FROM ENTREPRISE_HORAIRES WHERE entreprise_id = :eid AND horaires_id = :hid');
            $q->bindValue(':eid', $d->entreprise_id(), PDO::PARAM_INT);
            $q->bindValue(':hid', $d->horaires_id(), PDO::PARAM_INT);
            $q->execute();
        }

        public function exists(EntrepriseHoraires $d){
            $q = $this->_db->prepare('SELECT COUNT(*) FROM ENTREPRISE_HORAIRES WHERE entreprise_id = ? AND horaires_id = ?');
            $q->execute([$d->entreprise_id(), $d->horaires_id()]);
            $donnees = $q->fetch();
            return (bool) $donnees[0];
        }
    }