<?php
// AUTOLOAD
require('../Config/AutoloadScript.php');
// CONNEXION BDD
require('../Config/ConnexionBDD.php');
/**
 * Ce script doit être lancé tous les jours à minuit
 * Il doit vérifier que tous les formats ayant une date de fin de promotion
 * inégale à NULL soient remise à 0% le jour de leur échéance
 */

# EXP Préparation des variables et managers requis pour le script
$format_manager     = new FormatManager($db);
// AMELIO Quand la charge commencera a augmenter,
// AMELIO Optimisation possible en chargeant seulement
// AMELIO Les date de fin != NULL AND promotion != 0 en BDD
$formats_list      = $format_manager->getList();
$current_date       = date("d/m/Y") . ' FR | ' . date("Y/m/d") . " US";
$format_number     = count($formats_list);
$log                = "";
$separator          = "################################################################################\n";

// Création du HEADER du log
$log                .= $separator;
$log                .=  'DATE : ' . $current_date . " | NBR FORMATS : " . $format_number . "\n";
$log                .= $separator . "\n";

foreach($formats_list as $format){
    $log            .= ">> Traitement du format n°" . $format->id() . "\n";

    # EXP Si le format est actuellement en promotion
    if($format->fin_promotion() != null AND $format->promotion() != 0){

        $log .= "Ce format a une date d'échéance...\n";

        if(DateToolBox::when($format->fin_promotion()) == "PA"){

            # EXP La date est dépassé on remet à zéro sa promotion
            $format->setPromotion(0);
            $format_manager->update($format);

            $log .= "Elle est d'ailleurs dépassé, remise à zéro de sa \"promotion\"\n";
        }
        elseif(DateToolBox::when($format->fin_promotion()) == "PR"){

            # EXP La date est égale a la date d'aujourd'hui
            $log .= "Elle se termine ce soir, dernier jour avant remise à zéro\n";
        }
        elseif(DateToolBox::when($format->fin_promotion()) == "FU"){
            $log .= "Rien a signaler la promotion dure encore au moins deux jours.\n";
        }
        else{
            $log .= " /!\\ Une erreur à été détecté : DateToolBox::when() -> retour incorrect \n";
        }
    }
    else{
        $log .= "    Ce produit n'est pas en promotion. \n";
    }

    $log .= "\n";
}

// EXP ON BALANCE TOUT DANS LE LOGGER (Fait un retour console au passage)
Logger::LogAction($log, "FormatPromotions", true);

?>