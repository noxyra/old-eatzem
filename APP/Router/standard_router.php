<?php
    if(isset($get['page'])){
        switch($get['page']){
            // PASSERELLE PRO

            case 'espace_pro';
                require('Bundle/InscriptionPro/index.php');
                break;
            case 'password_oublie';
                require('Bundle/ResetPassPro/index.php');
                break;
            // ACCUEIL
            case 'accueil';
                require('Bundle/Accueil/index.php');
                break;
            // USER
            case 'aleatoire_local';
                require('Bundle/__PASS__RandEnseigneUser/index.php');
                break;
            case 'resultat';
                require('Bundle/ResultatRecherche/index.php');
                break;
            case 'cgu';
                require('Bundle/CGU/index.php');
                break;
            case 'cgv';
                require('Bundle/CGV/index.php');
                break;
            default;
                $get['page'] = 'accueil';
                require('Bundle/Accueil/index.php');
        }
    }
    elseif(isset($get['enseigne'])){
        if(UrlChecker::EnseigneCheck($get['enseigne'], $db)){
            if(isset($get['select'])){
                switch ($get['select']){
                    case "menus";
                        require('Bundle/EnseigneMenuUser/index.php');
                        break;
                    case "entrees";
                        require('Bundle/EnseigneProduitUser/index.php');
                        break;
                    case "plats";
                        require('Bundle/EnseigneProduitUser/index.php');
                        break;
                    case "pizzas";
                        require('Bundle/EnseigneProduitUser/index.php');
                        break;
                    case "desserts";
                        require('Bundle/EnseigneProduitUser/index.php');
                        break;
                    case "sandwichs";
                        require('Bundle/EnseigneProduitUser/index.php');
                        break;
                    case "vienoiseries";
                        require('Bundle/EnseigneProduitUser/index.php');
                        break;
                    case "boissons";
                        require('Bundle/EnseigneProduitUser/index.php');
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
    elseif(isset($get['use_token'])){
        require('Bundle/TokenUtily/Controller/index.php');
    }
    elseif(isset($get['reset_pass'])){
        require('Bundle/TokenUtily/Controller/resetPass.php');
    }
    else{
        require('Bundle/Accueil/index.php');
    }