<?php

    $prod_manager = new ProduitsManager($db);
    $produit = $prod_manager->get(intval($get['prod_id']));

//    DebugToolBox::DUMP($produit);

    if($prod_manager->isMine($_SESSION['guest_entreprise'], $get['prod_id'])) {
        if(isset($post['format'])){
            if (FormatEditor::create($post, $db)) {
                $post['err_msg'] = FormatEditor::create($post, $db);
            }
            else{
                $redir = "./?page=gestion_produits&suc_msg=Le format a bien été ajouté";
                ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
                die('Le format à bien été ajouté');
            }
        }
    }
    else{
        $redir = "./?page=gestion_produits&war_msg=Ce produit ne vous appartient pas";
        ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
        die('Ce produit ne vous appartient pas');
    }



?>