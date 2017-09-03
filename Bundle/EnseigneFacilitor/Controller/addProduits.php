<?php
    $formatManager = new FormatManager($db);
//    if(!$aboCheck->canHadProds()){
//        $error_message = "Votre abonnement actuel ne vous permet pas d'ajouter plus de produits";
//        require("Bundle/GestionProduitsPro/index.php");
//        die();
//    }
    if(isset($post['ajout_prod_continue']) OR isset($post['ajout_prod_and_new'])){
        // GERER L'AJOUT DU PRODUIT ICI
        if(ProduitsEditor::createAndGetSelected($post, $db, $_SESSION['EnseigneEnCreation'])) {
            echo ProduitsEditor::createAndGetSelected($post, $db, $_SESSION['EnseigneEnCreation']);
        }else{
            // GESTION DES FORMATS
            if(isset($post['only_price'])){
                $format = new Format([
                    'produits_id' => $_SESSION['lastAddProduct'],
                    'format' => "/",
                    'unite' => "/",
                    'prix' => $post['only_price'],
                ]);
                $formatManager->add($format);
            }
            else{
                // GERER FORMATS MULTIPLES ICI
                /**/
                $i = 1;
                while($i < 5){
                    $form_key = 'format-' . $i;
                    $unit_key = 'unite-' . $i;
                    $prix_key = 'prix-' . $i;
                    if(isset($post[$form_key]) AND !empty($post[$form_key])){
                        if(isset($post[$unit_key])){
                            if(isset($post[$prix_key]) AND !empty($post[$prix_key])){
                                $toAdd = new Format([
                                    'produits_id' => $_SESSION['lastAddProduct'],
                                    'format' => $post[$form_key],
                                    'unite' => $post[$unit_key],
                                    'prix' => preg_replace('#,#', '.', $post[$prix_key]),
                                ]);
                                $formatManager->add($toAdd);
                            }
                        }
                    }
                    $i += 1;
                }
                /**/
            }
        }
    }
    if(isset($post['ajout_prod_continue'])){
        $redir = "./?page=enseigne_creator&selectAction=add_menus&suc_msg=Le produit a bien été ajouté";
        ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
        die('Le produit a bien été ajouté');
    }
    elseif(isset($post['ajout_prod_and_new'])){
        $redir = "./?page=enseigne_creator&selectAction=add_produits&suc_msg=Le produit a bien été ajouté";
        ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
        die('Le produit a bien été ajouté');
    }
    else{
        require("Bundle/EnseigneFacilitor/addProduits.php");
    }
?>