<?php require('Bundle/GestionProduitsPro/Controller/index.php'); ?>

<!doctype html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="APP/External/FontAwesome/css/font-awesome.min.css">
    <?php require('Bundle/__BASE_ELEM_PRO/PHP/metas.php'); ?>
    <link rel="stylesheet" href="APP/Widget/wid.prod.affiche.css">
</head>

<body>

<div class="wrapper">
    <?php require('Bundle/__BASE_ELEM_PRO/PHP/nav.php'); ?>

    <div class="main-panel">
        <?php require('Bundle/__BASE_ELEM_PRO/PHP/topBar.php'); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" data-background-color="red">
                                <h4 class="title">Gestion des produits</h4>
<!--                                <p class="category">Here is a subtitle for this table</p>-->
                            </div>

                            <div class="card-content">
                                <div class="text-right">
                                    <a type="button" title="Créer un produits" href="./?page=ajout_produits" class="btn btn-primary text-right">Créer un produit</a>
                                </div>
                            </div>

                            <div class="card-content table-responsive">
                                <div class="row">
                                    <?php $pro_mode = true; foreach($ProList as $produit){ ?>
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <?php require('APP/Widget/wid.prod.affiche.php'); ?>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require('Bundle/__BASE_ELEM_PRO/PHP/footer.php'); ?>

    </div>
</div>

</body>

<!--   Core JS Files   -->
<script src="Bundle/__BASE_ELEM_PRO/TimAssets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="Bundle/__BASE_ELEM_PRO/TimAssets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="Bundle/__BASE_ELEM_PRO/TimAssets/js/material.min.js" type="text/javascript"></script>

<script type="text/javascript" src="Bundle/__BASE_ELEM_PRO/MaterialKit/assets/js/nouislider.min.js"></script>
<script type="text/javascript" src="Bundle/__BASE_ELEM_PRO/MaterialKit/assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="Bundle/__BASE_ELEM_PRO/MaterialKit/assets/js/material-kit.js"></script>


<script src="Bundle/__BASE_ELEM_PRO/JS/script.js"></script>
<script>
    $(function(){
        $('[data-toggle="popover"]').popover({
            trigger: "hover"
        });
    });
</script>
</body>
</html>