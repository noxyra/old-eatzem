<?php

    $paieManager = new EntreprisePaypalHistManager($db);

    $paie = $paieManager->getListEntreprise($_SESSION['guest_entreprise']);

    require('Bundle/FactureHistoryPro/index.php');

?>