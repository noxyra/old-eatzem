<?php
    class ProduitsIngredientsManager{

        // ATTRIBUTS

        private $_db;

        // METHODES

        public function __construct($db){
            $this->setDb($db);
        }

        public function setDb(PDO $db){
            $this->_db = $db;
        }

        public function add(ProduitsIngredients $pi){
            $q = $this->_db->prepare('INSERT INTO PRODUITS_INGREDIENTS(produits_id, ingredients_id) VALUES(:pid, :iid)');
            $q->bindValue(':pid', $pi->produits_id(), PDO::PARAM_INT);
            $q->bindValue(':iid', $pi->ingredients_id(), PDO::PARAM_INT);
            $q->execute();
        }

        public function delete(ProduitsIngredients $pi){
            $q = $this->_db->prepare('DELETE FROM PRODUITS_INGREDIENTS WHERE produits_id = :pid AND ingredients_id = :iid');
            $q->bindValue(':pid', $pi->produits_id(), PDO::PARAM_INT);
            $q->bindValue(':iid', $pi->ingredients_id(), PDO::PARAM_INT);
            $q->execute();
        }

        public function exists(ProduitsIngredients $pi){
            $q = $this->_db->prepare('SELECT COUNT(*) FROM PRODUITS_INGREDIENTS WHERE produits_id = ? AND ingredients_id = ?');
            $q->execute([$pi->produits_id(), $pi->ingredients_id()]);
            $donnees = $q->fetch();
            return (bool) $donnees[0];
        }
    }