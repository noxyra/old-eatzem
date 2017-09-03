<?php require('Bundle/Accueil/Controller/index.php'); ?>


<html lang="fr">
    <head>
        <!-- METAS -->
        <meta charset="utf-8">

        <!-- TITLE / FAVICON -->
        <title>Accueil Eatzem</title>
        <link rel="shortcut icon" href="Upload/Graphisme/Icones/favicon.ico" type="image/x-icon">
        <link rel="icon" href="Upload/Graphisme/Icones/favicon.ico" type="image/x-icon">

        <!-- STYLESHEET -->
        <link rel="stylesheet" href="APP/External/Normalize/normalize.css">
        <link rel="stylesheet" href="Bundle/Accueil/Ressources/CSS/base.css">
        <link rel="stylesheet" href="Bundle/Accueil/Ressources/CSS/article.css">
        <link rel="stylesheet" href="APP/External/jQueryUI/jquery-ui.css">
        <link rel="stylesheet" href="APP/External/owl_carousel/owl-carousel/owl.carousel.css" />
        <link rel="stylesheet" href="APP/External/owl_carousel/owl-carousel/owl.theme.css" />
        <link rel="stylesheet" href="APP/External/owl_carousel/owl-carousel/owl.transitions.css" />
        <link rel="stylesheet" href="APP/External/fullPage/jquery.fullPage.min.js" />

    </head>
    <body>
    <?php require('APP/Widget/wid.pop.selecteurVille.php');?>
    <div id="fullpage">
        <div class="section" id="firstPage">
            <header id="principal">
                <div id="logozone">
                    <img id="logosite" alt="logo site" src="Upload/Graphisme/Logo/eatzem_big.png"/>
                </div>
            </header>

<!--            <div id="backgroundblock">-->
                <nav id="nav_bar">
                    <div class="center_menu_block">
                        <a title="Enseigne choisit au hasard près de chez vous" class="linker_nav" href="./?page=aleatoire_local"><img src="Upload/Graphisme/Icones/dice_white.png" alt="recherche aléatoire" class="mini_icon_button" /></a>
                        <a title="Enseignes par les mieux notées proche de chez vous" class="linker_nav" href="#"><img src="Upload/Graphisme/Icones/location_white.png" alt="recherche localisé" class="mini_icon_button" /><span class="text_button">Qu'es-ce qu'on mange ?</span></a>
                        <a title="Recherche avancée" class="linker_nav" href="#"><img src="Upload/Graphisme/Icones/search_white.png" alt="recherche avancée" class="mini_icon_button" /></a>
                    </div>
                </nav>
                <section id="main_section">
                    <div class="big_value">
                        <h1 class="text_value">Manger, simplement et rapidement</h1>
                    </div>
                    <div class="resum_text">
                        La faim n'attend pas !<br />
                        Avec Earzem, manger n'aura jamais été aussi simple. Finis les menus papiers, les pertes de temps sur des sites internet incomplets ou au téléphone. Trouver rapidement et en toute simplicité ce qui vous fait envie et bon appétit !
                    </div>
                </section>
<!--            </div>-->
        </div>
        <div class="section format_place" id="secondPage">
            <div class="enseigne_proximite">
                <header class="header_article">
                    <h3 class="titre_article">
                        Enseignes à proximité
                    </h3>
                </header>
                <div id="content_enseigne_item">
                    <?php foreach($ProxList as $v){
                        include('APP/Widget/wid.ens.affiche.php');
                     } ?>
                </div>
            </div>
        </div>
    </div>


        <footer id="principal_footer">
            <div class="left_zone">
                <a rel="canonical" href="./?page=espace_pro" title="Espace pro">Pro ?</a>
                <a rel="canonical" href="#" title="A propos">À propos</a>
                <a rel="canonical" href="#" title="Foire aux questions">F.A.Q</a>
                <a rel="canonical" href="#" title="Fonctionnement du site">Fonctionnement</a>
                <a rel="canonical" href="#" title="Conditions générales d'utilisation">C.G.U</a>

            </div>
            <div class="right_zone">
                <a rel="canonical" href="#" title="Changer de ville" id="oc_ville_selector"><img class="icon_footer" alt="icone selecteur de ville" src="Upload/Graphisme/Icones/geolocation_white.png"/></a>
            </div>
        </footer>

    </body>
    <script src="APP/External/jQuery/jquery-3.1.0.min.js"></script>
    <script src="APP/External/jQueryUI/jquery-ui.js"></script>
    <script src="APP/External/fullPage/jquery.fullPage.min.js"></script>
<!--    <script src="APP/External/owl_carousel/owl-carousel/owl.carousel.js" type="text/javascript"></script>-->
    <script src="Bundle/Accueil/Ressources/JS/script.js"></script>
    <script src="APP/Widget/wid.pop.selecteurVille.js"></script>
    <?php if($_SESSION['preciseLocation'] == false){ ?>
        <script src="Bundle/Accueil/Ressources/JS/localisation.js"></script>
    <?php } ?>
</html>