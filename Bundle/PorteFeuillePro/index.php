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
                                <h4 class="title">Approvisionnement du portefeuille</h4>
                                <p class="category">Le portefeuille vous permet de poster des annonces</p>
                            </div>
                            <div class="card-content table-responsive">

                                <?php if(isset($error_abo) or isset($success_abo)){ ?>
                                    <div class="row-fluid">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center space-bottom">

                                            <?php if(isset($error_abo)){ ?>
                                                <p class="alert alert-danger">
                                                    <!-- ICONE -->
                                                    <?=$error_abo;?>
                                                </p>
                                            <?php } ?>

                                            <?php if(isset($success_abo)){ ?>
                                                <p class="alert alert-success">
                                                    <!-- ICONE -->
                                                    <?=$success_abo;?>
                                                </p>
                                            <?php } ?>
                                        </div>

                                    </div>
                                <?php } ?>

                                <div class="row-fluid">
                                    <div class="col-xs-12 text-center panel" style="padding: 0px;">
                                        <div class="panel-heading">
                                            <h3>
                                                Vos crédits actuels
                                            </h3>
                                        </div>
                                        <div class="panel-body text-center" style="font-size: 34px; color: #5cb85c">
                                            <?=$_SESSION['guest_entreprise']->coins();?> Crédits
                                        </div>
                                        <div class="panel-body" style="margin: 0px; padding: 0px;">
                                            <form action="./?page=portefeuille_pro" method="post" style="margin: 0px;">
                                                <div class="form-group">
                                                    <label for="selected">Voulez vous recharger vos crédits ( 2 minimum, 50 maximum. 1€ est égal à un crédit) ?</label>
                                                    <input type="number" name="selected" id="selected" class="form-control" value="2" min="2" max="50" />
                                                </div>
                                                <input type="submit" name="acheter" value="Commander" class="btn btn-success btn-block" />
                                            </form>
                                        </div>
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
</html>