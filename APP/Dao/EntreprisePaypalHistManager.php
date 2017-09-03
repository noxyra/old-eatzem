<?php

    class EntreprisePaypalHistManager{

        private $_db;

        public function __construct($db){
            $this->setDb($db);
        }

        public function setDb(PDO $db){
            $this->_db = $db;
        }

        public function add(EntreprisePaypalHist $data){
            $q = $this->_db->prepare('INSERT INTO ENTREPRISE_PAYPAL_HISTORY(token, entreprise_id, duree, abonnement, transaction_content, total) VALUES(:token, :eid, :dur, :abo, :trc, :tot)');
            $q->bindValue(':token', $data->token());
            $q->bindValue(':eid', $data->entreprise_id(), PDO::PARAM_INT);
            $q->bindValue(':dur', $data->duree(), PDO::PARAM_INT);
            $q->bindValue(':abo', $data->abonnement());
            $q->bindValue(':trc', $data->transaction_content());
            $q->bindValue(':tot', $data->total());
            $q->execute();
        }

        public function getList(){
            $pp = [];
            $q = $this->_db->query('SELECT * FROM ENTREPRISE_PAYPAL_HISTORY');

            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                foreach($donnees as $key => $value){
                    if($key == "transaction_content"){
                        $tr = unserialize($value);
                    }
                }
                $donnees['transaction_content'] = $tr;

                $pp[] = new EntreprisePaypalHist($donnees);
            }
            return $pp;
        }

        public function count(){
            return $this->_db->query('SELECT COUNT(*) FROM ENTREPRISE_PAYPAL_HISTORY')->fetchColumn();
        }

        public function getListEntreprise(Entreprise $e){
            $pp = [];
            $q = $this->_db->query('SELECT * FROM ENTREPRISE_PAYPAL_HISTORY WHERE entreprise_id = '.$e->id());

            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                foreach($donnees as $key => $value){
                    if($key == "transaction_content"){
                        $tr = unserialize($value);
                    }
                }
                $donnees['transaction_content'] = $tr;

                $pp[] = new EntreprisePaypalHist($donnees);
            }
            return $pp;
        }

        public function get($info){
            $q = $this->_db->prepare('SELECT * FROM ENTREPRISE_PAYPAL_HISTORY WHERE token = :to');
            $q->execute([':to' => $info]);
            $donnees = $q->fetch(PDO::FETCH_ASSOC);

            foreach ($donnees as $key => $value){
                if($key == "transaction_content"){
                    $tr = unserialize($value);
                }
            }


            $donnees['transaction_content'] = $tr;

            return new EntreprisePaypalHist($donnees);
        }
    }