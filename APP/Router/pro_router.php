<?php
    if(isset($get['page'])){
        switch($get['page']){

            // ACCUEIL PRO

            case 'accueilPro';
                $title = "Accueil";
                require('Bundle/AccueilPro/index.php');
                break;

            // EASY ENSEIGNE
            case 'enseigne_creator';
                $title = "Enseigne Facilitor";
                require('Bundle/EnseigneFacilitor/Controller/index.php');
                break;

            // PROFIL PRO

            case 'profil_pro';
                $title = "Profil";
                require('Bundle/ProfilPro/Controller/index.php');
                break;

            // ABONNEMENT PRO

            case 'abonnement_pro';
                $title = "Abonnement";
                require('Bundle/AbonnementPro/Controller/index.php');
                break;

            case 'paypal_process';
                $title = "Panier";
                require('Bundle/AbonnementPro/Controller/process.php');
                break;

            case 'paypal_cancel';
                $title = "Annulation";
                require('Bundle/AbonnementPro/Controller/cancel.php');
                break;

            case 'free_beta';
                $title = "Bêta gratuite";
                require('Bundle/FreeTools/Controller/index.php');
                break;

            // PORTE FEUILLE PRO

            case 'portefeuille_pro';
                $title = "Portefeuille";
                require('Bundle/PorteFeuillePro/Controller/index.php');
                break;

            case 'portefeuille_process';
                $title = "Panier";
                require('Bundle/PorteFeuillePro/Controller/process.php');
                break;

            case 'portefeuille_cancel';
                $title = "Annulation";
                require('Bundle/PorteFeuillePro/Controller/cancel.php');
                break;

            case 'factures';
                $title = "Factures";
                require('Bundle/FactureHistoryPro/Controller/index.php');
                break;

            // GESTION ANNONCES
            case 'poster_annonce';
                $title = "Annonces";
                require('Bundle/AnnoncePosterPro/Controller/index.php');
                break;
            case 'historique_annonce';
                $title = "Historique des annonces";
                require('Bundle/AnnonceHistoryPro/Controller/index.php');
                break;

            // GESTION ENSEIGNE

            case 'gestion_enseigne';
                $title = "Mes enseignes";
                require('Bundle/GestionEnseignePro/index.php');
                break;
            case 'ajout_enseigne';
                $title = "Ajouter une enseigne";
                require('Bundle/AjoutEnseignePro/index.php');
                break;
            case 'editer_enseigne';
                $title = "Modifier une enseigne";
                require('Bundle/EditEnseignePro/index.php');
                break;
            case 'editer_enseigne_horaires';
                $title = "Gérer les horaires";
                require('Bundle/EditEnseigneHorairesPro/index.php');
                break;
            case 'editer_enseigne_paiement';
                $title = "Gérer les mode de paiement";
                require('Bundle/EditEnseignePaiementPro/index.php');
                break;
            case 'editer_enseigne_menu';
                $title = "Gérer les menus";
                require('Bundle/EditEnseigneMenuPro/index.php');
                break;
            case 'editer_enseigne_produits';
                $title = "Gérer les produits";
                require('Bundle/EditEnseigneProduitsPro/index.php');
                break;
            case 'editer_enseigne_theme';
                $title = "Gérer le thème";
                require('Bundle/EditEnseigneColorPro/index.php');
                break;

            // GESTION HORAIRES

            case 'gestion_horaires';
                $title = "Mes plages horaires";
                require('Bundle/GestionHorairesPro/index.php');
                break;
            case 'ajout_horaires';
                $title = "Ajout d'un horaire";
                require('Bundle/AjoutHorairesPro/index.php');
                break;
            case 'editer_horaires';
                $title = "Edition des horaires";
                require('Bundle/EditHorairesPro/index.php');
                break;

            // GESTION MODE DE PAIEMENT

            case 'gestion_modePaiement';
                $title = "Mes modes de paiement";
                require('Bundle/GestionModePaiementPro/index.php');
                break;
            case 'ajout_modePaiement';
                $title = "Ajout d'un mode de paiement";
                require('Bundle/AjoutModePaiementPro/index.php');
                break;
            case 'editer_modePaiement';
                $title = "Edition d'un mode de paiement";
                require('Bundle/EditModePaiementPro/index.php');
                break;

            // GESTION DES PRODUITS

            case 'gestion_produits';
                $title = "Mes produits";
                require('Bundle/GestionProduitsPro/index.php');
                break;
            case 'ajout_produits';
                $title = "Ajout d'un produit";
                require('Bundle/AjoutProduitsPro/index.php');
                break;
            case 'editer_produit';
                $title = "Edition d'un produit";
                require('Bundle/EditProduitsPro/index.php');
                break;

            // GESTION DES FORMATS

            case 'gestion_format';
                $title = "Mes formats";
                require('Bundle/GestionFormatPro/index.php');
                break;
            case 'ajout_format';
                $title = "Ajout d'un format";
                require('Bundle/AjoutFormatPro/index.php');
                break;
            case 'editer_format';
                $title = "Edition d'un format";
                require('Bundle/EditFormatPro/index.php');
                break;

            // GESTION DES MENUS

            case 'gestion_menus';
                $title = "Mes menus";
                require('Bundle/GestionMenusPro/index.php');
                break;
            case 'ajout_menus';
                $title = "Ajout d'un menu";
                require('Bundle/AjoutMenusPro/index.php');
                break;
            case 'editer_menus';
                $title = "Edition d'un menu";
                require('Bundle/EditMenusPro/index.php');
                break;
            case 'editer_menus_format';
                $title = "Gestion des formats d'un menu";
                require('Bundle/EditMenusFormatPro/index.php');
                break;

            case 'cgu';
                $title = "Conditions générale d'utilisation";
                require('Bundle/CGU/index.php');
                break;
            case 'cgv';
                $title = "Conditions générale de vente";
                require('Bundle/CGV/index.php');
                break;
            case 'fonctionnement';
                $title = "Tutoriel";
                require('Bundle/FONCTIONNEMENT/index.php');
                break;

            default;
                $get['page'] = 'accueilPro';
                require('Bundle/GestionEnseignePro/index.php');
        }
    }
    // Visualiseur d'enseigne
    // TODO Vérifier que l'enseigne appartien bien a l'entreprise ou qu'elle est bien active
    elseif(isset($get['enseigne'])){
        if(UrlChecker::EnseigneCheck($get['enseigne'], $db)){
            if(isset($get['select'])){
                switch ($get['select']){
                    case "menus";
                        require('Bundle/EnseigneMenuUser/index.php');
                        break;
                    case "entrees";
                        require('Bundle/EnseigneEntreeUser/index.php');
                        break;
                    case "plats";
                        require('Bundle/EnseignePlatUser/index.php');
                        break;
                    case "pizzas";
                        require('Bundle/EnseigneProduitUser/index.php');
                        break;
                    case "desserts";
                        require('Bundle/EnseigneDessertUser/index.php');
                        break;
                    case "sandwichs";
                        require('Bundle/EnseigneSandwichUser/index.php');
                        break;
                    case "vienoiseries";
                        require('Bundle/EnseigneVienoiserieUser/index.php');
                        break;
                    case "boissons";
                        require('Bundle/EnseigneBoissonUser/index.php');
                        break;
                    default;
                        require('Bundle/EnseigneUser/index.php');
                }
            }
            else{
                require('Bundle/EnseigneUser/index.php');
            }
        }
        else{
            require('Bundle/InvalidEnseigne/index.php');
        }
    }
    else{
        require('Bundle/GestionEnseignePro/index.php');
    }