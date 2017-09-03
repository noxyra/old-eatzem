<?php // WELCOME TO CONTROLLER

    $HorManager = new HorairesManager($db);
    $checkid = (int) $get['hor_id'];

    if($HorManager->isMine($_SESSION['guest_entreprise'], $checkid)){
        $toUp = $HorManager->get($checkid);

        if(isset($post['edit_horaires'])){
            if(HorairesEditor::update($toUp, $post, $db)){
                $post['err_msg'] = HorairesEditor::update($toUp, $post, $db);
            }
            else{
                $redir = './?page=gestion_horaires&suc_msg=Horaire modifié avec succes"</script>';
                ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
                die('Horaire modifié avec succes"</script>');
            }
        }
    }
    else{
        $redir = "./?page=gestion_produits&err_msg=L'horaire ne vous appartient pas";
        ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
        die('Le\'horaire ne vous appartient pas');
    }

?>