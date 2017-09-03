<?php

    class EnseigneEditor{

        public static function create(array $a, PDO $db){
            // MANAGER

            $EnsManager = new EnseigneManager($db);
            $linkManager = new EntrepriseEnseigneManager($db);
            $typEnsManager = new EnseigneTypeManager($db);

            // CREATION OBJET A UPLOAD

            $add = new Enseigne([]);

            // GESTION FORMULAIRE

                // GESTION NOM

            if(isset($a['nom']) AND StringToolBox::size($a['nom'], 3, 100)){
                $add->setNom($a['nom']);
            }
            else{
                return 'Le nom n\'est pas valide...';
            }

                // GESTION DESCRIPTION

            if(isset($a['description']) AND StringToolBox::size($a['description'], 0, 2500)){
                $add->setDescription($a['description']);
            }
            else{
                return 'La description n\'est pas valide';
            }

                // GESTION URL

            if(isset($a['url']) AND StringToolBox::size($a['url'], 8, 45)){
                if($EnsManager->urlExists($a['url'])){
                    return 'L\'url est déjà prise';
                }
                else{
                    $add->setUrl($a['url']);
                }
            }
            else{
                return 'L\'url n\'est pas valide';
            }

                // GESTION LIVRAISON

            if(isset($a['livraison']) AND is_numeric($a['livraison'])){
                $add->setLivraison($a['livraison']);
            }
            else{
                return 'Valeur de livraison invalide';
            }

                // GESTION RAYON LIVRAISON

            if(isset($a['rayon_livraison']) AND is_numeric($a['rayon_livraison'])){
                $add->setRayon_livraison($a['rayon_livraison']);
            }
//            else{
//                return 'Rayon de livraison manquant ou invalide';
//            }

                // GESTION SUR PLACE

            if(isset($a['sur_place']) AND is_numeric($a['sur_place'])){
                $add->setSur_place($a['sur_place']);
            }
            else{
                return 'Sur place invalide';
            }

                // GESTION ADRESSE

            if(isset($a['adresse']) AND StringToolBox::size($a['adresse'], 3, 100)){
                $add->setAdresse($a['adresse']);
            }
            else{
                return 'Adresse invalide';
            }

                // GESTION COMPLEMENT ADRESSE

            if(isset($a['adresse_c'])){
                if(StringToolBox::size($a['adresse_c'], 3, 100)){
                    $add->setComplement_adresse($a['adresse_c']);
                }
            }

                // GESTION CODE POSTAL

            if(isset($a['cp']) AND StringToolBox::size($a['cp'],5,5)){
                $add->setCp($a['cp']);
            }
            else{
                return 'Le code postal doit faire 5 chiffres';
            }

                // GESTION DE LA VILLE

            if(isset($a['ville'])){
                $add->setVille($a['ville']);
            }
            else{
                return 'Vous n\'avez pas renseigné de ville';
            }

                // GESTION DU TELEPHONE FIXE

            if((isset($a['telephone_fixe']) AND StringToolBox::size($a['telephone_fixe'], 10, 10)) OR (isset($a['telephone_portable']) AND StringToolBox::size($a['telephone_portable'], 10, 10))){
                if(StringToolBox::size($a['telephone_fixe'], 10, 10)){
                    $add->setTelephone_fixe($a['telephone_fixe']);
                }
                if(StringToolBox::size($a['telephone_portable'], 10, 10)){
                    $add->setTelephone_portable($a['telephone_portable']);
                }
            }
            else{
                return 'Aucun numéro de téléphone valide n\'a été renseigné';
            }

//            DebugToolBox::DUMP($add);

            $EnsManager->add($add);

            // GESTION DE LA LOCALISATION GEOCODE

            $addresse = $add->adresse() . ' ' . $add->ville() . ' ' . $add->cp();

            $array_localisation = GeocodingGoogle::geocode($addresse);

//            var_dump($array_localisation);

            $add->setLat($array_localisation['lat']);
            $add->setLon($array_localisation['lon']);

            $EnsManager->updateLocation($add);


            // MAINTENANT QUE L'ENSEIGNE EST AJOUTE ON AJOUTE L'IMAGE

            if(isset($_FILES) AND !empty($_FILES)){
                ImageTools::setEnseignePicture($add, $_FILES, $db);
            }

            // ON AJOUTE MAINTENANT LE(s) TYPE(s) D'ENSEIGNE(s)

            if(isset($a['1']) OR isset($a['2']) OR isset($a['3']) OR isset($a['4']) OR isset($a['5']) OR isset($a['6']) OR isset($a['7']) OR isset($a['8'])){
                $tab_up = [];

                if(isset($a['1'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 1
                    ]);
                }

                if(isset($a['2'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 2
                    ]);
                }

                if(isset($a['3'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 3
                    ]);
                }

                if(isset($a['4'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 4
                    ]);
                }

                if(isset($a['5'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 5
                    ]);
                }

                if(isset($a['6'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 6
                    ]);
                }

                if(isset($a['7'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 7
                    ]);
                }

                if(isset($a['8'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 8
                    ]);
                }

                foreach($tab_up as $t){
                    $typEnsManager->add($t);
                }

            }

            // GESTION DU LIEN ENTREPRISE

            $link = new EntrepriseEnseigne([
                'entreprise_id' => $_SESSION['guest_entreprise']->id(),
                'enseigne_id' => $add->id()
            ]);

            if($linkManager->exists($link) == false) {
                $linkManager->add($link);
            }

            return false;
            
        }

        public static function createAndGetSelected(array $a, PDO $db){
            // MANAGER

            $EnsManager = new EnseigneManager($db);
            $linkManager = new EntrepriseEnseigneManager($db);
            $typEnsManager = new EnseigneTypeManager($db);

            // CREATION OBJET A UPLOAD

            $add = new Enseigne([]);

            // GESTION FORMULAIRE

            // GESTION NOM

            if(isset($a['nom']) AND StringToolBox::size($a['nom'], 3, 100)){
                $add->setNom($a['nom']);
            }
            else{
                return 'Le nom n\'est pas valide...';
            }

            // GESTION DESCRIPTION

            if(isset($a['description']) AND StringToolBox::size($a['description'], 1, 2500)){
                $add->setDescription($a['description']);
            }
            else{
                return 'La description n\'est pas valide';
            }

            // GESTION URL

            if(isset($a['url']) AND StringToolBox::size($a['url'], 8, 45)){
                if($EnsManager->urlExists($a['url'])){
                    return 'L\'url est déjà prise';
                }
                else{
                    $add->setUrl($a['url']);
                }
            }
            else{
                return 'L\'url n\'est pas valide';
            }

            // GESTION LIVRAISON

            if(isset($a['livraison']) AND is_numeric($a['livraison'])){
                $add->setLivraison($a['livraison']);
            }
            else{
                return 'Valeur de livraison invalide';
            }

            // GESTION RAYON LIVRAISON

            if(isset($a['rayon_livraison']) AND is_numeric($a['rayon_livraison'])){
                $add->setRayon_livraison($a['rayon_livraison']);
            }
//            else{
//                return 'Rayon de livraison manquant ou invalide';
//            }

            // GESTION SUR PLACE

            if(isset($a['sur_place']) AND is_numeric($a['sur_place'])){
                $add->setSur_place($a['sur_place']);
            }
            else{
                return 'Sur place invalide';
            }

            // GESTION ADRESSE

            if(isset($a['adresse']) AND StringToolBox::size($a['adresse'], 3, 100)){
                $add->setAdresse($a['adresse']);
            }
            else{
                return 'Adresse invalide';
            }

            // GESTION COMPLEMENT ADRESSE

            if(isset($a['adresse_c'])){
                if(StringToolBox::size($a['adresse_c'], 3, 100)){
                    $add->setComplement_adresse($a['adresse_c']);
                }
            }

            // GESTION CODE POSTAL

            if(isset($a['cp']) AND StringToolBox::size($a['cp'],5,5)){
                $add->setCp($a['cp']);
            }
            else{
                return 'Le code postal doit faire 5 chiffres';
            }

            // GESTION DE LA VILLE

            if(isset($a['ville'])){
                $add->setVille($a['ville']);
            }
            else{
                return 'Vous n\'avez pas renseigné de ville';
            }

            // GESTION DES TELEPHONES

            if((isset($a['telephone_fixe']) AND StringToolBox::size($a['telephone_fixe'], 10, 10)) OR (isset($a['telephone_portable']) AND StringToolBox::size($a['telephone_portable'], 10, 10))){
                if(StringToolBox::size($a['telephone_fixe'], 10, 10)){
                    $add->setTelephone_fixe($a['telephone_fixe']);
                }
                if(StringToolBox::size($a['telephone_portable'], 10, 10)){
                    $add->setTelephone_portable($a['telephone_portable']);
                }
            }
            else{
                return 'Aucun numéro de téléphone valide n\'a été renseigné';
            }

//            DebugToolBox::DUMP($add);

            $EnsManager->add($add);

            $_SESSION['EnseigneEnCreation'] = $add;

            // GESTION DE LA LOCALISATION GEOCODE

            $addresse = $add->adresse() . ' ' . $add->ville() . ' ' . $add->cp();

            $array_localisation = GeocodingGoogle::geocode($addresse);

//            var_dump($array_localisation);

            $add->setLat($array_localisation['lat']);
            $add->setLon($array_localisation['lon']);

            $EnsManager->updateLocation($add);


            // MAINTENANT QUE L'ENSEIGNE EST AJOUTE ON AJOUTE L'IMAGE

            if(isset($_FILES) AND !empty($_FILES)){
                ImageTools::setEnseignePicture($add, $_FILES, $db);
            }

            // ON AJOUTE MAINTENANT LE(s) TYPE(s) D'ENSEIGNE(s)

            if(isset($a['1']) OR isset($a['2']) OR isset($a['3']) OR isset($a['4']) OR isset($a['5']) OR isset($a['6']) OR isset($a['7']) OR isset($a['8'])){
                $tab_up = [];

                if(isset($a['1'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 1
                    ]);
                }

                if(isset($a['2'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 2
                    ]);
                }

                if(isset($a['3'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 3
                    ]);
                }

                if(isset($a['4'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 4
                    ]);
                }

                if(isset($a['5'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 5
                    ]);
                }

                if(isset($a['6'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 6
                    ]);
                }

                if(isset($a['7'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 7
                    ]);
                }

                if(isset($a['8'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 8
                    ]);
                }

                foreach($tab_up as $t){
                    $typEnsManager->add($t);
                }

            }

            // GESTION DU LIEN ENTREPRISE

            $link = new EntrepriseEnseigne([
                'entreprise_id' => $_SESSION['guest_entreprise']->id(),
                'enseigne_id' => $add->id()
            ]);

            if($linkManager->exists($link) == false) {
                $linkManager->add($link);
            }

            return false;

        }

        public static function update(Enseigne $e, array $a, PDO $db){
            // MANAGER

            $EnsManager = new EnseigneManager($db);
            $linkManager = new EntrepriseEnseigneManager($db);
            $typEnsManager = new EnseigneTypeManager($db);

            // CREATION OBJET A UPLOAD

            $add = $e;

            // GESTION FORMULAIRE

            // GESTION NOM

            if(isset($a['nom']) AND StringToolBox::size($a['nom'], 3, 100)){
                $add->setNom($a['nom']);
            }

            // GESTION DESCRIPTION

            if(isset($a['description']) AND StringToolBox::size($a['description'], 0, 2500)){
                $add->setDescription($a['description']);
            }

            // GESTION URL

            if(isset($a['url']) AND StringToolBox::size($a['url'], 8, 45)){
                if(!$EnsManager->urlExists($a['url'])){
                    $add->setUrl($a['url']);
                }
            }

            // GESTION LIVRAISON

            if(isset($a['livraison']) AND is_numeric($a['livraison'])){
                $add->setLivraison($a['livraison']);
            }
            // GESTION RAYON LIVRAISON

            if(isset($a['rayon_livraison']) AND is_numeric($a['rayon_livraison'])){
                $add->setRayon_livraison($a['rayon_livraison']);
            }

            // GESTION SUR PLACE

            if(isset($a['sur_place']) AND is_numeric($a['sur_place'])){
                $add->setSur_place($a['sur_place']);
            }

            // GESTION ADRESSE

            if(isset($a['adresse']) AND StringToolBox::size($a['adresse'], 3, 100)){
                $add->setAdresse($a['adresse']);
            }
            // GESTION COMPLEMENT ADRESSE

            if(isset($a['adresse_c'])){
                if(StringToolBox::size($a['adresse_c'], 3, 100)){
                    $add->setComplement_adresse($a['adresse_c']);
                }
            }
            else{
                $add->setComplement_adresse('');
            }

            // GESTION CODE POSTAL

            if(isset($a['cp']) AND StringToolBox::size($a['cp'],5,5)){
                $add->setCp($a['cp']);
            }


            // GESTION DE LA VILLE

            if(isset($a['ville'])){
                $add->setVille($a['ville']);
            }

            if((isset($a['telephone_fixe']) AND StringToolBox::size($a['telephone_fixe'], 10, 10)) OR (isset($a['telephone_portable']) AND StringToolBox::size($a['telephone_portable'], 10, 10))){
                if(StringToolBox::size($a['telephone_fixe'], 10, 10)){
                    $add->setTelephone_fixe($a['telephone_fixe']);
                }
                if(StringToolBox::size($a['telephone_portable'], 10, 10)){
                    $add->setTelephone_portable($a['telephone_portable']);
                }
            }
            else{
                return 'Aucun numéro de téléphone valide n\'a été renseigné';
            }

//            var_dump($add);

            $EnsManager->update($add);

            // GESTION DE LA LOCALISATION GEOCODE

            $addresse = $add->adresse() . ' ' . $add->ville() . ' ' . $add->cp();

            $array_localisation = GeocodingGoogle::geocode($addresse);

//            var_dump($array_localisation);

            $add->setLat($array_localisation['lat']);
            $add->setLon($array_localisation['lon']);

            $EnsManager->updateLocation($add);

            // MAINTENANT QUE L'ENSEIGNE EST AJOUTE ON AJOUTE L'IMAGE

            if(isset($_FILES) AND !empty($_FILES)){
                ImageTools::setEnseignePicture($add, $_FILES, $db);
            }

            // ON AJOUTE MAINTENANT LE(s) TYPE(s) D'ENSEIGNE(s)

            if(isset($a['1']) OR isset($a['2']) OR isset($a['3']) OR isset($a['4']) OR isset($a['5']) OR isset($a['6']) OR isset($a['7']) OR isset($a['8'])){

                foreach ($EnsManager->getTypeList($add) as $value){
                    $EnsManager->deleteType($add, $value);
                }

                $tab_up = [];

                if(isset($a['1'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 1
                    ]);
                }

                if(isset($a['2'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 2
                    ]);
                }

                if(isset($a['3'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 3
                    ]);
                }

                if(isset($a['4'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 4
                    ]);
                }

                if(isset($a['5'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 5
                    ]);
                }

                if(isset($a['6'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 6
                    ]);
                }

                if(isset($a['7'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 7
                    ]);
                }

                if(isset($a['8'])){
                    $tab_up[] = new EnseigneType([
                        'enseigne_id' => $add->id(),
                        'type_id' => 8
                    ]);
                }

                foreach($tab_up as $t){
                    $typEnsManager->add($t);
                }

            }

            // GESTION DU LIEN ENTREPRISE

            $link = new EntrepriseEnseigne([
                'entreprise_id' => $_SESSION['guest_entreprise']->id(),
                'enseigne_id' => $add->id()
            ]);

            if($linkManager->exists($link) == false) {
                $linkManager->add($link);
            }

            return false;
        }
        
        public static function updateColor($ar, Enseigne $e, PDO $db){
            $EnsManager = new EnseigneManager($db);

            $light = $ar['light'];
            $dark = $ar['dark'];
            $elem1 = $ar['elem1'];
            $elem2 = $ar['elem2'];
            $cont = $ar['contraste'];

            $e->setLight($light);
            $e->setDark($dark);
            $e->setElem1($elem1);
            $e->setElem2($elem2);
            $e->setContrast($cont);

            $EnsManager->update($e);
        }
    }