<?php
// AUTOLOAD
require('../Config/AutoloadScript.php');
// CONNEXION BDD
require('../Config/ConnexionBDD.php');
/**
 * Ce script doit être lancé tous les jours à minuit
 * Il doit vérifier que tous les produits ayant une date
 * de fin inégale à NULL soient supprimé le jour de leur échéance
 */

# EXP Préparation des variables et managers requis pour le script
$produit_manager    = new ProduitsManager($db);
// AMELIO Quand la charge commencera a augmenter,
// AMELIO Optimisation possible en chargeant seulement
// AMELIO Les date de fin != NULL en BDD
$produits_list      = $produit_manager->getList();
$current_date       = date("d/m/Y") . ' FR | ' . date("Y/m/d") . " US";
$produit_number     = count($produits_list);
$exclude = [
    '127.0.0.1',
    '::1'
];
$log                = "";
$separator          = "################################################################################\n";

// Création du HEADER du log
$log                .= $separator;
$log                .=  'DATE : ' . $current_date . " | NBR PRODUITS : " . $produit_number . "\n";
$log                .= $separator . "\n";

# EXP Parcours de la liste des produits
foreach($produits_list as $produit){
    $log            .= ">> Traitement du produit : " . $produit->appelation() . "\n";
    if($produit->duree_limite() != null){
        $log        .= "    Ce produit à une date d'échéance :";
        if(DateToolBox::when($produit->duree_limite()) == "PA"){

            $formats_list = $produit_manager->getFormats($produit);

            if(count($formats_list) > 0){
                $log .= " [ " . count($formats_list) . " Formats assoc ]";
                foreach($formats_list as $format){
                    $produit_manager->deleteFormat($format, $exclude);
                }
            }
            else{
                $log .= " [ Aucun format assoc ]";
            }

            $produit_manager->delete($produit);

            $log .= " -> Suppression (cause arrivé à échéance).\n";
        }
        elseif (DateToolBox::when($produit->duree_limite()) == "PR"){
            $log .= " -> Sera désactivé demain (cause arrivé à échéance).\n";
        }
        elseif (DateToolBox::when($produit->duree_limite()) == "FU"){
            $log .= " -> Aucune action à effectuer \n";
        }
        else{
            $log .= " /!\\ Une erreur à été détecté : DateToolBox::when() -> retour incorrect \n";
        }
    }
    else{
        $log .= "    Ce produit est permanent. \n";
    }
    $log .= "\n";
}

// EXP ON BALANCE TOUT DANS LE LOGGER (Fait un retour console au passage)
Logger::LogAction($log, "ProduitsDuréeLimite", true);

?>