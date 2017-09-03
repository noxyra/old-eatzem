<?php
// AUTOLOAD
require('../Config/AutoloadScript.php');
// CONNEXION BDD
require('../Config/ConnexionBDD.php');
/**
 * Ce script doit être lancé tous les jours à minuit
 * Il doit vérifier que toutes les entreprises sont toujours abbonés, si ce n'est pas le cas :
 * - Récupérer l'entreprise et passer sa valeur "etat_abonnement" à 3 -> UPDATE
 * - Récupérer toutes ses enseignes et les passer hors ligne
 * - Envoyer un mail notifiant l'entreprise des modifications effectués
 *
 * Il doit aussi récupérer le nombre de jours restant d'abonnement a l'entreprise et envoyer
 * un email récapitulatif du temps restant au [14, 7, 3 et 1] jours restants
 */
$entreprise_manager = new EntrepriseManager($db);
$enseigne_manager = new EnseigneManager($db);
$entreprise_list = $entreprise_manager->getList();
$current_date       = date("d/m/Y") . ' FR | ' . date("Y/m/d") . " US";
$entreprise_number = count($entreprise_list);
$log = "";
$separator          = "################################################################################\n";
# parcours de toutes les entreprises contenues en base de données
#  Le script peut encore être amélioré en prenant seulement les comptes d'essais et les comptes abonnés en SQL
// Création du HEADER du log
$log .= $separator;
$log .= 'DATE : ' . $current_date . " | NBR ENTREPRISES : " . $entreprise_number . "\n";
$log .= $separator . "\n";
foreach($entreprise_list as $entreprise){
    $log .= ">> Traitement de l'entreprise : " . $entreprise->nom() . "\n";
    # EXP Dans le cas d'une entreprise actuellement abonné
    if($entreprise->etat_abonnement() == 2){
        # EXP Si l'abonnement est expiré
        if(DateToolBox::when($entreprise->fin_abonnement()) == 'PA'){
            # EXP On remet offline toute les enseignes de l'entreprise
            $enseignes_list = $entreprise_manager->getEnseignes($entreprise);

            if(count($enseignes_list) > 0){
                $log .= "    - Désactivation de ses enseignes : \n";
                foreach($enseignes_list as $enseigne){
                    $log .= "        > Enseigne " . $enseigne->nom() . " désactivé...\n";
                    $enseigne->setOnline(0);
                    $enseigne_manager->update($enseigne);
                }
                unset($enseignes_list);
            }
            # EXP Puis on remet a jout l'entreprise avec un abo expiré
            $entreprise->setEtat_abonnement(1);
            $entreprise_manager->update($entreprise);
            $log .= "L'entreprise : " . $entreprise->nom() . " à été désactivé...\n";
            Mailer::sendExpirationAbonnement($entreprise);
            $log .= "Email envoyé...\n";
        }
        # EXP Si l'abonnement se finit ce soir
        elseif(DateToolBox::when($entreprise->fin_abonnement()) == "PR"){
            $log .= "L'entreprise : " . $entreprise->nom() . " sera désactivé ce soir si pas de paiement ...\n";
            # EXP Dans ce cas précis on n'envoie pas d'emails, la flemme de faire un template
        }
        # EXP Si l'abonnement est encore en cours
        elseif(DateToolBox::when($entreprise->fin_abonnement()) == "FU"){
            if(DateToolBox::tempsRestant($entreprise->fin_abonnement()) == 15){
                $log .= "Finit dans 15 jours :) \n";
                Mailer::sendTimeBeforeExpiration($entreprise, 15);
                $log .= "Email envoyé...\n";
            }
            elseif(DateToolBox::tempsRestant($entreprise->fin_abonnement()) == 6){
                $log .= "Finit dans 6 jours :/ \n";
                Mailer::sendTimeBeforeExpiration($entreprise, 6);
                $log .= "Email envoyé...\n";
            }
            elseif(DateToolBox::tempsRestant($entreprise->fin_abonnement()) == 3){
                $log .= "Finit dans 3 jours :( \n";
                Mailer::sendTimeBeforeExpiration($entreprise, 3);
                $log .= "Email envoyé...\n";
            }
            else{
                $log .= "Rien à signaler ! :) \n";
            }
        }

        else{
            $log .= " /!\\ Une erreur à été détecté : DateToolBox::when() -> retour incorrect \n";
        }
    }
    elseif($entreprise->etat_abonnement() == 1){
        $log .= "Cette entreprise n'est plus abonné...\n";
    }
    elseif($entreprise->etat_abonnement() == 0){
        $log .= "Cette entreprise n'est pas abonné...\n";
    }
    else{
        $log .= "!>> Erreur <<! Cette entreprise comporte un \"abonnement\" non valide\n";
    }
}

Logger::LogAction($log, "EntrepriseAbonnement", true);

?>