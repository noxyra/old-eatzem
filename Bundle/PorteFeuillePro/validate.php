<!doctype html>
<html lang="fr">
<head>
    <?php require('Bundle/__BASE_ELEM_PRO/PHP/metas.php'); ?>
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
                                <h4 class="title">Récapitulatif de votre commande</h4>
                                <p class="category">Après cette étape vous serez redirigé vers paypal</p>
                            </div>
                            <div class="card-content table-responsive">


                                        <h3>Récapitulatif de votre commande</h3>

                                    <div class="list-group">
                                        <div class="list-group-item">
                                            Produit sélectionné : <span class="badge"><?=ucfirst($productName);?></span>
                                        </div>
                                        <div class="list-group-item">
                                            Prix total : <span class="badge"><?=$coins;?>€</span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        Vous déclarez avoir lu et accepté les <a href="./?page=cgv" target="_blank">C.G.V.</a> : <input type="checkbox" id="cgv_check"/>
                                    </div>
                                    <div>
                                        <a class="btn btn-success pull-right disabled" href="<?=$paypal_url;?>" id="conf_paiement">Confirmer</a>
                                    </div>
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

<!--  Charts Plugin -->
<script src="Bundle/__BASE_ELEM_PRO/TimAssets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="Bundle/__BASE_ELEM_PRO/TimAssets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Material Dashboard javascript methods -->
<script src="Bundle/__BASE_ELEM_PRO/TimAssets/js/material-dashboard.js"></script>

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