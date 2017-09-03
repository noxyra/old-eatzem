<?php
    class EnseigneMenu{

        // ATTRIBUTS

        private $_enseigne_id;
        private $_menu_id;

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

        public function enseigne_id(){ return $this->_enseigne_id; }
        public function menu_id(){ return $this->_menu_id; }

        public function setEnseigne_id($id){
            $id = (int) $id;
            $this->_enseigne_id = $id;
        }

        public function setMenu_id($id){
            $id = (int) $id;
            $this->_menu_id = $id;
        }
    }