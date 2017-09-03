<?php
    if(isset($get['selectAction'])){
        // Etape 1
        switch($get['selectAction']){
            case "add_enseigne";
                require('Bundle/EnseigneFacilitor/Controller/addEnseigne.php');
                break;
            case "add_horaires";
                if(isset($_SESSION['EnseigneEnCreation']) AND !empty($_SESSION['EnseigneEnCreation'])) {
                    require('Bundle/EnseigneFacilitor/Controller/addHoraires.php');
                    break;
                }
            case "add_produits";
                if(isset($_SESSION['EnseigneEnCreation']) AND !empty($_SESSION['EnseigneEnCreation'])) {
                    require('Bundle/EnseigneFacilitor/Controller/addProduits.php');
                    break;
                }
            case "add_menus";
                if(isset($_SESSION['EnseigneEnCreation']) AND !empty($_SESSION['EnseigneEnCreation'])) {
                    require('Bundle/EnseigneFacilitor/Controller/addMenus.php');
                    break;
                }
            case "add_modePaiement";
                if(isset($_SESSION['EnseigneEnCreation']) AND !empty($_SESSION['EnseigneEnCreation'])) {
                    require('Bundle/EnseigneFacilitor/Controller/addModePaiement.php');
                    break;
                }
            case "finish";
                if(isset($_SESSION['EnseigneEnCreation']) AND !empty($_SESSION['EnseigneEnCreation'])) {
                    require("Bundle/EnseigneFacilitor/finish.php");
                    break;
                }
            default;
                // EXP Par défault on force l'étape 1
                require('Bundle/EnseigneFacilitor/Controller/addEnseigne.php');
                break;
        }
    }
    else{
        // On force l'étape 1
        require('Bundle/EnseigneFacilitor/Controller/addEnseigne.php');
    }