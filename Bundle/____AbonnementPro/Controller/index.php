<?php

    if(!isset($get['selected']) OR !$aboCheck->isValidAbo($get['selected']) OR !$aboCheck->isValidDuree($post['duree'])){

        if(isset($get['selected']) and !$aboCheck->isValidAbo($get['selected'])){
            $error_abo = "L'abonnement sélectionné n'est pas valide...";
        }

        if(isset($post['duree']) and !$aboCheck->isValidDuree($post['duree'])){
            $error_abo = "La durée de l'abonnement selectionné n'est pas valide...";
        }

        require('Bundle/AbonnementPro/index.php');
    }
    else{

        $duree = (int) $post['duree'];


        if($get['selected'] == 'basique'){
            $product = $aboCheck::BASIC;
        }
        elseif($get['selected'] == 'affaire'){
            $product = $aboCheck::GOLD;
        }
        elseif($get['selected'] == 'ultime'){
            $product = $aboCheck::DIAM;
        }

        /**
         *  ICI LA FONCTION FINAL PRICE SERT A VALIDER SI LE PAYEMENT PEUT SE FAIRE
         */
        if($aboCheck->finalPrice($product['name'], $duree)){

            # On instancie paypal
            if($devmode == false){
                $pp = new Paypal($ppname, $pppass, $ppsign, true);
            }
            else{
                $pp = new Paypal();
            }


            # On valide de prix final dans une variable
            $total = $aboCheck->finalPrice($product['name'], $duree);

            /** SAUVEGARDE DES INFORMATIONS */
            // TODO Trouver un moyen plus sécurisé de faire ça
            $_SESSION['selectedDuree'] = $duree;
            $_SESSION['selectedProduct'] = $product['name'];
            $_SESSION['selectedTotal'] = $total;
            /** FIN SAUVEGARDE */

            # On charge donc les paramètres dans le tableau pour paypal
            $params = array(
                'RETURNURL' => "http://". $_SERVER["HTTP_HOST"] ."/?page=paypal_process",
                'CANCELURL' => "http://". $_SERVER["HTTP_HOST"] ."/?page=paypal_cancel",

                'PAYMENTREQUEST_0_AMT' => $total['finalPrice'],
                'PAYMENTREQUEST_0_CURRENCYCODE' => 'EUR',

                "PAYMENTREQUEST_0_ITEMAMT" => $total['finalPrice'],

                'L_PAYMENTREQUEST_0_NAME0' =>$product['name'],
                'L_PAYMENTREQUEST_0_DESK0' => '',
                'L_PAYMENTREQUEST_0_AMT0' => $total['finalPrice'],
                'L_PAYMENTREQUEST_0_QTY0' => 1,
            );

            if($total['finalPrice'] == 0){
                require('Bundle/FreeTools/Controller/hydrateAboFree.php');
                die();
            }


            # Si la transaction peut se faire on renvoie le client sur la page de validation de paiement
            if($transac = $pp->request('SetExpressCheckout', $params)){
                if($devmode == false){
                    $paypal_url = 'https://www.paypal.com/webscr?cmd=_express-checkout&useraction=commit&token=' . $transac['TOKEN'];
                }
                else{
                    $paypal_url = 'https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&useraction=commit&token=' . $transac['TOKEN'];
                }

                // On peut utiliser dans la vue :
                // $product     -> tableau contenant les éléments
                // $total       -> tableau contenant la remise et le prix final
                // $duree       -> variable contenant la durée d'abonnement
                // $paypal_url  -> variable contenant le lien de paiement

                require('Bundle/AbonnementPro/validate.php');
            }

            else{
//                var_dump($pp->errors);
                $error_hint = "Erreur de communication avec Paypal ...";
                require('Bundle/AbonnementPro/error.php');
            }
        }
        else{
//            echo 'Erreur';
//            DebugToolBox::DUMP($product);
//            DebugToolBox::DUMP($post);
//            DebugToolBox::DUMP($get);
//            DebugToolBox::DUMP($aboCheck);
            $error_hint = "Des données invalides ont été introduites";
            require('Bundle/AbonnementPro/error.php');
        }
    }
?>