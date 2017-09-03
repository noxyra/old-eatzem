<?php // WELCOME TO CONTROLLER
    if(isset($post['reset_pass'])){
        $ent_manager = new EntrepriseManager($db);
        // Vérification de l'existence de l'entreprise
        if($ent_manager->exists($post['email'])){
            $entreprise = $ent_manager->get($post['email']);

            if(Mailer::sendResetPasswd($entreprise)){
                $pop_up_success = "Un email vous a été envoyé afin de changer votre mot de passe";
            }
        }
        else{
            $pop_up_error = "L'entreprise demandé n'existe pas";
        }
    }
?>