<?php
    if(isset($post['appelation'])){
        if(ProduitsEditor::create($post, $db)) {
            $post['err_msg'] = ProduitsEditor::create($post, $db);
        }
        else{
            $redir = "./?page=gestion_produits&suc_msg=Le produit a bien été ajouté";
            ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
            die('Le produit à bien été ajouté');
        }
    }
?>