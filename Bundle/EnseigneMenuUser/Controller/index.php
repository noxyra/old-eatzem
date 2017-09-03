<?php

    $EnsManager = new EnseigneManager($db);
    $MenManager = new MenuManager($db);
    $ForManager = new FormatManager($db);
    $ProManager = new ProduitsManager($db);


    $prepare_enseigne = $EnsManager->getByUrl($get['enseigne']);
    $current_enseigne = $EnsManager->getWithDist($prepare_enseigne->id(), $_SESSION['localisationVisiteur']['lat'], $_SESSION['localisationVisiteur']['lon']);

    $MenuList = $EnsManager->getListMenu($current_enseigne);

    // PREPARATION DU TABLEAU CONTENANT MENU + FORMATS
    $datatab = [];

    foreach ($MenuList as $menu){
        $completeFormatArray = [];

        $assocFormat = $MenManager->getFormatsList($menu);

        $formats = [];

        foreach($assocFormat as $linkFormats){
            $formats[] = $ForManager->get($linkFormats->format_id());
        }

        foreach ($formats as $format){
//            var_dump($format);
            $assocProd = $ProManager->get($format->produits_id());


            $completeFormatArray[] = [
                'imagePath' => ImageTools::pathProduitsPic($assocProd),
                'nameProd' => $assocProd->appelation(),
                'objFormat' => $format
            ];

        }

        $array = [
            'menu' => $menu,
            'assocFormats' => $completeFormatArray
        ];

        $datatab[] = $array;
    }
?>