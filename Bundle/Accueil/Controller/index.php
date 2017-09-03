<?php

    $EnsManager = new EnseigneManager($db);
    $AnnManager = new AnnoncesManager($db);
    $dataTab = $AnnManager->getUserList($_SESSION['localisationVisiteur']['lat'], $_SESSION['localisationVisiteur']['lon']);

    $ProxList = $EnsManager->getEnseignesByDist($_SESSION['localisationVisiteur']['lat'], $_SESSION['localisationVisiteur']['lon'], 5);

    // PREPARATION VARIABLE PAGE



?>