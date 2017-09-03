<?php
    $typManager = new TypeManager($db);
    $typList = $typManager->getList();

    // Vérification du non dépassement du maximum d'abonnement
//    if(!$aboCheck->canHadOffEns()){
//        $post['err_msg'] = "Votre abonnement actuel ne vous permet pas d'ajouter plus d'enseignes";
//        require("Bundle/GestionEnseignePro/index.php");
//        die();
//    }

    // Dans le cas d'un ajout
    if(isset($post['nom'])){
        if(EnseigneEditor::create($post, $db)){
            $post['err_msg'] = EnseigneEditor::create($post, $db);
        }
        else{
            $redir = "./?page=gestion_enseigne&suc_msg=L'enseigne a bien été ajoutée";
            ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
            die('L\'enseigne à bien été ajouté');
        }
    }
?>