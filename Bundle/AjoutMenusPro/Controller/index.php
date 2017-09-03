<?php
    if(isset($post['nom'])){
        if(MenusEditor::create($post, $db)) {
            $post['err_msg'] = MenusEditor::create($post, $db);
        }
        else{
            $redir = "./?page=gestion_menus&suc_msg=Le menu a bien été ajouté";
            ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
            die('Le menu à bien été ajouté');
        }
    }
?>