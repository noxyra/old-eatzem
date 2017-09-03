<?php

    class EntrepriseModePaiementManager{

        // ATTRIBUTS

        private $_db;

        // METHODES

        public function __construct($db){
            $this->setDb($db);
        }

        public function setDb(PDO $db){
            $this->_db = $db;
        }

        public function add(EntrepriseModePaiement $d){
            $q = $this->_db->prepare('INSERT INTO ENTREPRISE_MODEPAIEMENT(entreprise_id, modepaiement_id) VALUES(:eid, :mid)');
            $q->bindValue(':eid', $d->entreprise_id(), PDO::PARAM_INT);
            $q->bindValue(':mid', $d->modepaiement_id(), PDO::PARAM_INT);
            $q->execute();
        }

        public function delete(EntrepriseModePaiement $d){
            $q = $this->_db->prepare('DELETE FROM ENTREPRISE_MODEPAIEMENT WHERE entreprise_id = :eid AND modepaiement_id = :mid');
            $q->bindValue(':eid', $d->entreprise_id(), PDO::PARAM_INT);
            $q->bindValue(':mid', $d->modepaiement_id(), PDO::PARAM_INT);
            $q->execute();
        }

        public function exists(EntrepriseModePaiement $d){
            $q = $this->_db->prepare('SELECT COUNT(*) FROM ENTREPRISE_MODEPAIEMENT WHERE entreprise_id = ? AND modepaiement_id = ?');
            $q->execute([$d->entreprise_id(), $d->modepaiement_id()]);
            $donnees = $q->fetch();
            return (bool) $donnees[0];
        }
    }