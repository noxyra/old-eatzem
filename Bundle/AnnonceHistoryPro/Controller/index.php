<?php
    $EnsManager = new EnseigneManager($db);
    $EntManager = new EntrepriseManager($db);
    $AnnManager = new AnnoncesManager($db);


    $listEnseigne = $EntManager->getEnseignes($_SESSION['guest_entreprise']);

    foreach($listEnseigne as $enseigne){
        $enseigne->hydrateAnnonces($db);
    }

    require('Bundle/AnnonceHistoryPro/index.php');