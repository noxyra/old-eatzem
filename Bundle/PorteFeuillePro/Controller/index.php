<?php

    if(isset($post['selected'])){
        $coins = (int) $post['selected'];
        $productName = "Crédits x" . $coins;

        /**
         *  ICI LA FONCTION FINAL PRICE SERT A VALIDER SI LE PAYEMENT PEUT SE FAIRE
         */
        if(is_int($coins) AND $coins >= 2){

            # On instancie paypal
            if($devmode == false){
                $pp = new Paypal($ppname, $pppass, $ppsign, true);
            }
            else{
                $pp = new Paypal();
            }

            # On valide de prix final dans une variable

            /** SAUVEGARDE DES INFORMATIONS */
            // TODO Trouver un moyen plus sécurisé de faire ça
            // $_SESSION['selectedDuree'] = $duree;
            $_SESSION['selectedProduct'] = $productName;
            $_SESSION['selectedTotal'] = $coins;
            /** FIN SAUVEGARDE */

            # On charge donc les paramètres dans le tableau pour paypal
            $params = array(
                'RETURNURL' => "http://". $_SERVER["HTTP_HOST"] ."/?page=portefeuille_process",
                'CANCELURL' => "http://". $_SERVER["HTTP_HOST"] ."/?page=portefeuille_cancel",

                'PAYMENTREQUEST_0_AMT' => $coins,
                'PAYMENTREQUEST_0_CURRENCYCODE' => 'EUR',

                "PAYMENTREQUEST_0_ITEMAMT" => $coins,

                'L_PAYMENTREQUEST_0_NAME0' => $productName,
                'L_PAYMENTREQUEST_0_DESK0' => '',
                'L_PAYMENTREQUEST_0_AMT0' => $coins,
                'L_PAYMENTREQUEST_0_QTY0' => 1,
            );


            # Si la transaction peut se faire on renvoie le client sur la page de validation de paiement
            if($transac = $pp->request('SetExpressCheckout', $params)){
                if($devmode == false){
                    $paypal_url = 'https://www.paypal.com/webscr?cmd=_express-checkout&useraction=commit&token=' . $transac['TOKEN'];
                }
                else{
                    $paypal_url = 'https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&useraction=commit&token=' . $transac['TOKEN'];
                }
                require('Bundle/PorteFeuillePro/validate.php');
            }

            else{
                $error_hint = "Erreur de communication avec Paypal ...";
                require('Bundle/PorteFeuillePro/error.php');
            }
        }
        else{
            $error_hint = "Le nombre de crédits demandé ne peut pas être acheté";
            require('Bundle/PorteFeuillePro/error.php');
        }
    }
    else{
        require('Bundle/PorteFeuillePro/index.php');
    }
?>