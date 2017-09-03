<?php // WELCOME TO CONTROLLER

    $EnsManager = new EnseigneManager($db);
    $ProdManager = new ProduitsManager($db);
    $checkid = (int) $get['prod_id'];

    if($ProdManager->isMine($_SESSION['guest_entreprise'], $checkid)){
        $toUp = $ProdManager->get($checkid);
        if(isset($post['appelation'])){
            if(ProduitsEditor::update($toUp, $post, $db)){
                $post['err_msg'] = ProduitsEditor::update($toUp, $post, $db);
            }
            else{
                $redir = './?page=gestion_produits&suc_msg=Produit modifié avec succès"</script>';
                ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
                die('Produit modifié avec succes');
            }
        }
    }
    else{
        $redir = './?page=gestion_produits&err_msg=Le produit ne vous appartient pas"</script>';
        ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
        die('Le produit ne vous appartient pas');
    }

?>