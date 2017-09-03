<?php // BIENVENUE DANS LE CONTROLLER

    /**
     *  Le "$talker" est un tableau contenant les textes qui doivent être affiché dans
     *  "La console de chargement" pour donner un effet HUD a l'utilisateur pendant la
     *  redirection vers l'enseigne avec un $get=url
     */$talker = [];

    $EnsManager = new EnseigneManager($db);

    if($_SESSION['preciseLocation'] == false){
        $talker[] = '<span class="left_info_col">Mode de localisation : </span><span class="right_info_col orange_talk">Ville</span><br />';
        if(isset($_SESSION['localisationVisiteur']['lat']) AND isset($_SESSION['localisationVisiteur']['lon'])){
            $talker[] = '<span class="left_info_col">Localisation de la ville : </span><span class="right_info_col green_talk">OK</span><br />';
            $talker[] = '<span class="left_info_col">Distance de recherche : </span><span class="right_info_col orange_talk">15 Km</span><br />';
            $RandEns = $EnsManager->getOneRandEnseignesByDistMax($_SESSION['localisationVisiteur']['lat'],$_SESSION['localisationVisiteur']['lon'],15);

        }
        else{
            $talker[] = '<span class="left_info_col">Latitude et longitude de la ville : </span><span class="right_info_col orange_talk">Manquantes</span><br />';
            $talker[] = '<span class="left_info_col">Distance de recherche : </span><span class="right_info_col orange_talk">15 Km</span><br />';
            $RandEns = $EnsManager->getOneRandEnseignes();
        }
    }
    else{
        $talker[] = '<span class="left_info_col">Mode de localisation : </span><span class="right_info_col green_talk">Précise</span><br />';
        if(isset($_SESSION['localisationVisiteur']['lat']) AND isset($_SESSION['localisationVisiteur']['lon'])){
            $talker[] = '<span class="left_info_col">Localisation de la ville : </span><span class="right_info_col green_talk">OK</span><br />';
            $talker[] = '<span class="left_info_col">Distance de recherche : </span><span class="right_info_col green_talk">5 Km</span><br />';
            $RandEns = $EnsManager->getOneRandEnseignesByDistMax($_SESSION['localisationVisiteur']['lat'], $_SESSION['localisationVisiteur']['lon'],5);
        }
        else{
            $talker[] = '<span class="left_info_col">Localisation de la ville : </span><span class="right_info_col orange_talk">Manquantes</span><br />';
            $talker[] = '<span class="left_info_col">Distance de recherche : </span><span class="right_info_col orange_talk">15 Km</span><br />';
            $RandEns = $EnsManager->getOneRandEnseignes();
        }
    }

    if(count($RandEns) == 1){
        $talker[] = '<span class="left_info_col">Résultat : </span><span class="right_info_col green_talk">Trouvé</span><br />';
        $talker[] = '<span class="left_info_col">Redirection : </span><span class="right_info_col green_talk">En cours</span><br />';
        $redirect = '<meta http-equiv="refresh" content="2; URL=./?enseigne='.$RandEns->url().'">';
    }
    else{
        $talker[] = '<span class="left_info_col">Résultat : </span><span class="right_info_col orange_talk">Non Trouvé</span><br />';
        $talker[] = '<span class="left_info_col">Réessayer ? : </span><a href="./?page=aleatoire_local">Cliquez ici</a><br />';
        $talker[] = '<span class="left_info_col">Retourner a l\'accueil ? : </span><a href="./?page=aleatoire_local">Cliquez ici</a><br />';
    }

?>