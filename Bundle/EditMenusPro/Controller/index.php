<?php // WELCOME TO CONTROLLER

    $MenManager = new MenuManager($db);
    $checkid = (int) $get['men_id'];

    if($MenManager->isMine($_SESSION['guest_entreprise'], $checkid)){
        $toUp = $MenManager->get($checkid);
        if(isset($post['nom'])){
            if(MenusEditor::update($toUp, $post, $db)){
                $post['err_msg'] = MenusEditor::update($toUp, $post, $db);
            }
            else{
                $redir = './?page=gestion_menus&suc_msg=Menu modifié avec succès"</script>';
                ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
                die('Menus modifié avec succes');
            }
        }
    }
    else{
        $redir = './?page=gestion_menus&err_msg=Le menu ne vous appartient pas"</script>';
        ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
        die('Le menu ne vous appartient pas');
    }

?>