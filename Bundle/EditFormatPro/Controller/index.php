<?php // WELCOME TO CONTROLLER

    $EnsManager = new EnseigneManager($db);
    $FormManager = new FormatManager($db);
    $ProdManager = new ProduitsManager($db);

    $checkid = (int) $get['form_id'];
    $toUp = $FormManager->get($checkid);

    if($ProdManager->isMine($_SESSION['guest_entreprise'], $toUp->produits_id())){
        if(isset($post['format'])){
            if(FormatEditor::update($toUp, $post, $db)){
                $post['err_msg'] = FormatEditor::update($toUp, $post, $db);
            }
            else{
                $redir = './?page=gestion_format&prod_id='.$toUp->produits_id().'&suc_msg=Format modifié avec succes"</script>';
                ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
                die('Format modifié avec succes"</script>');
            }
        }
    }
    else{
        $redir = "./?page=gestion_produits&err_msg=Le produit ne vous appartient pas";
        ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
        die('Le produit ne vous appartient pas');
    }

?>