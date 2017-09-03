<?php
    if(isset($post['add_horaires'])){
        if(HorairesEditor::create($post, $db)) {
            $post['err_msg'] = HorairesEditor::create($post, $db);
        }
        else{
            $redir = "./?page=gestion_horaires&suc_msg=L'horaire a bien été ajouté";
            ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
            die('L\'horaire à bien été ajouté');
        }
    }
?>