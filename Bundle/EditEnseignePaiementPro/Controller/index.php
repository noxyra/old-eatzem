<?php

    /*
     * VARIABLES DE BASE
     */

    $ens_id = (int) $get['id'];

    $EntManager = new EntrepriseManager($db);
    $ModeManager = new ModePaiementManager($db);
    $PaiEntList = $EntManager->getModePaiement($_SESSION['guest_entreprise']);

    $EnsManager = new EnseigneManager($db);
    $Lk_Ens = $EnsManager->get($ens_id);

    $PaiEnsList = $EnsManager->getModePaiementList($Lk_Ens);



    /*
     * RESET ET AJOUT DES NOUVEAUX HORAIRES
     */
if($EnsManager->isMine($_SESSION['guest_entreprise'], $ens_id)){
    if(isset($post['maj_paiement_enseigne'])) {
        foreach ($PaiEnsList as $value) {
            $EnsManager->deleteModePaiement($Lk_Ens, $value);
        }
        // Création des nouveaux horaires
        foreach ($post as $key => $value) {
            if (is_numeric($key)) {
                if($ModeManager->isMine($_SESSION['guest_entreprise'], intval($key))){
                    $EnsManager->setModePaiement($Lk_Ens, intval($key));
                }
                else{
                    $redir = "./?page=editer_enseigne_paiement&id=$ens_id&war_msg=Au moin un des modes de paiements ne vous appartiennent pas";
                    ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
                    die('Au moin un des modes de paiements ne vous appartiennent pas');
                }
            }
        }
        $redir = "./?page=gestion_enseigne&suc_msg=Les modes de paiement ont été correctement modifiés";
        ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
        die('Les modes de paiements ont été correctement ajoutés');
    }
}
else{
    $redir = "./?page=gestion_enseigne&war_msg=L'enseigne à laquelle vous essayer de lier les modes de paiements ne vous appartient pas";
    ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
    die('L\'enseigne à laquelle vous essayer de lier les modes de paiements ne vous appartient pas');
}


    /*
     * GESTION HORAIRES DEJA EXISTANT
     */
    $PaiEnsList = $EnsManager->getModePaiementList($Lk_Ens);
    $PaiArray = [];

    if(($PaiEnsList != NULL) && (count($PaiEnsList) != 0)) {
        foreach ($PaiEnsList as $value) {
            $PaiArray[] = $value->id();
        }
    }

?>