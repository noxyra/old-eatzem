<?php

    $ens_id = (int) $get['id'];

    $EntManager = new EntrepriseManager($db);
    $horManager = new HorairesManager($db);
    $HorEntList = $EntManager->getHoraires($_SESSION['guest_entreprise']);

    $EnsManager = new EnseigneManager($db);
    $Lk_Ens = $EnsManager->get($ens_id);

    $HorEnsList = $EnsManager->getHorairesList($Lk_Ens);



    /*
     * RESET ET AJOUT DES NOUVEAUX HORAIRES
     */
    if($EnsManager->isMine($_SESSION['guest_entreprise'], $ens_id)){
        if(isset($post['maj_horaires_enseigne'])) {
            foreach ($HorEnsList as $value) {
                $EnsManager->deleteHoraires($Lk_Ens, $value);
            }
            foreach ($post as $key => $value) {
                if (is_numeric($key)) {
                    if($horManager->isMine($_SESSION['guest_entreprise'], intval($key))) {
                        $EnsManager->setHoraires($Lk_Ens, intval($key));
                    }
                    else{
                        $redir = "./?page=editer_enseigne_horaires&id=$ens_id&war_msg=Au moin un des horaires ne vous appartiennent pas";
                        ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
                        die('Au moin un des horaires ne vous appartiennent pas');
                    }
                }
            }
            $redir = "./?page=gestion_enseigne&suc_msg=Les horaires ont été correctement modifiés";
            ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
            die('Les horaires ont été correctement ajoutés');
        }
    }
    else{
        $redir = "./?page=gestion_enseigne&war_msg=L'enseigne à laquelle vous essayer de lier les horaires ne vous appartient pas";
        ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
        die('L\'enseigne à laquelle vous essayer de lier les horaires ne vous appartient pas');
    }

    /*
     * GESTION HORAIRES DEJA EXISTANT
     */
    $HorEnsList = $EnsManager->getHorairesList($Lk_Ens);
    $HorArray = [];

    if(($HorEnsList != NULL) && (count($HorEnsList) != 0)) {
        foreach ($HorEnsList as $value) {
            $HorArray[] = $value->id();
        }
    }

?>