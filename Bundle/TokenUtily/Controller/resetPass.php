<?php
    $ent_manager = new EntrepriseManager($db);

    $valide_mail = false;
    $valide_toke = false;
    $valide_pass = false;

    if(isset($post['maj_pass'])){


        // EXP Vérification des informations autour de l'email;
        if(isset($post['email'])){
            if($ent_manager->exists($post['email'])){
                $entreprise = $ent_manager->get($post['email']);
                $valide_mail = true;
            }
            else{
                $pop_up_error = "L'email concerné n'existe pas dans notre base de donnée";
            }
        }
        else{
            $pop_up_error = "Problème d'email";
        }

        if($valide_mail == true){
            if(isset($post['token'])) {
                if($entreprise->token() ==  $post['token']){
                    $valide_toke = true;
                }
                else{
                    $pop_up_error = "Le token renseigné ne correspond pas a l'adresse email utilisé";
                }
            }
            else{
                $pop_up_error = "Problème de token";
            }
        }

        if(isset($post['password']) AND isset($post['pass_conf'])){
            if(StringToolBox::size($post['password'], 8, 18)){
                if($post['password'] == $post['pass_conf']){
                    $valide_pass = true;
                }
                else{
                    $pop_up_error = "Les mot de passes ne sont pas identiques";
                }
            }
            else{
                $pop_up_error = "Le mot de passe doit faire entre 8 et 18 caractères";
            }
        }
        else{
            // Si tout ne s'est pas bien passé on "réaffiche la page avec le formulaire"
            require("Bundle/TokenUtily/ResetPasswordFail.php");
        }

        if($valide_mail AND $valide_pass AND $valide_toke){

            # Mise à jour des informations
            $entreprise->setPassword(sha1($post['password']));
            $new_token = uniqid(rand(), true);
            $entreprise->setToken($new_token);

            # Persistance des mises à jour
            $ent_manager->update($entreprise);

            $pop_up_success = "Le mot de passe à bien été mis à jours";
            require('Bundle/InscriptionPro/index.php');
            // TODO Si tout s'est bien passé on redirige sur le formulaire de connexion
            // TODO Avec pour "$pop_up_success" -> Le mot de passe à bien été mis à jour
        }
        else{
            // Si tout ne s'est pas bien passé on "réaffiche la page avec le formulaire"
            require("Bundle/TokenUtily/ResetPasswordFail.php");
        }
    }
    else{

    }

?>