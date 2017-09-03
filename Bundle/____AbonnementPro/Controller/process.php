<?php

    if(!isset($get['token'])){
        die('Token manquant');
    }

    if($devmode == false){
        $paypal = new Paypal($ppname, $pppass, $ppsign, true);
    }
    else{
        $paypal = new Paypal();
    }

    $response = $paypal->request('GetExpressCheckoutDetails', array(
        'TOKEN' => $get['token']
    ));
    if($response){
        if($response['CHECKOUTSTATUS'] == 'PaymentActionCompleted'){
            die('Ce paiement a déjà été validé');
        }
        }else{
        var_dump($paypal->errors);
        die();
    }

    $params = array(
        'TOKEN' => $get['token'],
        'PAYERID'=> $get['PayerID'],
        'PAYMENTACTION' => 'Sale',

        'PAYMENTREQUEST_0_AMT' => $_SESSION['selectedTotal']['finalPrice'],
        'PAYMENTREQUEST_0_CURRENCYCODE' => 'EUR',

        "PAYMENTREQUEST_0_ITEMAMT" => $_SESSION['selectedTotal']['finalPrice'],

        'L_PAYMENTREQUEST_0_NAME0' => $_SESSION['selectedProduct'],
        'L_PAYMENTREQUEST_0_DESK0' => '',
        'L_PAYMENTREQUEST_0_AMT0' => $_SESSION['selectedTotal']['finalPrice'],
        'L_PAYMENTREQUEST_0_QTY0' => 1,
    );

//    DebugToolBox::DUMP($params);

    $response = $paypal->request('DoExpressCheckoutPayment',$params);
    if($response){
        if($response['ACK'] == "Success"){
//            DebugToolBox::DUMP($response);

            // SUCCES METTRE CONFIRMATION ICI + PROCESSUS INCREMENTATION ABONNEMENT




            /** SAUVEGARDE DE LA TRANSACTION DANS L'HISTORIQUE **/
            if($_SESSION['selectedDuree'] == 10){
                $_SESSION['selectedDuree'] += 2;
            }
            elseif($_SESSION['selectedDuree'] == 5){
                $_SESSION['selectedDuree'] += 1;
            }
            # Initialisation de l'objet assigné
            $historique = new EntreprisePaypalHist([
                'token' => $get['token'],
                'entreprise_id' => $_SESSION['guest_entreprise']->id(),
                'duree' => $_SESSION['selectedDuree'],
                'abonnement' => $_SESSION['selectedProduct'],
                'transaction_content' => serialize($response),
                'total' => serialize($_SESSION['selectedTotal'])
            ]);
            # Création de l'entré
            $histMan = new EntreprisePaypalHistManager($db);
            $histMan->add($historique);

                // MODIFICATION ABONNEMENT ENTREPRISE

            $aboCheck->transactionCheckout($_SESSION['selectedProduct'], $_SESSION['selectedDuree']);
            $success_abo = "Votre paiement a bien été pris en compte ! Vous bénéficiez maintenant d'un abonnement " . ucfirst($_SESSION['selectedProduct']) . " pour une durée de " . DateToolBox::tempsRestant($_SESSION['guest_entreprise']->fin_abonnement()) . " jours.";

            require('Bundle/AbonnementPro/index.php');
        }
        else{
            $error_abo = "Une erreur est survenue pendant le prélèvement final, veuillez prendre les dispositions nécéssaires.";
            require('Bundle/AbonnementPro/index.php');
        }
    }else{
//        DebugToolBox::DUMP($paypal->errors);
//        die('Une erreur est survenue');
        $error_hint = "Erreur de communication avec paypal, le paiement n'a pas pu être effectué";
        require('Bundle/AbonnementPro/error.php');
    }
?>