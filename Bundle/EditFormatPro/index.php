<?php require('Bundle/EditFormatPro/Controller/index.php'); ?>

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
                                <h4 class="title">Simple Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="card-content table-responsive">

                                <form method="post" action="./?page=editer_format&form_id=<?=$toUp->id();?>" enctype="multipart/form-data" id="save">
                                    <h3 class="text-center space-bottom">Edition d'un format</h3>

                                    <div class="form-group">
                                        <label for="format" class="visible-lg visible-md">Format :</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-bookmark" aria-hidden="true"></i></span>
                                            <input type="text" name="format" id="format" class="form-control" value="<?=$toUp->format();?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="unite" class="visible-lg visible-md">Jour concerné :</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-bookmark" aria-hidden="true"></i></span>
                                            <select name="unite" id="unite" class="form-control">
                                                <?=TypeFormatTool::genCheckOptionList($toUp->unite());?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="prix" class="visible-lg visible-md">Prix :</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-bookmark" aria-hidden="true"></i></span>
                                            <input type="text" name="prix" id="prix" class="form-control" value="<?=$toUp->prix();?>" />
                                        </div>
                                    </div>

                                    <!--                <div class="form-group">-->
                                    <!--                    <label for="prom" class="visible-lg visible-md">Voulez vous appliquer une promotion ? :</label>-->
                                    <!--                    <div class="input-group">-->
                                    <!--                        <span class="input-group-addon"><i class="fa fa-bookmark" aria-hidden="true"></i></span>-->
                                    <!--                        <input type="text" name="prom" id="prom" class="form-control" value="--><?//=$toUp->promotion();?><!--" />-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!---->
                                    <!--                <div class="form-group">-->
                                    <!--                    <label for="fin_promotion" class="visible-lg visible-md">Date de fin de promotion :</label>-->
                                    <!--                    <div class="input-group">-->
                                    <!--                        <span class="input-group-addon"><i class="fa fa-bookmark" aria-hidden="true"></i></span>-->
                                    <!--                        <input type="text" name="fin_promotion" id="fin_promotion" class="form-control" value="--><?//=$toUp->fin_promotion();?><!--" />-->
                                    <!--                    </div>-->
                                    <!--                </div>-->

                                    <div class="form-group text-right">
                                        <input type="submit" class="btn btn-success" name="" id="envoyer" value="sauvegarder" />
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

<script src="Bundle/__BASE_ELEM_PRO/JS/script.js"></script>
<script src="Bundle/__BASE_ELEM_PRO/JS/valideForm.js"></script>
<script>
    $("#envoyer").click(function(e){
        e.preventDefault();
        resetAlert();

        valide = true;

        if(checkTextInput($("#format"), 1, 20, true) == false){ valide = false };
        if(checkSelectInput($("#unite"), true) == false){ valide = false };
        if(checkTextInput($("#prix"), 1, 10, true) == false){ valide = false };

        if(valide == true){
            $("#save").submit();
        }
    });
</script>

</html>