<?php

    require('APP/External/phpqrcode/qrlib.php');

    $EnsManager = new EnseigneManager($db);
    $EntManager = new EntrepriseManager($db);

    if(isset($get['delete_id']) AND is_numeric($get['delete_id'])){
        $id = (int) $get['delete_id'];
        if($EnsManager->isMine($_SESSION['guest_entreprise'], $id)){
            $Ens = $EnsManager->get($id);
            $EntManager->deleteEnseigne($_SESSION['guest_entreprise'], $Ens);
        }
    }

    if(isset($get['active_id']) AND is_numeric($get['active_id'])){
        $id = (int) $get['active_id'];
        if($EnsManager->isMine($_SESSION['guest_entreprise'], $id)){
            $Ens = $EnsManager->get($id);
            $Ens->setOnline(1);
            $EnsManager->update($Ens);
        }
    }

    if(isset($get['desactive_id']) AND is_numeric($get['desactive_id'])){
        $id = (int) $get['desactive_id'];
        if($EnsManager->isMine($_SESSION['guest_entreprise'], $id)){
            $Ens = $EnsManager->get($id);
            $Ens->setOnline(0);
            $EnsManager->update($Ens);
        }
    }

    $EnsList = $EntManager->getEnseignes($_SESSION['guest_entreprise']);

?>