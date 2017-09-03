<?php

$EntManager = new EntrepriseManager($db);
$HorManager = new HorairesManager($db);

if(isset($get['delete_id']) AND is_numeric($get['delete_id'])){
    $id = (int) $get['delete_id'];
    if($HorManager->isMine($_SESSION['guest_entreprise'], $id)){
        $Hor = $HorManager->get($id);
        $EntManager->deleteHoraires($_SESSION['guest_entreprise'], $Hor);
    }
}

$HorList = $EntManager->getHoraires($_SESSION['guest_entreprise']);

?>