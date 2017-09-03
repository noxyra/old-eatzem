<?php
    if(isset($post['add_modepaiement_finish']) OR isset($post['add_modepaiement_and_new'])){
        if(ModePaiementEditor::createAndAddEns($post, $db, $_SESSION['EnseigneEnCreation'])) {
            echo ModePaiementEditor::createAndAddEns($post, $db, $_SESSION['EnseigneEnCreation']);
        }

        if(isset($post['add_modepaiement_finish'])){
            $redir = "./?page=enseigne_creator&selectAction=finish&suc_msg=Le mode de paiement a bien été ajouté";
            ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
            die('Le mode de paiement a bien été ajouté');
        }
        elseif(isset($post['add_modepaiement_and_new'])){
            $redir = "./?page=enseigne_creator&selectAction=add_modePaiement&suc_msg=Le mode de paiement a bien été ajouté";
            ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
            die('Le mode de paiement a bien été ajouté');
        }
    }else{
        require('Bundle/EnseigneFacilitor/addModePaiement.php');
    }
?>