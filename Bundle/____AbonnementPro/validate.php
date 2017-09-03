<!doctype html>
<html lang="fr">
<head>
    <!-- METAS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- LINKS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="APP/External/FontAwesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="Bundle/__BASE_ELEM_PRO/CSS/footer_header.css">

    <!-- LINKS -->



    <!-- TITLE -->
    <title>Eatzem Pro - Accueil</title>
    <link rel="shortcut icon" href="Upload/Graphisme/Icones/favicon.ico" type="image/x-icon">
    <link rel="icon" href="Upload/Graphisme/Icones/favicon.ico" type="image/x-icon">
</head>
<body>

<?php require('Bundle/__BASE_ELEM_PRO/PHP/header_pro.php');?>

<div class="container-fluid" id="main_container">
    <div class="row-fluid">
        <?php require('Bundle/__BASE_ELEM_PRO/PHP/nav_pro.php');?>

        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 space-top">

            <div class="panel">

                <div class="panel-heading text-center">
                    <h3>Récapitulatif de votre commande</h3>
                </div>
                <div class="list-group">
                    <div class="list-group-item">
                        Abonnement sélectionné : <span class="badge"><?=ucfirst($product['name']);?> = <?php if($_SESSION['guest_entreprise']->beta() == 1){ echo $product['prixBeta']; }else{ echo $product['prixMois']; } ?> € par mois</span>
                    </div>
                    <div class="list-group-item">
                        Durée : <span class="badge"><?=$duree;?> mois</span>
                    </div>

                    <?php if($total['remise'] != 0){ ?>
                    <div class="list-group-item">
                        Remise d'upgrade : <span class="badge"><?=$total['remise'];?>€</span>
                    </div>
                    <?php } ?>
                    <div class="list-group-item">
                        Prix total : <span class="badge"><?=$total['finalPrice'];?>€</span>
                    </div>
                </div>
                <div class="panel-body text-right">
                    Vous déclarez avoir lu et accepté les <a href="./?page=cgv" target="_blank">CGV</a> : <input type="checkbox" id="cgv_check"/>
                </div>
                <div class="panel-body">
                    <a class="btn btn-success pull-right disabled" href="<?=$paypal_url;?>" id="conf_paiement">Confirmer</a>
                </div>
            </div>
        </div>
    </div>
</div>




<?php require('Bundle/__BASE_ELEM_PRO/PHP/footer_pro.php');?>


<!-- SCRIPTS -->
<script src="APP/External/jQuery/jquery-3.1.0.min.js"></script>
<!--<script src="APP/External/jQueryUI/jquery-ui.js"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="Bundle/__BASE_ELEM_PRO/JS/script.js"></script>
<script>
    $(function(){
        $("#cgv_check").click(function(){
            cgv = $("#cgv_check");
            if(cgv.is(':checked')){
                $("#conf_paiement").removeClass("disabled");
            }
            else{
                $("#conf_paiement").addClass("disabled");
            }
        });
    });
</script>
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