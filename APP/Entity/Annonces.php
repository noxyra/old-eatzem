<?php
    class Annonces{
        private $_id;
        private $_enseigne_id;
        private $_titre;
        private $_contenu;
        private $_date_ajout;
        private $_date_reup;
        private $_date_modif;
        private $_distance;
        private $_distance_max;

        public function hydrate(array $donnees){
            foreach($donnees as $key => $value){
                $method = 'set' . (ucfirst($key));
                if(method_exists($this, $method)){
                    $this->$method($value);
                }
            }
        }

        public function __construct(array $donnees){
            $this->hydrate($donnees);
        }

        public function id(){               return $this->_id; }
        public function enseigne_id(){      return $this->_enseigne_id; }
        public function titre(){            return $this->_titre; }
        public function contenu(){          return $this->_contenu; }
        public function date_ajout(){       return $this->_date_ajout; }
        public function date_reup(){        return $this->_date_reup; }
        public function date_modif(){       return $this->_date_modif; }
        public function distance(){         return $this->_distance; }
        public function distance_max(){         return $this->_distance_max; }

        public function setId($id){
            $id = (int) $id;
            $this->_id = $id;
        }

        public function setEnseigne_id($id){
            $id = (int) $id;
            $this->_enseigne_id = $id;
        }

        public function setTitre($titre){
            $this->_titre = $titre;
        }

        public function setContenu($contenu){
            $this->_contenu = $contenu;
        }

        public function setDate_ajout($date){
            $this->_date_ajout = $date;
        }

        public function setDate_reup($date){
            $this->_date_reup = $date;
        }

        public function setDate_modif($date){
            $this->_date_modif = $date;
        }

        public function setDistance_max($dist){
            $dist = (int) $dist;
            $this->_distance_max = $dist;
        }

        public function setDistance($distance){
            $this->_distance = $distance;
        }
    }