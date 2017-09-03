<?php

    class IngredientsManager
    {

        // ATTRIBUTS

        private $_db;

        // METHODE

        public function __construct($db)
        {
            $this->setDb($db);
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }

        public function add(Ingredients $i){
            $q = $this->_db->prepare('INSERT INTO INGREDIENTS(nom) VALUES(:nm)');
            $q->bindValue(':nm', $i->nom());
            $q->execute();
            $i->hydrate(['id' => $this->_db->lastInsertId()]);
        }

//        public function delete(Ingredients $i){ // NE DOIT PAS ÊTRE UTILISE : SAUF ADMIN
//            $this->_db->exec('DELETE FROM INGREDIENTS WHERE id = '.$i->id());
//        }

        public function update(Ingredients $i){
            $q = $this->_db->prepare('UPDATE INGREDIENTS SET nom = :nm WHERE id = :id');
            $q->bindValue(':nm', $i->nom());
            $q->bindValue(':id', $i->id(), PDO::PARAM_INT);
            $q->execute();
        }

        public function exists($info){
            if(is_int($info)){
                return (bool) $this->_db->query('SELECT COUNT(*) FROM INGREDIENTS WHERE id = '.$info)->fetchColumn();
            }
            else{
                $q = $this->_db->prepare('SELECT * FROM INGREDIENTS WHERE nom = :nm');
                $q->execute([':nm' => $info]);
                if(count($q->fetch(PDO::FETCH_ASSOC)) > 1){
                    return true;
                }
                else{
                    return false;
                }
            }
        }

        public function get($info){
            $id = (int) $info;
            $q = $this->_db->query('SELECT * FROM INGREDIENTS WHERE id = '.$info);
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            return new Ingredients($donnees);
        }

        public function getList(){
            $ings = [];
            $q = $this->_db->query('SELECT * FROM INGREDIENTS ORDER BY id DESC');
            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                $ings[] = new Ingredients($donnees);
            }
            return $ings;
        }

        public function getAlpList(){
            $ings = [];
            $q = $this->_db->query('SELECT * FROM INGREDIENTS ORDER BY nom');
            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                $ings[] = new Ingredients($donnees);
            }
            return $ings;
        }

        public function count(){
            return $this->_db->query('SELECT COUNT(*) FROM INGREDIENTS')->fetchColumn();
        }
    }