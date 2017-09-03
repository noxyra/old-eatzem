<?php
    class EntrepriseModePaiement{

        // ATTRIBUTS

        private $_entreprise_id;
        private $_modepaiement_id;

        // FUNCTION

        public function __construct(array $donnees){
            $this->hydrate($donnees);
        }

        public function hydrate(array $donnees){
            foreach($donnees as $key => $value){
                $method = 'set' . (ucfirst($key));
                if(method_exists($this, $method)){
                    $this->$method($value);
                }
            }
        }

        public function entreprise_id(){ return $this->_entreprise_id;}
        public function modepaiement_id(){ return $this->_modepaiement_id;}

        public function setEntreprise_id($id){
            $id = (int) $id;
            $this->_entreprise_id = $id;
        }

        public function setModepaiement_id($id){
            $id = (int) $id;
            $this->_modepaiement_id = $id;
        }
    }