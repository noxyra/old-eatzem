<?php

    class EntrepriseProduitsManager{

        // ATTRIBUTS

        private $_db;

        // METHODES

        public function __construct($db){
            $this->setDb($db);
        }

        public function setDb(PDO $db){
            $this->_db = $db;
        }

        public function add(EntrepriseProduits $d){
            $q = $this->_db->prepare('INSERT INTO ENTREPRISE_PRODUITS(entreprise_id, produits_id) VALUES(:eid, :pid)');
            $q->bindValue(':eid', $d->entreprise_id(), PDO::PARAM_INT);
            $q->bindValue(':pid', $d->produits_id(), PDO::PARAM_INT);
            $q->execute();
        }

        public function delete(EntrepriseProduits $d){
            $q = $this->_db->prepare('DELETE FROM ENTREPRISE_PRODUITS WHERE entreprise_id = :eid AND produits_id = :pid');
            $q->bindValue(':eid', $d->entreprise_id(), PDO::PARAM_INT);
            $q->bindValue(':pid', $d->produits_id(), PDO::PARAM_INT);
            $q->execute();
        }

        public function exists(EntrepriseProduits $d){
            $q = $this->_db->prepare('SELECT COUNT(*) FROM ENTREPRISE_PRODUITS WHERE entreprise_id = ? AND produits_id = ?');
            $q->execute([$d->entreprise_id(), $d->produits_id()]);
            $donnees = $q->fetch();
            return (bool) $donnees[0];
        }
    }