<?php
    class Mailer{
        const sender = "robot@eatzem.fr";
        public static function sendExpirationAbonnement(Entreprise $entreprise){

            # EXP Setup du passage de lignes
            if((!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $entreprise->email()))){
                $lineBreak = "\r\n";
            }
            else{
                $lineBreak = "\n";
            }

            # EXP Préparation de l'objet du message
            $objet = "Eatzem : Votre abonnement est arrivé à expiration...";

            # Mail au format txt
            $message_txt = "Bonjour, "
                .$lineBreak.$lineBreak
                ." Il semblerait que votre abonnement pour l'entreprise "
                . $entreprise->nom()
                ." soit arrivé à expiration,"
                .$lineBreak
                ." vos enseignes en lignes ont par conséquent été désactivé ..."
                .$lineBreak
                ." Merci de palier à ce soucis si vous souhaitez revoir vos enseignes en ligne."
                .$lineBreak.$lineBreak
                ."Bonne journée ! :)";
            # Mail au format html
            $message_html = "<h1>Bonjour, </h1>"
                ."<p>Il semblerait que votre abonnement pour l'entreprise "
                . $entreprise->nom()
                ." soit arrivé à expiration,"
                . "<br />"
                ." vos enseignes en lignes ont par conséquent été désactivé ..."
                . "<br />"
                ." Merci de palier à ce soucis si vous souhaitez revoir vos enseignes en ligne.</p>"
                ."<h2>Bonne journée ! :)</h2>";

            # EXP Préparation du header et des éléments obligatoires
            $boundary = "-----=".md5(rand());

            $header  = "From: \"Eatzem\"<".self::sender.">".$lineBreak;
            $header .= "Reply-to: \"Noxyra\"<contact@noxyra.fr>".$lineBreak;
            $header .= "MIME-Version: 1.0".$lineBreak;
            $header .= "Content-Type: multipart/alternative;".$lineBreak." boundary=\"$boundary\"".$lineBreak;

            # EXP Formatage du message pour le mode texte
            $message  = $lineBreak."--".$boundary.$lineBreak;
            $message .= "Content-Type: text/plain; charset=\"utf-8\"".$lineBreak;
            $message .= "Content-Transfer-Encoding: 8bit".$lineBreak;
            $message .= $lineBreak.$message_txt.$lineBreak;

            # EXP séparateur txt / html
            $message .= $lineBreak."--".$boundary.$lineBreak;

            # EXP Formatage du message pour le mode html
            $message .= "Content-Type: text/html; charset=\"utf-8\"".$lineBreak;
            $message .= "Content-Transfer-Encoding: 8bit".$lineBreak;
            $message .= $lineBreak.$message_html.$lineBreak;

            # EXP Ajout des Boudary finaux
            $message .= $lineBreak."--".$boundary."--".$lineBreak;
            $message .= $lineBreak."--".$boundary."--".$lineBreak;

            if(mail($entreprise->email(),$objet,$message,$header)){
                return true;
            }else{
                return false;
            }
        }

        public static function sendTimeBeforeExpiration(Entreprise $entreprise, int $time){

            # EXP Setup du passage de lignes
            if((!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $entreprise->email()))){
                $lineBreak = "\r\n";
            }
            else{
                $lineBreak = "\n";
            }

            # EXP Préparation de l'objet du message
            $objet = "Eatzem : Votre abonnement est arrivé à expiration...";

            # Mail au format txt
            $message_txt = "Bonjour, "
                .$lineBreak.$lineBreak
                ." Il semblerait que votre abonnement pour l'entreprise "
                . $entreprise->nom()
                ." arrive à expiration dans " . DateToolBox::tempsRestant($entreprise->fin_abonnement()) . " jours."
                .$lineBreak
                ." vos enseignes en lignes seront par conséquent été désactivé si vous ne renouvellez pas votre abonnement dans les temps"
                .$lineBreak
                ." Merci de palier à ce soucis si vous ne souhaitez pas voir vos enseignes hors ligne."
                .$lineBreak.$lineBreak
                ."Bonne journée ! :)";
            # Mail au format html
            $message_html = "<h1>Bonjour, </h1>"
                ."<p>Il semblerait que votre abonnement pour l'entreprise "
                . $entreprise->nom()
                ." arrive à expiration dans " . DateToolBox::tempsRestant($entreprise->fin_abonnement()) . " jours."
                . "<br />"
                ." vos enseignes en lignes seront par conséquent été désactivé si vous ne renouvellez pas votre abonnement dans les temps"
                . "<br />"
                ." Merci de palier à ce soucis si vous ne souhaitez pas voir vos enseignes hors ligne.</p>"
                ."<h2>Bonne journée ! :)</h2>";

            # EXP Préparation du header et des éléments obligatoires
            $boundary = "-----=".md5(rand());

            $header  = "From: \"Eatzem\"<".self::sender.">".$lineBreak;
            $header .= "Reply-to: \"Noxyra\"<contact@noxyra.fr>".$lineBreak;
            $header .= "MIME-Version: 1.0".$lineBreak;
            $header .= "Content-Type: multipart/alternative;".$lineBreak." boundary=\"$boundary\"".$lineBreak;

            # EXP Formatage du message pour le mode texte
            $message  = $lineBreak."--".$boundary.$lineBreak;
            $message .= "Content-Type: text/plain; charset=\"utf-8\"".$lineBreak;
            $message .= "Content-Transfer-Encoding: 8bit".$lineBreak;
            $message .= $lineBreak.$message_txt.$lineBreak;

            # EXP séparateur txt / html
            $message .= $lineBreak."--".$boundary.$lineBreak;

            # EXP Formatage du message pour le mode html
            $message .= "Content-Type: text/html; charset=\"utf-8\"".$lineBreak;
            $message .= "Content-Transfer-Encoding: 8bit".$lineBreak;
            $message .= $lineBreak.$message_html.$lineBreak;

            # EXP Ajout des Boudary finaux
            $message .= $lineBreak."--".$boundary."--".$lineBreak;
            $message .= $lineBreak."--".$boundary."--".$lineBreak;

            if(mail($entreprise->email(),$objet,$message,$header)){
                return true;
            }else{
                return false;
            }
        }

        public static function sendWelcomeMessage(Entreprise $entreprise){

            # EXP Setup du passage de lignes
            if((!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $entreprise->email()))){
                $lineBreak = "\r\n";
            }
            else{
                $lineBreak = "\n";
            }

            # EXP Préparation de l'objet du message
            $objet = "Eatzem : Compte bien activé";

            # Mail au format txt
            $message_txt = "Bonjour et bienvenue sur Eatzem !"
                . $lineBreak
                . "Votre compte à bien été activé,"
                . $lineBreak
                . "Bonne continuation";
            # Mail au format html
            $message_html = "<p>Bonjour et bienvenue sur Eatzem !<br />"
                . "Votre compte à bien été activé,<br />"
                . "Bonne continuation </p>";

            # EXP Préparation du header et des éléments obligatoires
            $boundary = "-----=".md5(rand());

            $header  = "From: \"Eatzem\"<".self::sender.">".$lineBreak;
            $header .= "Reply-to: \"Noxyra\"<contact@noxyra.fr>".$lineBreak;
            $header .= "MIME-Version: 1.0".$lineBreak;
            $header .= "Content-Type: multipart/alternative;".$lineBreak." boundary=\"$boundary\"".$lineBreak;

            # EXP Formatage du message pour le mode texte
            $message  = $lineBreak."--".$boundary.$lineBreak;
            $message .= "Content-Type: text/plain; charset=\"utf-8\"".$lineBreak;
            $message .= "Content-Transfer-Encoding: 8bit".$lineBreak;
            $message .= $lineBreak.$message_txt.$lineBreak;

            # EXP séparateur txt / html
            $message .= $lineBreak."--".$boundary.$lineBreak;

            # EXP Formatage du message pour le mode html
            $message .= "Content-Type: text/html; charset=\"utf-8\"".$lineBreak;
            $message .= "Content-Transfer-Encoding: 8bit".$lineBreak;
            $message .= $lineBreak.$message_html.$lineBreak;

            # EXP Ajout des Boudary finaux
            $message .= $lineBreak."--".$boundary."--".$lineBreak;
            $message .= $lineBreak."--".$boundary."--".$lineBreak;

            if(mail($entreprise->email(),$objet,$message,$header)){
                return true;
            }else{
                return false;
            }
        }

        public static function sendConfInscription(Entreprise $entreprise){

            # EXP Setup du passage de lignes
            if((!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $entreprise->email()))){
                $lineBreak = "\r\n";
            }
            else{
                $lineBreak = "\n";
            }

            # EXP Préparation de l'objet du message
            $objet = "Eatzem : Activation de votre compte";

            # Mail au format txt
            $message_txt = "Félicitation ! Vous êtes maintenant inscrit sur Eatzem,"
                . $lineBreak
                . "Si vous n'êtes pas à l'origine de cette inscription, pas de panique ! La demande sera supprimée sous 48h. Sinon, veuillez cliquer sur le lien suivant pour activer votre compte : <a href='https://eatzem.fr/?use_token=" . $entreprise->token() . "&email=" . $entreprise->email() . "&selectAction=valideAccount'>Cliquez ici</a>"
                . $lineBreak
                . "Bonne continuation et à bientôt sur Eatzem !"; // TODO CREER LE LIEN AVEC LE TOKEN DES QUE LA REECRITURE D'URL SERA OK
            # Mail au format html
            $message_html = "<h1>Félicitation ! Vous êtes maintenant inscrit sur Eatzem,</h1>"
                . $lineBreak
                . "<p>Si vous n'êtes pas à l'origine de cette inscription, pas de panique ! La demande sera supprimée sous 48h. Sinon, veuillez cliquer sur le lien suivant pour activer votre compte : <a href='https://eatzem.fr/?use_token=" . $entreprise->token() . "&email=" . $entreprise->email() . "&selectAction=valideAccount'>Cliquez ici</a>"
                . $lineBreak
                . "Bonne continuation et à bientôt sur Eatzem !"; // TODO CREER LE LIEN AVEC LE TOKEN DES QUE LA REECRITURE D'URL SERA OK


            # EXP Préparation du header et des éléments obligatoires
            $boundary = "-----=".md5(rand());

            $header  = "From: \"Eatzem\"<".self::sender.">".$lineBreak;
            $header .= "Reply-to: \"Noxyra\"<contact@noxyra.fr>".$lineBreak;
            $header .= "MIME-Version: 1.0".$lineBreak;
            $header .= "Content-Type: multipart/alternative;".$lineBreak." boundary=\"$boundary\"".$lineBreak;

            # EXP Formatage du message pour le mode texte
            $message  = $lineBreak."--".$boundary.$lineBreak;
            $message .= "Content-Type: text/plain; charset=\"utf-8\"".$lineBreak;
            $message .= "Content-Transfer-Encoding: 8bit".$lineBreak;
            $message .= $lineBreak.$message_txt.$lineBreak;

            # EXP séparateur txt / html
            $message .= $lineBreak."--".$boundary.$lineBreak;

            # EXP Formatage du message pour le mode html
            $message .= "Content-Type: text/html; charset=\"utf-8\"".$lineBreak;
            $message .= "Content-Transfer-Encoding: 8bit".$lineBreak;
            $message .= $lineBreak.$message_html.$lineBreak;

            # EXP Ajout des Boudary finaux
            $message .= $lineBreak."--".$boundary."--".$lineBreak;
            $message .= $lineBreak."--".$boundary."--".$lineBreak;

            if(mail($entreprise->email(),$objet,$message,$header)){
                return true;
                var_dump($_SESSION);
            }else{
                return false;
                var_dump($_SERVER);
            }
        }

        public static function sendResetPasswd(Entreprise $entreprise){

            # EXP Setup du passage de lignes
            if((!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $entreprise->email()))){
                $lineBreak = "\r\n";
            }
            else{
                $lineBreak = "\n";
            }

            # EXP Préparation de l'objet du message
            $objet = "Eatzem : Mot de passe oublié ?";

            # Mail au format txt
            // TODO Coder un système refraichissant les token rendu "public" apres 24h
            $message_txt = "Une demande de changement de mot de passe a été demandé pour votre compte."
                . $lineBreak
                . "Si cette demande n'est pas de votre initiative pas de panique ! Supprimez ce mail, le lien ne sera plus valide d'ici minuit."
                . $lineBreak
                . "Sinon veuillez cliquer sur le lien suivant pour changer votre mot de passe : <a href=\"https://eatzem.fr/?use_token=" . $entreprise->token() . "&email=" . $entreprise->email() . "&selectAction=resetPass\">Cliquez ici</a>" // TODO CREER LE LIEN AVEC LE TOKEN DES QUE LA REECRITURE D'URL SERA OK
                . $lineBreak
                . "Bonne continuation";
            # Mail au format html
            $message_html = "<h1>Une demande de changement de mot de passe a été demandé pour votre compte.</h1>"
                . $lineBreak
                . "<p>Si cette demande n'est pas de votre initiative pas de panique ! Supprimez ce mail, le lien ne sera plus valide d'ici minuit."
                . $lineBreak
                . "Sinon veuillez cliquer sur le lien suivant pour changer votre mot de passe : <a href=\"https://eatzem.fr/?use_token=" . $entreprise->token() . "&email=" . $entreprise->email() . "&selectAction=resetPass\">Cliquez ici</a></p>" // TODO CREER LE LIEN AVEC LE TOKEN DES QUE LA REECRITURE D'URL SERA OK
                . $lineBreak
                . "<p>Bonne continuation</p>";

            # EXP Préparation du header et des éléments obligatoires
            $boundary = "-----=".md5(rand());

            $header  = "From: \"Eatzem\"<".self::sender.">".$lineBreak;
            $header .= "Reply-to: \"Noxyra\"<contact@noxyra.fr>".$lineBreak;
            $header .= "MIME-Version: 1.0".$lineBreak;
            $header .= "Content-Type: multipart/alternative;".$lineBreak." boundary=\"$boundary\"".$lineBreak;

            # EXP Formatage du message pour le mode texte
            $message  = $lineBreak."--".$boundary.$lineBreak;
            $message .= "Content-Type: text/plain; charset=\"utf-8\"".$lineBreak;
            $message .= "Content-Transfer-Encoding: 8bit".$lineBreak;
            $message .= $lineBreak.$message_txt.$lineBreak;

            # EXP séparateur txt / html
            $message .= $lineBreak."--".$boundary.$lineBreak;

            # EXP Formatage du message pour le mode html
            $message .= "Content-Type: text/html; charset=\"utf-8\"".$lineBreak;
            $message .= "Content-Transfer-Encoding: 8bit".$lineBreak;
            $message .= $lineBreak.$message_html.$lineBreak;

            # EXP Ajout des Boudary finaux
            $message .= $lineBreak."--".$boundary."--".$lineBreak;
            $message .= $lineBreak."--".$boundary."--".$lineBreak;

            if(mail($entreprise->email(),$objet,$message,$header)){
                return true;
            }else{
                return false;
            }
        }
    }