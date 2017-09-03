<?php // WELCOME TO CONTROLLER

    $ModManager = new ModePaiementManager($db);
    $checkid = (int) $get['mod_id'];

    if($ModManager->isMine($_SESSION['guest_entreprise'], $checkid)){
        $toUp = $ModManager->get($checkid);
        if(isset($post['mode'])){
            if(ModePaiementEditor::update($toUp, $post, $db)){
                $post['err_msg'] = ModePaiementEditor::update($toUp, $post, $db);
            }
            else{
                $redir = './?page=gestion_modePaiement&suc_msg=Mode de paiement modifié avec succes"</script>';
                ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
                die('Mode de paiement modifié avec succes');
            }
        }
    }
    else{
        $redir = './?page=gestion_modePaiement&err_msg=Le mode de paiement ne vous appartient pas"</script>';
        ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
        die('Le mode de paiement ne vous appartient pas');
    }

?>