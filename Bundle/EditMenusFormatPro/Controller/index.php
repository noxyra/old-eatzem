<?php

    /*
     * VARIABLES DE BASE
     */

    $men_id = (int) $get['men_id'];

    $EntManager = new EntrepriseManager($db);
    $FormEntList = $EntManager->getFormatList($_SESSION['guest_entreprise']);

    $MenManager = new MenuManager($db);

    $Lk_Men = $MenManager->get($men_id);

    $FormMenList = $MenManager->getFormatsList($Lk_Men);



    /*
     * RESET ET AJOUT DES NOUVEAUX HORAIRES
     */
    if($MenManager->isMine($_SESSION['guest_entreprise'], $men_id)){
        if(isset($post['maj_format_menus'])) {
            foreach ($FormMenList as $value) {
                $MenManager->deleteFormat($Lk_Men, $value);
            }
            // Création des nouveaux horaires
            foreach ($post as $key => $value) {
                if (is_numeric($key)) {
                    $MenManager->setFormat($Lk_Men, intval($key));
                }
            }
            $redir = "./?page=gestion_menus&suc_msg=Les formats du menu ont été modifiés avec succès";
            ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
            die('Les formats du menu ont été modifiés avec succes');
        }
    }
    else{
        $redir = "./?page=gestion_menus&err_msg=Le menu ne vous appartient pas";
        ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
        die('Le menu ne vous appartient pas');
    }

    /*
     * GESTION HORAIRES DEJA EXISTANT
     */
    $FormMenList = $MenManager->getFormatsList($Lk_Men);
    $FormArray = [];

    if(($FormMenList != NULL) && (count($FormMenList) != 0)) {
        foreach ($FormMenList as $value) {
            $FormArray[] = $value->format_id();
        }
    }

?>