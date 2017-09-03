<?php

$EntManager = new EntrepriseManager($db);
$ProdManager = new ProduitsManager($db);



if(isset($get['delete_id']) AND is_numeric($get['delete_id'])){
    $id = (int) $get['delete_id'];
    if($ProdManager->isMine($_SESSION['guest_entreprise'], $id)){
        $Prod = $ProdManager->get($id);
        $EntManager->deleteProduits($_SESSION['guest_entreprise'], $Prod);
    }
}

$ProList = $EntManager->getProduits($_SESSION['guest_entreprise']);
foreach ($ProList as $p){
    $p->hydrateFormats($db);
    $p->hydrateIngredients($db);
}
?>