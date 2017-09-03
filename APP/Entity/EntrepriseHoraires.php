<?php
    class EntrepriseHoraires{

        // ATTRIBUTS

        private $_entreprise_id;
        private $_horaires_id;

        // METHODES

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

        public function entreprise_id(){ return $this->_entreprise_id; }
        public function horaires_id(){ return $this->_horaires_id; }

        public function setEntreprise_id($id){
            $id = (int) $id;
            $this->_entreprise_id = $id;
        }

        public function setHoraires_id($id){
            $id = (int) $id;
            $this->_horaires_id = $id;
        }
    }