<?php // WELCOME TO CONTROLLER

    if(isset($post['password_c'])){
        if(EntrepriseEditor::create($post, $db)){
            $post['err_msg'] = EntrepriseEditor::create($post, $db);
        }
        else{
            $post['suc_msg'] = "Votre compte a bien été créé, un email vous a été envoyé, pour l'activez veuillez cliquer sur le lien d'activation contenu dans l'email";
        }
    }
?>