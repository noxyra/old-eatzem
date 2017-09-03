<?php // WELCOME TO CONTROLLER

$EnsManager = new EnseigneManager($db);
$checkid = (int) $get['id'];

if($EnsManager->isMine($_SESSION['guest_entreprise'], $checkid)){
    $toUp = $EnsManager->get($checkid); // Récupération de l'enseigne a modifier

    /**PREPARATION DES TYPES*/
    $typLinkedList = $EnsManager->getTypeList($toUp);
    $typArId = [];
    foreach ($typLinkedList as $value){
        $typArId[] = $value->id();
    }

    /**FIN PREPARATION TYPES*/

    $typManager = new TypeManager($db);
    $typList = $typManager->getList();

    if(isset($post['nom'])){
        if(EnseigneEditor::update($toUp, $post, $db)){
            $post['err_msg'] = EnseigneEditor::update($toUp, $post, $db);
        }
        else{
            $redir = "./?page=gestion_enseigne&suc_msg=Modifications effectuées avec succès";
            ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
            die('L\'enseigne ne vous appartient pas');
        }
    }
}
else{
    $redir = "./?page=gestion_enseigne&war_msg=L'enseigne ne vous appartient pas";
    ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
    die('L\'enseigne ne vous appartient pas');
}

?>