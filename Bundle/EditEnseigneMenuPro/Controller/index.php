<?php

    $ens_id = (int) $get['id'];

    $EntManager = new EntrepriseManager($db);
    $MenManager = new MenuManager($db);
    $MenEntList = $EntManager->getMenus($_SESSION['guest_entreprise']);

    $EnsManager = new EnseigneManager($db);
    $Lk_Ens = $EnsManager->get($ens_id);

    $MenEnsList = $EnsManager->getListMenu($Lk_Ens);



    /*
     * RESET ET AJOUT DES NOUVEAUX MENUS
     */
    if($EnsManager->isMine($_SESSION['guest_entreprise'], $ens_id)){
        if(isset($post['maj_menu_enseigne'])) {
            // Suppression des anciens horaires
            foreach ($MenEnsList as $value) {
                $EnsManager->deleteMenu($Lk_Ens, $value);
            }
            // Création des nouveaux horaires
            foreach ($post as $key => $value) {
                if (is_numeric($key)) {
                    if($MenManager->isMine($_SESSION['guest_entreprise'], intval($key))){
                        $EnsManager->setMenu($Lk_Ens, intval($key));
                    }
                    else{
                        $redir = "./?page=editer_enseigne_menu&id=$ens_id&war_msg=Au moin un des menus ne vous appartiennent pas";
                        ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
                        die('Au moin un des menus ne vous appartiennent pas');
                    }
                }
            }
            $redir = "./?page=gestion_enseigne&suc_msg=Les menus ont été correctement modifiés";
            ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
            die('Les menus ont été correctement ajoutés');
        }
    }
    else{
        $redir = "./?page=gestion_enseigne&war_msg=L'enseigne à laquelle vous essayer de lier les menus ne vous appartient pas";
        ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
        die('L\'enseigne à laquelle vous essayer de lier les menus ne vous appartient pas');
    }

    /*
     * GESTION HORAIRES DEJA EXISTANT
     */
    $MenEnsList = $EnsManager->getListMenu($Lk_Ens);
    $MenArray = [];

    if(($MenEnsList != NULL) && (count($MenEnsList) != 0)) {
        foreach ($MenEnsList as $value) {
            $MenArray[] = $value->id();
        }
    }

?>