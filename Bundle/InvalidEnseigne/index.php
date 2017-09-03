<?php require('Bundle/InvalidEnseigne/Controller/index.php'); ?>


<html lang="fr">
    <head>
        <!-- METAS -->
        <meta charset="utf-8">

        <!-- TITLE / FAVICON -->
        <title>InvalidEnseigne Eatzem</title>
        <link rel="shortcut icon" href="Upload/Graphisme/Icones/favicon.ico" type="image/x-icon">
        <link rel="icon" href="Upload/Graphisme/Icones/favicon.ico" type="image/x-icon">

        <!-- STYLESHEET -->
        <link rel="stylesheet" href="APP/External/Normalize/normalize.css">
        <link rel="stylesheet" href="Bundle/InvalidEnseigne/Ressources/CSS/base.css">
        <link rel="stylesheet" href="Bundle/InvalidEnseigne/Ressources/CSS/article.css">
        <link rel="stylesheet" href="APP/External/jQueryUI/jquery-ui.css">
        <link rel="stylesheet" href="APP/External/owl_carousel/owl-carousel/owl.carousel.css" />
        <link rel="stylesheet" href="APP/External/owl_carousel/owl-carousel/owl.theme.css" />
        <link rel="stylesheet" href="APP/External/owl_carousel/owl-carousel/owl.transitions.css" />
        <link rel="stylesheet" href="APP/External/fullPage/jquery.fullPage.min.js" />

    </head>
    <body>

    <p class="message">
        L'enseigne demandé n'existe pas
    </p>

    </body>
    <script src="APP/External/jQuery/jquery-3.1.0.min.js"></script>
    <script src="APP/External/jQueryUI/jquery-ui.js"></script>
    <script src="APP/External/fullPage/jquery.fullPage.min.js"></script>
<!--    <script src="APP/External/owl_carousel/owl-carousel/owl.carousel.js" type="text/javascript"></script>-->
    <script src="Bundle/InvalidEnseigne/Ressources/JS/script.js"></script>
    <script src="APP/Widget/wid.pop.selecteurVille.js"></script>
    <?php if($_SESSION['preciseLocation'] == false){ ?>
        <script src="Bundle/InvalidEnseigne/Ressources/JS/localisation.js"></script>
    <?php } ?>
</html>