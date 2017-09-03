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
                                <h4 class="title">Remplissez vos horaires d'ouverture</h4>
<!--                                <p class="category">Here is a subtitle for this table</p>-->
                            </div>
                            <div class="card-content table-responsive">

                                <form method="post" action="./?page=enseigne_creator&selectAction=add_horaires" enctype="multipart/form-data">

                                    <h4 class="text-center space-bottom space-top">Lundi</h4>

                                    <div class="row">

                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>De :</label>
                                                <select class="form-control" name="LUN_P1_MIN"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>à :</label>
                                                <select class="form-control" name="LUN_P1_MAX"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Et de :</label>
                                                <select class="form-control" name="LUN_P2_MIN"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>à :</label>
                                                <select class="form-control" name="LUN_P2_MAX"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                    </div>

                                    <hr>

                                    <h4 class="text-center space-bottom space-top">Mardi</h4>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>De</label>
                                                <select class="form-control" name="MAR_P1_MIN"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>à</label>
                                                <select class="form-control" name="MAR_P1_MAX"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Et de</label>
                                                <select class="form-control" name="MAR_P2_MIN"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>à</label>
                                                <select class="form-control" name="MAR_P2_MAX"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                    </div>

                                    <hr>

                                    <h4 class="text-center space-bottom space-top">Mercredi</h4>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>De</label>
                                                <select class="form-control" name="MER_P1_MIN"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>à</label>
                                                <select class="form-control" name="MER_P1_MAX"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Et de</label>
                                                <select class="form-control" name="MER_P2_MIN"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>à</label>
                                                <select class="form-control" name="MER_P2_MAX"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center space-bottom space-top">Jeudi</h4>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>De</label>
                                                <select class="form-control" name="JEU_P1_MIN"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>à</label>
                                                <select class="form-control" name="JEU_P1_MAX"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Et de</label>
                                                <select class="form-control" name="JEU_P2_MIN"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>à</label>
                                                <select class="form-control" name="JEU_P2_MAX"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center space-bottom space-top">Vendredi</h4>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>De</label>
                                                <select class="form-control" name="VEN_P1_MIN"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>à</label>
                                                <select class="form-control" name="VEN_P1_MAX"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Et de</label>
                                                <select class="form-control" name="VEN_P2_MIN"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>à</label>
                                                <select class="form-control" name="VEN_P2_MAX"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>

                                    </div>

                                    <hr>

                                    <h4 class="text-center space-bottom space-top">Samedi</h4>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>De</label>
                                                <select class="form-control" name="SAM_P1_MIN"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>à</label>
                                                <select class="form-control" name="SAM_P1_MAX"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Et de</label>
                                                <select class="form-control" name="SAM_P2_MIN"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>à</label>
                                                <select class="form-control" name="SAM_P2_MAX"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center space-bottom space-top">Dimanche</h4>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>De</label>
                                                <select class="form-control danger" name="DIM_P1_MIN"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>à</label>
                                                <select class="form-control" name="DIM_P1_MAX"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Et de</label>
                                                <select class="form-control" name="DIM_P2_MIN"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <label>à</label>
                                                <select class="form-control" name="DIM_P2_MAX"><?=TimeToolBox::prOptionHor();?></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row space-top">
                                        <div class="col-xs-12">
                                            <input type="submit" name="add_horaires" value="Ajouter" class="btn btn-success pull-right" />
                                        </div>
                                    </div>
                                </form>

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

<script src="Bundle/AjoutEnseignePro/Ressources/JS/form.js"></script>
<script src="Bundle/__BASE_ELEM_PRO/JS/script.js"></script>
</html>