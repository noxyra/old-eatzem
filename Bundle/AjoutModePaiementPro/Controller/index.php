<?php
    if(isset($post['mode'])){
        if(ModePaiementEditor::create($post, $db)) {
            $post['err_msg'] = ModePaiementEditor::create($post, $db);
        }
        else{
            $redir = "./?page=gestion_modePaiement&suc_msg=Le mode de paiement a bien été ajouté";
            ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
            die('Le mode de paiement à bien été ajouté');
        }
    }
?>