<!doctype html>
<html lang="fr">
<head>
    <!-- METAS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- LINKS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="Bundle/__BASE_ELEM_PRO/CSS/footer_header.css">

    <!-- LINKS -->
<!--    <link rel="stylesheet" href="APP/External/Normalize/normalize.css">-->

<!--    <link rel="stylesheet" href="Bundle/AccueilPro/Ressources/CSS/base.css">-->
<!--    <link rel="stylesheet" href="APP/External/jQueryUI/jquery-ui.css">-->
    <!-- TITLE -->
    <title>Eatzem Pro - Accueil</title>
    <link rel="shortcut icon" href="Upload/Graphisme/Icones/favicon.ico" type="image/x-icon">
    <link rel="icon" href="Upload/Graphisme/Icones/favicon.ico" type="image/x-icon">
</head>
<body>

<?php require('Bundle/__BASE_ELEM_PRO/PHP/header_pro.php');?>

<div class="container-fluid" style="margin: auto; min-height: 100%;">
    <div class="row-fluid">
        <?php require('Bundle/__BASE_ELEM_PRO/PHP/nav_pro.php');?>

        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 space-top">

            <div class="row-fluid">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center space-bottom">

                    <h3>Dashboard</h3>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                    <div class="well well-sm justify">
                        Enseignes
                        <div>
                            <span class="label label-success" style="margin-right: 5px">
                            <?=$ent_man->countOnlineEnseigne($_SESSION['guest_entreprise']);?> / <?=$aboCheck->maxEnseigneOn();?>
                        </span>
                        <span class="label label-default">
                            <?=$ent_man->countEnseignes($_SESSION['guest_entreprise']);?> / <?=$aboCheck->maxEnseigneOff();?>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                    <div class="well well-sm justify">
                        Produits
                        <div>
                            <span class="label label-default">
                                <?=$ent_man->countProduits($_SESSION['guest_entreprise']);?> / <?=$aboCheck->maxProduits();?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<nav id="left_nav">

</nav>



<?php require('Bundle/__BASE_ELEM_PRO/PHP/footer_pro.php');?>


<!-- SCRIPTS -->
<script src="APP/External/jQuery/jquery-3.1.0.min.js"></script>
<script src="APP/External/jQueryUI/jquery-ui.js"></script>
<!--<script src="Bundle/InscriptionPro/Ressources/JS/script.js"></script>-->
</body>
</html>

<style>
    .space-top{
        margin-top: 20px;
    }

    .recolor_head{
        background-color: #343434 !important;
        color: #FFF !important;
        font-size: 18px !important;
        text-align: center;
    }
</style>