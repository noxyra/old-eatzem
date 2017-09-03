<?php

    class AbonnementCkecker{

        /* GESTION DES PLANS D'ABONNEMENT */
        const VALID_ABO = [
            'gratuit',
            'basique',
            'affaire',
            'ultime',
        ];

        const VALID_DUREE = [
            1,
            6,
            12,
        ];

        const FREE = [
            'name' => "Gratuit",
            'maxOnline' => 0,
            'maxOffline' => 1,
            'maxProds' => 50,
            'prixMois' => 0,
            'prixBeta' => 0,
        ];

        const BASIC = [
            'name' => "Basique",
            'maxOnline' => 1,
            'maxOffline' => 2,
            'maxProds' => 50,
            'prixMois' => 3,
            'prixBeta' => 0,
        ];

        const GOLD = [
            'name' => "Affaire",
            'maxOnline' => 3,
            'maxOffline' => 4,
            'maxProds' => 300,
            'prixMois' => 15,
            'prixBeta' => 10,
        ];

        const DIAM = [
            'name' => "Ultime",
            'maxOnline' => 10,
            'maxOffline' => 11,
            'maxProds' => 1000,
            'prixMois' => 30,
            'prixBeta' => 20,
        ];

        /* ENTREPRISE A TRAITER */

        private $_concernedEnt;

        private $_selectAbo;

        /* MANAGERS REQUIS */

        private $_entMan; // entreprise manager
        private $_prodMan; // produit manager

        /* METHODES */

        public function __construct($entreprise_id, PDO $db){
            $this->_entMan = new EntrepriseManager($db);
            $this->_prodMan = new ProduitsManager($db);
            $this->hydrate($entreprise_id);
        }

        public function refresh(){
            $this->hydrate($this->_concernedEnt->id());
        }

        public function hydrate($entreprise_id){
            if($this->_entMan->exists($entreprise_id)){
                $this->_concernedEnt = $this->_entMan->get($entreprise_id);

//                var_dump($this->_concernedEnt);

                if(($this->_concernedEnt->fin_abonnement() != null) and (!empty($this->_concernedEnt->fin_abonnement()))){
                    if((DateToolBox::when($this->_concernedEnt->fin_abonnement()) == "FU") OR (DateToolBox::when($this->_concernedEnt->fin_abonnement()) == "PR")){
                        if($this->_concernedEnt->abonnement() == 3){
                            $this->_selectAbo = $this::DIAM;
                        }
                        elseif($this->_concernedEnt->abonnement() == 2){
                            $this->_selectAbo = $this::GOLD;
                        }
                        elseif($this->_concernedEnt->abonnement() == 1){
                            $this->_selectAbo = $this::BASIC;
                        }
                        elseif($this->_concernedEnt->abonnement() == 0){
                            $this->_selectAbo = $this::FREE;
                        }
                    }
                    else{
                        $this->_selectAbo = $this::FREE;
                    }
                }
                else{
                    $this->_selectAbo = $this::FREE;
                }
            }
            else{
                return false;
            }
        }

        public function remiseCalculator($selectedAbo){

//            DebugToolBox::DUMP($selectedAbo);
//            DebugToolBox::DUMP($selectedAbo);

            if($selectedAbo != 0 and strtolower($selectedAbo) != "gratuit") {
                if ($selectedAbo == 'basique' or $selectedAbo == 1) {
                    $abo = self::BASIC;
                } elseif ($selectedAbo == 'affaire' or $selectedAbo == 2) {
                    $abo = self::GOLD;
                } elseif ($selectedAbo == 'ultime' or $selectedAbo == 3) {
                    $abo = self::DIAM;
                } else {
                    return false;
                }

                if($_SESSION['guest_entreprise']->beta() == 1){
                    $dayPrice = $abo['prixBeta'] / 31;
                }
                else{
                    $dayPrice = $abo['prixMois'] / 31;
                }


                $restDay = DateToolBox::tempsRestant($_SESSION['guest_entreprise']->fin_abonnement());
                $final = intval($dayPrice * $restDay);

//                DebugToolBox::DUMP($dayPrice);
//                DebugToolBox::DUMP($restDay);
//                DebugToolBox::DUMP($final);

                return $final;
            }
        }

        public function finalPrice(string $selectedAbo, $duree){

            /** PREPARATION */

            /**
             * SI LA DUREE EST EGALE À 12 MOIS ON FAIT PAYER DEUX MOIS DE MOINS
             * SI LA DUREE EST EGALE À 6 MOIS ON FAIT PAYER
             */
//            if($duree == 12){
//                $duree = $duree - 2;
//            }
//            elseif($duree == 6){
//                $duree = $duree - 1;
//            }


            /**
             * PREPARATION DE L'ABONNEMENT -> RECUPERATION DU TABLEAU ET DE SA VALEUR NUMERIQUE
             */
            $selectedAbo = strtolower($selectedAbo);
            $duree = (int) $duree;
            if($this->isValidAbo($selectedAbo) and ($selectedAbo != 'gratuit')){
                if($selectedAbo == 'basique'){
                    $abo = self::BASIC;
                    $aboVal = 1;
                }
                elseif ($selectedAbo == 'affaire'){
                    $abo = self::GOLD;
                    $aboVal = 2;
                }
                elseif ($selectedAbo == 'ultime'){
                    $abo = self::DIAM;
                    $aboVal = 3;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }

            /** CALCUL DES REMISES ET SORTIE DU PRIX FINAL */

            /*
             * TODO : Concevoir aussi un système pour les "downgrade d'abonnement"
             * TODO : Idée de principe de fonctionnement : On applique une remise, puis on désactive toute les enseignes du commerçant
             * TODO : (bien entendu, on le prévient a l'avance). Afin de repartir sur un abonnement tout neuf.
             * TODO : Avec ce fonctionnement il y a l'inconvéniant de l'indisponibilité des enseignes le temps de reselectionner celles qui seront de nouveau en ligne
             * TODO : L'avantage c'est que l'utilisateur peut pas exploiter un bug permettant d'avoir plus d'enseignes en payant moins
             */

            if($this->_concernedEnt->abonnement() != 0) {
                # Si l'abonnement est toujours en cours
                if (DateToolBox::when($this->_concernedEnt->fin_abonnement()) == "FU") {

                    # si l'abonnement selectionné est supérieur a l'abonnement actuel
                    if ($aboVal > $this->_concernedEnt->abonnement()) {

                        # On calcule une remise
//                        DebugToolBox::DUMP($this->_concernedEnt->abonnement());
                        $remise = $this->remiseCalculator(intval($this->_concernedEnt->abonnement()));
                    } # sinon si l'abonnement selectionné est égal a l'abonnement actuel
                    elseif ($aboVal == $this->_concernedEnt->abonnement()) {
                        # On applique pas de remise
                        $remise = 0;
                    } # sinon --> retourner faux | TODO VOIR PLUS HAUT
                    else {
                        return false;
                    }
                } # Si l'abonnement se finit aujourd'hui
                elseif (DateToolBox::when($this->_concernedEnt->fin_abonnement()) == "PR") {

                    # si l'abonnement selectionné est supérieur a l'abonnement actuel
                    if ($aboVal >= $this->_concernedEnt->abonnement()) {
                        # On applique pas de remise
                        $remise = 0;
                    } # sinon --> retourner faux | TODO VOIR PLUS HAUT
                    else {
                        return false;
                    }
                } # Sinon si l'abonnement est déjà expiré
                else {

                    # si l'abonnement selectionné est supérieur a l'abonnement actuel
                    if ($aboVal >= $this->_concernedEnt->abonnement()) {
                        # On applique pas de remises
                        $remise = 0;
                    } # sinon --> retourner faux | TODO VOIR PLUS HAUT
                    else {
                        return false;
                    }
                }
            }
            else{
                $remise = 0;
            }

            if($_SESSION['guest_entreprise']->beta() == 1){
                $final = ($abo['prixBeta'] * $duree) - $remise;
            }
            else{
                $final = ($abo['prixMois'] * $duree) - $remise;
            }

            $return = [
                'remise' => $remise,
                'finalPrice' => $final
            ];

            return $return;
        }

        //TODO Ajouter le système de prix final
        public function transactionCheckout(string $selectedAbo, $duree)
        {
            /** PREPARATION */

            /**
             * SI LA DUREE EST EGALE À 10 MOIS ON OFFRE 2 MOIS SUPPLEMENTAIRES
             * SI LA DUREE EST EGALE À 6 MOIS ON OFFRE 1 MOIS SUPPLEMENTAIRES
             */
            $duree = intval($duree);
//
//            if ($duree == 10) {
//                $duree += 2;
//            } elseif ($duree == 5) {
//                $duree += 1;
//            }

//            DebugToolBox::DUMP($duree);

            /**
             * PREPARATION DE L'ABONNEMENT -> RECUPERATION DU TABLEAU ET DE SA VALEUR NUMERIQUE
             */
            $selectedAbo = strtolower($selectedAbo);

            if ($this->isValidAbo($selectedAbo) and ($selectedAbo != 'gratuit')) {
                if ($selectedAbo == 'basique') {
                    $abo = self::BASIC;
                    $aboVal = 1;
                } elseif ($selectedAbo == 'affaire') {
                    $abo = self::GOLD;
                    $aboVal = 2;
                } elseif ($selectedAbo == 'ultime') {
                    $abo = self::DIAM;
                    $aboVal = 3;
                }
                else{
                    return false;
                }
            }

            /** CALCUL DES REMISES ET MISE A JOUR DE L'ABONNEMENT */

            /*
             * TODO : Concevoir aussi un système pour les "downgrade d'abonnement"
             * TODO : Idée de principe de fonctionnement : On applique une remise, puis on désactive toute les enseignes du commerçant
             * TODO : (bien entendu, on le prévient a l'avance). Afin de repartir sur un abonnement tout neuf.
             * TODO : Avec ce fonctionnement il y a l'inconvéniant de l'indisponibilité des enseignes le temps de reselectionner celles qui seront de nouveau en ligne
             * TODO : L'avantage c'est que l'utilisateur peut pas exploiter un bug permettant d'avoir plus d'enseignes en payant moins
             */


            if($this->_concernedEnt->abonnement() != 0) {
                # Si l'abonnement est toujours en cours
                if (DateToolBox::when($this->_concernedEnt->fin_abonnement()) == "FU") {
                    # si l'abonnement selectionné est supérieur a l'abonnement actuel
                    if ($aboVal > $this->_concernedEnt->abonnement()) {
                        # mise a jour de l'abonnement avec reset de la date
                        $this->updateAbo($duree, $aboVal, $reset = true);
                    } # sinon si l'abonnement selectionné est égal a l'abonnement actuel
                    elseif ($aboVal == $this->_concernedEnt->abonnement()) {
                        # mise a jour de l'abonnement sans reset de la date
                        $this->updateAbo($duree, $aboVal, $reset = false);
                    } # sinon --> retourner faux | TODO VOIR PLUS HAUT
                    else {
                        return false;
                    }
                } # Si l'abonnement se finit aujourd'hui
                elseif (DateToolBox::when($this->_concernedEnt->fin_abonnement()) == "PR") {

                    # si l'abonnement selectionné est supérieur a l'abonnement actuel
                    if ($aboVal >= $this->_concernedEnt->abonnement()) {
                        # mise a jour de l'abonnement avec reset de la date
                        $this->updateAbo($duree, $aboVal, $reset = false);
                    } # sinon --> retourner faux | TODO VOIR PLUS HAUT
                    else {
                        return false;
                    }
                } # Sinon si l'abonnement est déjà expiré
                else {

                    # si l'abonnement selectionné est supérieur a l'abonnement actuel
                    if ($aboVal >= $this->_concernedEnt->abonnement()) {
                        # mise à jour de l'abonnement sans reset de la date
                        $this->updateAbo($duree, $aboVal, $reset = true);
                    } # sinon --> retourner faux | TODO VOIR PLUS HAUT
                    else {
                        return false;
                    }
                }
            }
            else{
                $this->updateAbo($duree, $aboVal, $reset = true);
            }
        }

        public function updateAbo($month, $abo, $reset = false){
            $toUp = $this->_concernedEnt;

            /*
             * SI L'ABONNEMENT EST UN STRING ON LE CONVERTIS EN ABONNEMENT (INT)
             */
            if(!is_int($abo)){
                $abo = $this->forSQL($abo);
            }

            /* EN CAS DE REMISE ON RESET LA DATE DE FIN D'ABONNEMENT
             * A AUJOURD'HUI AVANT D'APPLIQUER LE TRAITEMENT
            */
            if($reset == true){
                $toUp->setFin_abonnement(date("Y-m-d"));
            }

            // DEBUT DU TRAITEMENT
            $toUp->setFin_abonnement(date('Y-m-d', strtotime('+'. $month . ' month', strtotime($toUp->fin_abonnement()))));
            $toUp->setEtat_abonnement(2);
            $toUp->setAbonnement($abo);

            $this->_entMan->update($toUp);

            // MISE A JOUR DES DIFFERENTES INSTANCES DE ENTREPRISE
            $_SESSION['guest_entreprise'] = $this->_entMan->get($toUp->id());
            $this->_concernedEnt = $this->_entMan->get($toUp->id());

            return true;
        }

        public function isValidAbo(string $abo){
            $abo = strtolower($abo);
            if(in_array($abo, self::VALID_ABO)){
                return true;
            }
            else{
                return false;
            }
        }

        public function forSQL($abo){
            if($this->isValidAbo(strtolower($abo))){
                foreach(self::VALID_ABO as $k => $v){
                    if($v == strtolower($abo)){
                        return (int) $k;
                    }
                }
            }
        }

        public function isValidDuree($duree){
            $duree = (int) $duree;
            if(in_array($duree, self::VALID_DUREE)){
                return true;
            }
            else{
                return false;
            }
        }
        
        public function maxEnseigneOn(){
            return $this->_selectAbo['maxOnline'];
        }

        public function maxEnseigneOff(){
            return $this->_selectAbo['maxOffline'];
        }

        public function maxProduits(){
            return $this->_selectAbo['maxProds'];
        }

        public function canHadOnEns(){
            if($this->_selectAbo['maxOnline'] > $this->_entMan->countOnlineEnseigne($this->_concernedEnt)){
                return true;
            }
            else{
                return false;
            }
        }

        public function canHadOffEns(){
            if($this->_selectAbo['maxOffline'] > $this->_entMan->countEnseignes($this->_concernedEnt)){
                return true;
            }
            else{
                return false;
            }
        }

        public function canHadProds(){
            if($this->_selectAbo['maxProds'] > $this->_entMan->countProduits($this->_concernedEnt)){
                return true;
            }
            else{
                return false;
            }
        }

        public function getAbonnement(){
            return $this->_selectAbo['name'];
        }
    }