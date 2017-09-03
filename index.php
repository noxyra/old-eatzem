<?php
    // AUTOLOAD
    require('APP/Config/Autoload.php');
    // LANCEMENT SESSION
    session_start();
    // INITIALISATION DU SERVICE DE LOCALISATION MAXMIND
    require('APP/Config/Localisation.php');
    // CONNEXION BDD
    require('APP/Config/ConnexionBDD.php');
    // PREPARATION APPLICATIVE
    require('APP/Base/Base.php');
    // CONNEXION ENTREPRISE
    require('APP/Base/CorpConnexion.php');
    require('APP/Base/Services.php');

    // DECONNEXION ENTREPRISE
    if(isset($get['page']) AND $get['page'] == 'logout'){
        $_SESSION = array();
        header('Location: ./?page=espace_pro');
    }


    // SELECTION DU ROUTER [ENTREPRISE CONNECT // ENTREPRISE LOGOUT]
    if($_SESSION['etat_entreprise'] == 'logout'){


        //GESTION DES LANDING
        if(isset($get['page']) && $get['page'] == "espace_pro"){
            // REEDIRECTION LANDING PRO
            if
            (
                !isset($_COOKIE['alreadyVisitPro'])
                && strpos($_SERVER["HTTP_USER_AGENT"], "facebookexternalhit/") == false
                && strpos($_SERVER["HTTP_USER_AGENT"], "Facebot") == false
                && strpos($_SERVER["HTTP_USER_AGENT"], "Twitterbot") == false
                && strpos($_SERVER["HTTP_USER_AGENT"], "Googlebot") == false
                && strpos($_SERVER["HTTP_USER_AGENT"], "Google (+https://developers.google.com/+/web/snippet/)") == false
            )
            {
                setcookie("alreadyVisitPro", 'ok', time() + 864000);
                header("Location: https://pro.eatzem.fr/");
            }
        }

        require('APP/Router/standard_router.php');
    }
    if($_SESSION['etat_entreprise'] == 'connect'){
        require('APP/Router/pro_router.php');
    }

//    $ingredients = [
//        "Andive",
//        "Anchoi",
//        "Aubergine",
//        "Aneth",
//        "Ananas",
//        "Amande",
//        "Avocat",
//        "Ail",
//        "Andouillette",
//        "Aïoli",
//        "Basilic",
//        "Bacon",
//        "Banane",
//        "Bagel",
//        "Baguette",
//        "Beurre",
//        "Câpre",
//        "Citron",
//        "Crème fraiche",
//        "Cornichon",
//        "Crevette",
//        "Champignon",
//        "Coeur d'artichaut",
//        "Crouton",
//        "Calamar",
//        "Chorizo",
//        "Courgette",
//        "Cheddar",
//        "Camembert",
//        "Curry",
//        "Chantilly",
//        "Confiture",
//        "Crème de marron",
//        "Chocolat",
//        "Dinde",
//        "Epices",
//        "Emmental",
//        "Figues",
//        "Fromage de chèvre",
//        "Figatelli",
//        "Frite",
//        "Gorgonzola",
//        "Galette",
//        "Herbes de Provence",
//        "Harissa",
//        "Jambon",
//        "Jambon cru",
//        "Lardon",
//        "Merguez",
//        "Miel",
//        "Moule",
//        "Mozzarella",
//        "Magret de canard",
//        "Maroilles",
//        "Munster",
//        "Menthe",
//        "Nutella",
//        "Noix",
//        "Oeuf",
//        "Oignon",
//        "Olive",
//        "Origan",
//        "Pignon",
//        "Piment",
//        "Poivron",
//        "Poulet",
//        "Poire",
//        "Pomme",
//        "Persil",
//        "Poulet",
//        "Poulet mariné",
//        "Parmesan",
//        "Pomme de terre",
//        "Pain à burger",
//        "Pain de mie",
//        "Roquefort",
//        "Raclette",
//        "Reblochon",
//        "Salade",
//        "Roquette",
//        "Salade verte",
//        "Saumon",
//        "St-Jacques",
//        "Surimi",
//        "Sauce",
//        "Sucre",
//        "Thon",
//        "Tomate",
//        "Tomate cerise",
//        "Tome de savoie",
//        "Tandoori",
//        "Viande kebab",
//        "Viande hachée",
//        "Vanille"
//    ];
//
//    $ingManager = new IngredientsManager($db);
//
//    foreach ($ingredients as $ingre){
//        $add = new Ingredients([
//            'nom' => $ingre,
//        ]);
//
//        if(!$ingManager->exists($ingre)){
//            $ingManager->add($add);
//        }
//    }