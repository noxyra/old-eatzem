<?php
    class ModePaiementEditor{

        public static function create(array $a, PDO $db){
            $EntManager = new EntrepriseManager($db);

            $add = new ModePaiement([]);

            if(isset($a['mode'])){
                if(strlen($a['mode']) <= 0){
                    return 'Veuillez saisir un mode de paiement';
                }
                $add->setMode($a['mode']);
                $EntManager->setModePaiement($_SESSION['guest_entreprise'], $add);
                return false;
            }
            else{
                return 'Le mode de paiement n\'est pas correct';
            }
        }

        public static function createAndAddEns(array $a, PDO $db, Enseigne $enseigne){
            $EntManager = new EntrepriseManager($db);
            $EnsManager = new EnseigneManager($db);

            $add = new ModePaiement([]);

            if(isset($a['mode'])){
                if(strlen($a['mode']) <= 0){
                    return 'Veuillez saisir un mode de paiement';
                }
                $add->setMode($a['mode']);
                $EntManager->setModePaiement($_SESSION['guest_entreprise'], $add);
                $EnsManager->setModePaiement($enseigne, $add->id());
                return false;
            }
            else{
                return 'Le mode de paiement n\'est pas correct';
            }
        }

        public static function update(ModePaiement $add, array $a, PDO $db){
            $EntManager = new EntrepriseManager($db);

            if(isset($a['mode'])){
                $add->setMode($a['mode']);

                $EntManager->updateModePaiement($_SESSION['guest_entreprise'], $add);
                return false;
            }
            else{
                return 'Le mode de paiement n\'est pas correct';
            }
        }
    }