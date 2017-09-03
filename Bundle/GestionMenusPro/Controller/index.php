<?php

$EntManager = new EntrepriseManager($db);
$MenManager = new MenuManager($db);

if(isset($get['delete_id']) AND is_numeric($get['delete_id'])){
    $id = (int) $get['delete_id'];
    if($MenManager->isMine($_SESSION['guest_entreprise'], $id)){
        $men = $MenManager->get($id);
        $EntManager->deleteMenu($_SESSION['guest_entreprise'], $men);
    }
}

$MenList = $EntManager->getMenus($_SESSION['guest_entreprise']);

?>