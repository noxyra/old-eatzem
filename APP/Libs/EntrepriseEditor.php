<?php
    class EntrepriseEditor{
        public static function create(array $a, PDO $db){
            // MANAGERS

            $EntManager = new EntrepriseManager($db);

            // CREATION OBJET A UPLOAD

            $add = new Entreprise([]);

            // GESTION FORMULAIRE

                // GESTION EMAIL

            if(isset($a['email']) AND StringToolBox::size($a['email'], 2, 100)){
                $reconst = $a['email'];

                if(!$EntManager->exists($reconst)) {
                    $add->setEmail($reconst);
                }
                else{
                    return 'L\'adresse email renseigné est déjà utilisé';
                }
            }
            else{
                return 'L\'adresse email renseignée n\'est pas valide...';
            }

                // GESTION MOT DE PASSE

            if(isset($a['password']) AND StringToolBox::size($a['password'], 8, 100)){
                if(isset($a['password_c']) AND StringToolBox::size($a['password_c'], 8, 100)){
                    if($a['password_c'] == $a['password']){
                        $hash = sha1($a['password']);
                        $add->setPassword($hash);
                    }
                    else{
                        return 'Les mots de passes entrés ne sont pas identiques';
                    }
                }
                else{
                    return 'La confirmation de mot de passe est trop longue ou inexistante...';
                }
            }
            else{
                return 'Le mot de passe saisi est trop long ou inexistant...';
            }

                // GESTION RAISON SOCIALE (NOM)

            if(isset($a['nom']) AND StringToolBox::size($a['nom'], 3, 100)){
                $add->setNom($a['nom']);
            }
            else{
                return 'Le nom renseigné ne respecte pas le nombre de caractères requis';
            }


                // GESTION ADRESSE POSTALE
            
            if(isset($a['adresse']) AND StringToolBox::size($a['adresse'], 3, 100)){
                $add->setAdresse($a['adresse']);
            }
            else{
                return 'L\'adresse renseignée est trop courte ou trop longue...';
            }

                // GESTION COMPLEMENT ADRESSE

            if(isset($a['adresse_c'])){
                if(StringToolBox::size($a['adresse_c'],3, 100)){
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

            // GESTION TELEPHONE PRINCIPAL

            if(isset($a['telephone']) AND StringToolBox::size($a['telephone'], 10, 10)){
                $add->setTelephone($a['telephone']);
            }
            else{
                return 'Le numéro de téléphone renseigné n\'est pas valide';
            }

            if(isset($a['optin'])){
                $add->setOptin(1);
            }

            if(!isset($a['cgv'])){
                return 'Vous devez accepter les CGV avant de pouvoir vous inscrire';
            }
                // GESTION DES VALEURS PAR DEFAULT

            $add->setEtat_compte(0);
            $add->setAbonnement(0);
            $add->setEtat_abonnement(0);
            $add->setFin_abonnement(date('Y-m-d', strtotime('+3 month', time())));
            $token = uniqid(rand(), true);
            $add->setToken($token);

            // EXP On envoie un email
            Mailer::sendConfInscription($add);

            $EntManager->add($add);
            return false;

        }

        public static function update(array $a, PDO $db){
            // MANAGERS

            $EntManager = new EntrepriseManager($db);

            // CREATION OBJET A UPLOAD

            $add = $_SESSION['guest_entreprise'];

            // GESTION FORMULAIRE

            // GESTION EMAIL

            // GESTION RAISON SOCIALE (NOM)

            if(isset($a['nom']) AND StringToolBox::size($a['nom'], 3, 100)){
                $add->setNom($a['nom']);
            }
            else{
                return 'Le nom renseigné ne respecte pas le nombre de caractères requis';
            }

            // GESTION ADRESSE POSTALE

            if(isset($a['adresse']) AND StringToolBox::size($a['adresse'], 3, 100)){
                $add->setAdresse($a['adresse']);
            }
            else{
                return 'L\'adresse renseignée est trop courte ou trop longue...';
            }

            // GESTION COMPLEMENT ADRESSE

            if(isset($a['adresse_c'])){
                if(StringToolBox::size($a['adresse_c'],3, 100)){
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

            // GESTION TELEPHONE PRINCIPAL

            if(isset($a['telephone']) AND StringToolBox::size($a['telephone'], 10, 10)){
                $add->setTelephone($a['telephone']);
            }
            else{
                return 'Le numéro de téléphone renseigné n\'est pas valide';
            }

            // AJOUT SI TOUT EST OK

            $EntManager->update($add);

            return false;

        }

        public function updatePassword(){
            // TODO CODER ICI UPDATE PASSWORD
        }
    }