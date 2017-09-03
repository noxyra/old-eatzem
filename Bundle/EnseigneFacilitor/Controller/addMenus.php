<?php
    /**
     * On prépare le menu -> nom / description / condition / prix
     * Puis on fait une selection dans un tableau avec tous les formats [fusionné par produit]
     * Comme pour les produits, on propose de continuer ou d'ajouter un nouveau
     **/
    $EntManager = new EntrepriseManager($db);
    $MenManager = new MenuManager($db);
    $FormEntList = $EntManager->getFormatList($_SESSION['guest_entreprise']);
    if(isset($post['add_menus_continue']) OR isset($post['add_menus_and_new'])){
        if(MenusEditor::createAndGetSelected($post, $db, $_SESSION['EnseigneEnCreation'])) {
            echo MenusEditor::createAndGetSelected($post, $db, $_SESSION['EnseigneEnCreation']);
        }
        $lastMenuAdded = $_SESSION['lastMenuAdded'];
        if($MenManager->isMine($_SESSION['guest_entreprise'], $lastMenuAdded->id())){
            foreach($post as $key => $value){
                if(is_numeric($key)){
                    $MenManager->setFormat($lastMenuAdded, intval($key));
                }
            }
        }
        if(isset($post['add_menus_continue'])){
            $redir = "./?page=enseigne_creator&selectAction=add_modePaiement&suc_msg=Le menu a bien été ajouté";
            ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
            die('Le menu a bien été ajouté');
        }
        elseif(isset($post['add_menus_and_new'])){
            $redir = "./?page=enseigne_creator&selectAction=add_menus&suc_msg=Le menu a bien été ajouté";
            ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
            die('Le menu a bien été ajouté');
        }
    }
    else{
        require("Bundle/EnseigneFacilitor/addMenus.php");
    }
?>