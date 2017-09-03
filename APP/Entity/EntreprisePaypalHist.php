<?php
    class EntreprisePaypalHist{

        private $_entreprise_id;
        private $_token;

        private $_duree;
        private $_abonnement;
        private $_total;
        private $_transaction_content;

        private $_date;

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

        public function token(){ return $this->_token; }
        public function entreprise_id(){ return $this->_entreprise_id; }
        public function date(){ return $this->_date; }
        public function duree(){ return $this->_duree; }
        public function abonnement(){ return $this->_abonnement; }
        public function transaction_content(){ return $this->_transaction_content; }
        public function total(){ return $this->_total; }


        public function setEntreprise_id(int $id){
            $this->_entreprise_id = $id;
        }

        public function setToken(string $token){
            $this->_token = $token;
        }

        public function setDuree($dur){
            $dur = (int) $dur;
            $this->_duree = $dur;
        }
        
        public function setAbonnement(string $abonnement){
            $this->_abonnement = $abonnement;
        }

        public function setTotal($total){
            $this->_total = $total;
        }

        public function setTransaction_content($text){
            $this->_transaction_content = $text;
        }

        public function setDate($date){
            $this->_date = $date;
        }
    }