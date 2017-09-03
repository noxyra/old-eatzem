<?php

$EntManager = new EntrepriseManager($db);
$ModManager = new ModePaiementManager($db);

if(isset($get['delete_id']) AND is_numeric($get['delete_id'])){
    $id = (int) $get['delete_id'];
    if($ModManager->isMine($_SESSION['guest_entreprise'], $id)){
        $Mod = $ModManager->get($id);
        $EntManager->deleteModePaiement($_SESSION['guest_entreprise'], $Mod);
    }
}

$ModList = $EntManager->getModePaiement($_SESSION['guest_entreprise']);

?>