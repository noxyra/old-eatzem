<?php

$EntManager = new EntrepriseManager($db);
$ProdManager = new ProduitsManager($db);
$FormManager = new FormatManager($db);
if($ProdManager->isMine($_SESSION['guest_entreprise'], $get['prod_id'])){

    if(isset($get['delete_id']) AND is_numeric($get['delete_id'])){
        $form_id = intval($get['delete_id']);
        $form = $FormManager->get($form_id);
        $ProdManager->deleteFormat($form);
    }

    $FormList = $ProdManager->getFormats($ProdManager->get($get['prod_id']));
}
else{
    $FormList = [];
}

?>