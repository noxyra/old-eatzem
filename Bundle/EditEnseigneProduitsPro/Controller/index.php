<?php

    /*
     * VARIABLES DE BASE
     */

    $ens_id = (int) $get['id'];

    $EntManager = new EntrepriseManager($db);
    $ProdManager = new ProduitsManager($db);
    $ProEntList = $EntManager->getProduits($_SESSION['guest_entreprise']);

    $EnsManager = new EnseigneManager($db);
    $Lk_Ens = $EnsManager->get($ens_id);

    $ProEnsList = $EnsManager->getProdList($Lk_Ens);

//    var_dump($ProEnsList);

    /*
     * RESET ET AJOUT DES NOUVEAUX HORAIRES
     */
    if($EnsManager->isMine($_SESSION['guest_entreprise'], $ens_id)){
        if(isset($post['maj_produits_enseigne'])) {
            // Suppression des anciens horaires
            foreach ($ProEnsList as $value) {
                $EnsManager->deleteProduit($Lk_Ens, $value);
            }
            // Création des nouveaux horaires
            foreach ($post as $key => $value) {
                if (is_numeric($key)) {
                    if($ProdManager->isMine($_SESSION['guest_entreprise'], intval($key))){
                        $EnsManager->setProduits($Lk_Ens, intval($key));
                    }
                    else{
                        $redir = "./?page=editer_enseigne_produits&id=$ens_id&war_msg=Au moin un des produits ne vous appartiennent pas";
                        ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
                        die('Au moin un des produits ne vous appartiennent pas');
                    }
                }
            }
            $redir = "./?page=gestion_enseigne&suc_msg=Les produits ont été correctement modifiés";
            ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
            die('Les produits ont été correctement ajoutés');
        }
    }
    else{
        $redir = "./?page=gestion_enseigne&war_msg=L'enseigne à laquelle vous essayer de lier les produits ne vous appartient pas";
        ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
        die('L\'enseigne à laquelle vous essayer de lier les produits ne vous appartient pas');
    }

    /*
     * GESTION HORAIRES DEJA EXISTANT
     */
    $ProEnsList = $EnsManager->getProdList($Lk_Ens);
    $ProArray = [];

    if(($ProEnsList != NULL) && (count($ProEnsList) != 0)) {
        foreach ($ProEnsList as $value) {
            $ProArray[] = $value->id();
        }
    }

?>