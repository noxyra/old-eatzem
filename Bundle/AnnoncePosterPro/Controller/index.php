<?php

    $AnnoncesManager = new AnnoncesManager($db);
    $EnseigneManager = new EnseigneManager($db);
    $EntrepriseManager = new EntrepriseManager($db);
    $annonce = new Annonces([]);
    $valideAnnonce = true;

    $listEnseigne = $EntrepriseManager->getEnseignes($_SESSION['guest_entreprise']);
    $options = "";
    // TODO A PLACER AU PLUS VITE DANS UNE LIBRAIRIE
    foreach ($listEnseigne as $enseigne){
        $options .= "<option value='" . $enseigne->id() . "'>" . $enseigne->nom() . "</option>";
    }

    if(isset($post['titre'])){
        if(isset($post['enseigne']) AND !empty($post['enseigne'])){
            $eid = intval($post['enseigne']);
            $annonce->setEnseigne_id($eid);
        }else{ $valideAnnonce = false; $post['err_msg'] = "L'enseigne renseignée n'existe pas"; }

        if(isset($post['titre']) AND !empty($post['titre'])){
            if(StringToolBox::size($post['titre'], 10, 255)){
                $annonce->setTitre($post['titre']);
            }else{ $valideAnnonce = false; $post['err_msg'] = "Le titre doit faire entre 1 et 255 caractères"; }
        }else{ $valideAnnonce = false; $post['err_msg'] = "Il manque le titre"; }

        if(isset($post['contenu']) AND !empty($post['contenu'])){
            if(StringToolBox::size($post['contenu'], 50, 500)){
                $annonce->setContenu($post['contenu']);
            }else{ $valideAnnonce = false; $post['err_msg'] = "Le contenu doit faire entre 1 et 2000 caractères"; }
        }else{ $valideAnnonce = false; $post['err_msg'] = "Il manque le titre"; }

        if(isset($post['distmax']) AND !empty($post['distmax'])){
            $validePrix = true;
            $distM = intval($post['distmax']);
            if(is_int($distM)){
                if      ($distM == 2){  $prix = 2; }
                elseif  ($distM == 4){ $prix = 4; }
                elseif  ($distM == 8){ $prix = 8; }
                elseif  ($distM == 16){ $prix = 16; }
                elseif  ($distM == 32){ $prix = 32; }
                else{ $valideAnnonce = false; $validePrix = false; $post['err_msg'] = "Vous n'avez pas sélectionné de distance maximale valide"; }

                if($validePrix == true){
                    $annonce->setDistance_max($distM);

                    if($_SESSION['guest_entreprise']->payCoins($prix, true)){
                        $OK_FOR_PAY = true;
                    }else{ $valideAnnonce = false; $post['err_msg'] = "Vous n'avez pas les fonds suffisant"; }
                }
            }
        }else{ $valideAnnonce = false; $post['err_msg'] = "La distance max n'est pas renseignée"; }

        if($valideAnnonce == true AND $OK_FOR_PAY == true){
            $AnnoncesManager->add($annonce);
            $annonce = $AnnoncesManager->get($annonce->id());
            $annonce->setDate_reup($annonce->date_ajout());
            $AnnoncesManager->update($annonce);

            // PAIEMENT
            $_SESSION['guest_entreprise']->payCoins($prix);
            $EntrepriseManager->update($_SESSION['guest_entreprise']);
            $_SESSION['guest_entreprise'] = $EntrepriseManager->get($_SESSION['guest_entreprise']->id());

            $redir = "./?page=historique_annonce&suc_msg=Annonce postée";
            ?><script language="JavaScript">document.location.href="<?=$redir;?>"</script><?php
            die('L\'annonce à bien été ajouté');
        }
    }

    require('Bundle/AnnoncePosterPro/index.php');