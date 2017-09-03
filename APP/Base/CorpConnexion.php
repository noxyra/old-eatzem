<?php
    /**
     * GESTION DE L'ETAT DE CONNEXION
     */
        // ASSIGNATION AUTOMATIQUE DE L'ETAT DE CONNEXION A "logout"
            if (isset($post['connexion']) OR isset($_COOKIE['autoco'])) {
                if (isset($post['connexion'])) {
                    // GESTION DE LA CONNEXION
                    if (isset($post['email']) AND StringToolBox::size($post['email'], 3, 100)) {
                        $mail = $post['email'];
                    } else {
                        $mail = false;
                        $pop_up_error = 'email invalide';
                    }
                    if (isset($post['password']) AND StringToolBox::size($post['password'], 8, 20)) {
                        $pass = $post['password'];
                    } else {
                        $pass = false;
                        $post['err_msg'] = 'mot de passe invalide';
                    }
                } elseif (isset($_COOKIE['autoco']) AND ($_COOKIE['autoco'] == true)) {
                    // GESTION DE LA CONNEXIONa
                    if (isset($_COOKIE['email']) AND isset($_COOKIE['password'])) {
                        $mail = htmlspecialchars($_COOKIE['email']);
                        $pass = htmlspecialchars($_COOKIE['password']);
                    } else {
                        $mail = false;
                        $pass = false;
                        $post['err_msg'] = 'cookie de connexion invalide.';
                    }
                } else {
                    $mail = false;
                    $pass = false;
                    $post['err_msg'] = 'identifiants de connexions manquants.';
                }

                if ($mail AND $pass) {
                    $entreprise_manager = new EntrepriseManager($db);

                    if ($entreprise_manager->exists($mail)) {
                        $hash_pass = sha1($pass);
                        $testing = $entreprise_manager->get($mail);
                        if($testing->etat_compte() == 1) {
                            if ($hash_pass == $testing->password()) {
                                $_SESSION['guest_entreprise'] = $testing;
                                $_SESSION['etat_entreprise'] = 'connect';
                            } else {
                                $post['err_msg'] = 'Le mot de passe est invalide.';
                            }
                        }
                        elseif ($testing->etat_compte() == 2){
                            $post['err_msg'] = "Le compte a été bloqué.";
                        }
                        else{
                            $post['err_msg'] = 'Le compte n\'est pas activé.';
                        }
                    } else {
                        $post['err_msg'] = 'Le compte demandé n\'existe pas.';
                    }
                }
            }
            else{
                if($_SESSION['etat_entreprise'] == 'connect'){
                    $_SESSION['etat_entreprise'] = 'connect';
                }
                else{
                    $_SESSION['etat_entreprise'] = 'logout';
                }
            }