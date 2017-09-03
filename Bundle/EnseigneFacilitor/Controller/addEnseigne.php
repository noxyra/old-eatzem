<?php

    $typManager = new TypeManager($db);
    $typList = $typManager->getList();

    // Vérification du non dépassement du maximum d'abonnement
//    if(!$aboCheck->canHadOffEns()){
//        $error_message = "Votre abonnement actuel ne vous permet pas d'ajouter plus d'enseignes";
//        require("Bundle/GestionEnseignePro/index.php");
//        die();
//    }

    // Dans le cas d'un ajout
    if(isset($post['nom'])){
        if(EnseigneEditor::createAndGetSelected($post, $db)){
            $post['err_msg'] = EnseigneEditor::createAndGetSelected($post, $db);
//            var_dump($post);
        }
        else{
            $redir = "./?page=enseigne_creator&selectAction=add_horaires&suc_msg=L'enseigne a bien été ajoutée";
            ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
            die('L\'enseigne à bien été ajouté');
        }
    }

    require('Bundle/EnseigneFacilitor/addEnseigne.php');
?>


