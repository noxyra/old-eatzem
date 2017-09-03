<?php
    class AnnoncesManager{

        // ATTRIBUTS

        private $_db;

        // METHODES

        public function __construct($db){
            $this->setDb($db);
        }

        public function setDb(PDO $db){
            $this->_db = $db;
        }

        public function add(Annonces $annonces){
            $q = $this->_db->prepare('INSERT INTO ANNONCES(enseigne_id, titre, contenu, date_ajout, date_reup, date_modif, distance_max) VALUES(:eid, :tit, :con, :daj, :dar, :dam, :dmax)');
            $q->bindValue(':eid', $annonces->enseigne_id(), PDO::PARAM_INT);
            $q->bindValue(':tit', $annonces->titre());
            $q->bindValue(':con', $annonces->contenu());
            $q->bindValue(':daj', $annonces->date_ajout());
            $q->bindValue(':dar', $annonces->date_reup());
            $q->bindValue(':dam', $annonces->date_modif());
            $q->bindValue(':dmax', $annonces->distance_max(), PDO::PARAM_INT);
            $q->execute();
            $annonces->hydrate(['id' => $this->_db->lastInsertId()]);
        }

        public function delete(Annonces $annonces){
            $this->_db->exec('DELETE FROM ANNONCES WHERE id = '.$annonces->id());
        }

        public function update(Annonces $annonces){
            $q =$this->_db->prepare("UPDATE ANNONCES SET enseigne_id = :eid, titre = :tit, contenu = :con, date_ajout = :daj, date_reup = :dar, date_modif = :dam, distance_max = :dmax WHERE id = :id");
            $q->bindValue(':eid', $annonces->enseigne_id(), PDO::PARAM_INT);
            $q->bindValue(':tit', $annonces->titre());
            $q->bindValue(':con', $annonces->contenu());
            $q->bindValue(':daj', $annonces->date_ajout());
            $q->bindValue(':dar', $annonces->date_reup());
            $q->bindValue(':dam', $annonces->date_modif());
            $q->bindValue(':id', $annonces->id(), PDO::PARAM_INT);
            $q->bindValue(':dmax', $annonces->distance_max(), PDO::PARAM_INT);
            $q->execute();
        }

        public function get($info){
            $info = (int) $info;
            $q = $this->_db->query('SELECT * FROM ANNONCES WHERE id = '.$info);
            $donnees = $q->fetch();
            return new Annonces($donnees);
        }

        public function exists(Annonces $annonces){
            return (bool) $this->_db->query('SELECT COUNT(*) FROM ANNONCES WHERE id = '.$annonces->id());
        }

        public function getList(){
            $annonces = [];

            $q = $this->_db->query('SELECT * FROM ANNONCES ORDER BY date_reup DESC');
            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                $annonces[] = new Annonces($donnees);
            }
            return $annonces;
        }

        public function getEnseigneList(Enseigne $enseigne){
            $annonces = [];
            $q = $this->_db->prepare('SELECT * FROM ANNONCES WHERE enseigne_id = :id ORDER BY date_reup DESC');
            $q->bindValue(':id', $enseigne->id(), PDO::PARAM_INT);
            $q->execute();
            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                $annonces[] = new Annonces($donnees);
            }
            return $annonces;
        }

        public function getEnseigneFiveList(Enseigne $enseigne){
            $annonces = [];
            $q = $this->_db->prepare('SELECT * FROM ANNONCES WHERE id = :id ORDER BY date_reup DESC LIMIT 0,10');
            $q->bindValue(':id', $enseigne->id(), PDO::PARAM_INT);
            $q->execute();
            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                $annonces[] = new Annonces($donnees);
            }
            return $annonces;
        }

        public function getUserList($latitude, $longitude){
            $return = [];

            $q = $this->_db->query("SELECT *, (get_distance_metres($latitude, $longitude, ENSEIGNE.lat, ENSEIGNE.lon) / 1000) AS dist 
            FROM ANNONCES, ENSEIGNE 
            WHERE ENSEIGNE.online = 1
            AND ANNONCES.enseigne_id = ENSEIGNE.id 
            AND (get_distance_metres($latitude, $longitude, ENSEIGNE.lat, ENSEIGNE.lon) / 1000) <= ANNONCES.distance_max
            GROUP BY ANNONCES.id
            ORDER BY ANNONCES.date_reup");

            while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                $return[] = array(
                    'annonce' => new Annonces($donnees),
                    'enseigne' => new Enseigne($donnees),
                );
            }

            return $return;
        }
    }