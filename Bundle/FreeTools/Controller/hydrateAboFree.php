<?php
    $entrepriseManager = new EntrepriseManager($db);

    // EXP Sécurité, on ne teste pas directement sur la session
    $toTest = $entrepriseManager->get($_SESSION['guest_entreprise']->id());

    if($toTest->beta() == 1){
        if(isset($get['selected']) AND $get['selected'] == 'basique'){

            $product = $get['selected'];

            if(isset($post['duree'])){
                $duree = (int) $post['duree'];
                if($duree == 1){
                    $aboCheck->transactionCheckout($product, $duree);
                }
                elseif($duree == 6){
                    $aboCheck->transactionCheckout($product, $duree);
                }
                elseif($duree == 12){
                    $aboCheck->transactionCheckout($product, $duree);
                }
                else{
                    $error_hint = "La durée sélectionné et invalide";
                    require('Bundle/AbonnementPro/error.php');
                }

                $success_abo = "Votre paiement a bien été pris en compte ! Vous bénéficiez maintenant d'un abonnement " . ucfirst($product) . " pour une durée de " . DateToolBox::tempsRestant($_SESSION['guest_entreprise']->fin_abonnement()) . " jours.";
                require('Bundle/AbonnementPro/index.php');
            }
            else{
                $error_hint = "Aucune durée sélectionnée";
                require('Bundle/AbonnementPro/error.php');
            }
        }
        else{
            $error_hint = "L'abonnement sélectionné est invalide";
            require('Bundle/AbonnementPro/error.php');
        }
    }
    else{
        $error_hint = "Vous n'êtes pas un bêta testeur ...";
        require('Bundle/AbonnementPro/error.php');
    }