<?php
    $ent_manager = new EntrepriseManager($db);
    $token = false;

# EXP Etape 1 : Récupération de l'entreprise concerné
    if(isset($get['email']) AND !empty($get['email'])){
        if($ent_manager->exists($get['email'])){
            // On peut récupérer l'email
            $entreprise = $ent_manager->get($get['email']);
        }
        else{
            // Si l'email n'existe pas déjà
            die();
        }
    }
    else{
        // Si il n'y a pas d'email renseigné
        die();
    }

# EXP Etape 2 : Vérification du token
    if(isset($get['use_token']) AND !empty($get['use_token'])){
//        echo $entreprise->token();
        if($get['use_token'] == $entreprise->token()){
            $token = true;
        }
    }

# EXP Etape 3 : Choix de l'action
    if(isset($get['selectAction']) AND !empty($get['selectAction']) AND $token == true){
        if($get['selectAction'] == "resetPass"){

            # Affichage de la vue
            require("Bundle/TokenUtily/ResetPassword.php");

            // EXP Ne pas régénérer le token ici, mais a la validation du formulaire
        }
        elseif($get['selectAction'] == "valideAccount"){
            // Valider le compte + Afficher confirmation
            # Activation du compte
            $entreprise->setEtat_compte(1);
            # Régénération du tokan
            $new_token = uniqid(rand(), true);
            $entreprise->setToken($new_token);
            # Mise à jour
            $ent_manager->update($entreprise);

            # Envoi du mail de confirmation
            Mailer::sendWelcomeMessage($entreprise);

            # Affichage de la vue
            require("Bundle/TokenUtily/SuccesCreateAccount.php");
        }
    }
?>