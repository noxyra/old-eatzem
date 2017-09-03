<?php

    $EnsManager = new EnseigneManager($db);
    $prepare_enseigne = $EnsManager->getByUrl($get['enseigne']);
    $current_enseigne = $EnsManager->getWithDist($prepare_enseigne->id(), $_SESSION['localisationVisiteur']['lat'], $_SESSION['localisationVisiteur']['lon']);
    $AnnManager = new AnnoncesManager($db);
    $annonces = $AnnManager->getEnseigneList($current_enseigne);

    $horaires = $EnsManager->getHorairesListByDay($current_enseigne);
    $modePaiements = $EnsManager->getModePaiementList($current_enseigne);
    $types = $EnsManager->getTypeList($current_enseigne);

//    $EnsManager->hydrateDistEnseigne($current_enseigne, $_SESSION['localisationVisiteur']['lat'], $_SESSION['localisationVisiteur']['lon']);

    // CALCULS POUR GOOGLE MAP

    $center_lat = ($_SESSION['localisationVisiteur']['lat'] + $current_enseigne->lat()) / 2;
    $center_lon = ($_SESSION['localisationVisiteur']['lon'] + $current_enseigne->lon()) / 2;

?>