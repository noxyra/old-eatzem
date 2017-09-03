<?php
    if(isset($post['add_horaires'])){
        $horManager = new HorairesManager($db);
        $ensManager = new EnseigneManager($db);
        $entManager = new EntrepriseManager($db);

        $horList = [];
        $linkList = [];

        foreach ($post as $k => $v){
            if(!TimeToolBox::isValidTime($v)){
                unset($post[$k]);
            }
        }

        // EXP : Si quelqu'un voit ça, je lui doit une explications : J'avais la flemme.

        // Horaires Lundi
        if(isset($post['LUN_P1_MIN']) AND !empty($post['LUN_P1_MIN']) AND isset($post['LUN_P1_MAX']) AND !empty($post['LUN_P1_MAX'])){
            $horList[] = new Horaires([
                'jour' => 'LUN',
                'heureO' => $post['LUN_P1_MIN'],
                'heureF' => $post['LUN_P1_MAX']
            ]);
        }
        if(isset($post['LUN_P2_MIN']) AND !empty($post['LUN_P2_MIN']) AND isset($post['LUN_P2_MAX']) AND !empty($post['LUN_P2_MAX'])){
            $horList[] = new Horaires([
                'jour' => 'LUN',
                'heureO' => $post['LUN_P2_MIN'],
                'heureF' => $post['LUN_P2_MAX']
            ]);
        }

        // Horaires Mardi
        if(isset($post['MAR_P1_MIN']) AND !empty($post['MAR_P1_MIN']) AND isset($post['MAR_P1_MAX']) AND !empty($post['MAR_P1_MAX'])){
            $horList[] = new Horaires([
                'jour' => 'MAR',
                'heureO' => $post['MAR_P1_MIN'],
                'heureF' => $post['MAR_P1_MAX']
            ]);
        }
        if(isset($post['MAR_P2_MIN']) AND !empty($post['MAR_P2_MIN']) AND isset($post['MAR_P2_MAX']) AND !empty($post['MAR_P2_MAX'])){
            $horList[] = new Horaires([
                'jour' => 'MAR',
                'heureO' => $post['MAR_P2_MIN'],
                'heureF' => $post['MAR_P2_MAX']
            ]);
        }

        // Horaires Mercredi
        if(isset($post['MER_P1_MIN']) AND !empty($post['MER_P1_MIN']) AND isset($post['MER_P1_MAX']) AND !empty($post['MER_P1_MAX'])){
            $horList[] = new Horaires([
                'jour' => 'MER',
                'heureO' => $post['MER_P1_MIN'],
                'heureF' => $post['MER_P1_MAX']
            ]);
        }
        if(isset($post['MER_P2_MIN']) AND !empty($post['MER_P2_MIN']) AND isset($post['MER_P2_MAX']) AND !empty($post['MER_P2_MAX'])){
            $horList[] = new Horaires([
                'jour' => 'MER',
                'heureO' => $post['MER_P2_MIN'],
                'heureF' => $post['MER_P2_MAX']
            ]);
        }

        // Horaires Jeudi
        if(isset($post['JEU_P1_MIN']) AND !empty($post['JEU_P1_MIN']) AND isset($post['JEU_P1_MAX']) AND !empty($post['JEU_P1_MAX'])){
            $horList[] = new Horaires([
                'jour' => 'JEU',
                'heureO' => $post['JEU_P1_MIN'],
                'heureF' => $post['JEU_P1_MAX']
            ]);
        }
        if(isset($post['JEU_P2_MIN']) AND !empty($post['JEU_P2_MIN']) AND isset($post['JEU_P2_MAX']) AND !empty($post['JEU_P2_MAX'])){
            $horList[] = new Horaires([
                'jour' => 'JEU',
                'heureO' => $post['JEU_P2_MIN'],
                'heureF' => $post['JEU_P2_MAX']
            ]);
        }

        // Horaires Vendredi
        if(isset($post['VEN_P1_MIN']) AND !empty($post['VEN_P1_MIN']) AND isset($post['VEN_P1_MAX']) AND !empty($post['VEN_P1_MAX'])){
            $horList[] = new Horaires([
                'jour' => 'VEN',
                'heureO' => $post['VEN_P1_MIN'],
                'heureF' => $post['VEN_P1_MAX']
            ]);
        }
        if(isset($post['VEN_P2_MIN']) AND !empty($post['VEN_P2_MIN']) AND isset($post['VEN_P2_MAX']) AND !empty($post['VEN_P2_MAX'])){
            $horList[] = new Horaires([
                'jour' => 'VEN',
                'heureO' => $post['VEN_P2_MIN'],
                'heureF' => $post['VEN_P2_MAX']
            ]);
        }

        // Horaires Samedi
        if(isset($post['SAM_P1_MIN']) AND !empty($post['SAM_P1_MIN']) AND isset($post['SAM_P1_MAX']) AND !empty($post['SAM_P1_MAX'])){
            $horList[] = new Horaires([
                'jour' => 'SAM',
                'heureO' => $post['SAM_P1_MIN'],
                'heureF' => $post['SAM_P1_MAX']
            ]);
        }
        if(isset($post['SAM_P2_MIN']) AND !empty($post['SAM_P2_MIN']) AND isset($post['SAM_P2_MAX']) AND !empty($post['SAM_P2_MAX'])){
            $horList[] = new Horaires([
                'jour' => 'SAM',
                'heureO' => $post['SAM_P2_MIN'],
                'heureF' => $post['SAM_P2_MAX']
            ]);
        }

        // Horaires Dimanche
        if(isset($post['DIM_P1_MIN']) AND !empty($post['DIM_P1_MIN']) AND isset($post['DIM_P1_MAX']) AND !empty($post['DIM_P1_MAX'])){
            $horList[] = new Horaires([
                'jour' => 'DIM',
                'heureO' => $post['DIM_P1_MIN'],
                'heureF' => $post['DIM_P1_MAX']
            ]);
        }
        if(isset($post['DIM_P2_MIN']) AND !empty($post['DIM_P2_MIN']) AND isset($post['DIM_P2_MAX']) AND !empty($post['DIM_P2_MAX'])){
            $horList[] = new Horaires([
                'jour' => 'DIM',
                'heureO' => $post['DIM_P2_MIN'],
                'heureF' => $post['DIM_P2_MAX']
            ]);
        }

        // AJOUT EN BDD
        if(!empty($horList)){
            // Ajout des horaires
            foreach ($horList as $horaire){
                $horManager->add($horaire);
                $entManager->setHoraires($_SESSION['guest_entreprise'], $horaire);
                $ensManager->setHoraires($_SESSION['EnseigneEnCreation'], $horaire->id());
            }

            $redir = "./?page=enseigne_creator&selectAction=add_produits&suc_msg=Les horaires ont bien été ajoutés";
            ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
            die('Les horaires ont bien été ajouté');
        }
    }

    // Cette page ne gère que les horaires "standards" -> deux plages par jours
    require('Bundle/EnseigneFacilitor/addHoraires.php');
?>