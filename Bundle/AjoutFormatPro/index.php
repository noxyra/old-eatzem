<?php require('Bundle/AjoutFormatPro/Controller/index.php'); ?>

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
                                <h4 class="title">Création d'un format</h4>
<!--                                <p class="category"></p>-->
                            </div>
                            <div class="card-content">
                                <form method="post" action="./?page=ajout_format&prod_id=<?=$produit->id();?>" enctype="multipart/form-data" id="save">
                                    <div class="col-xs-12">
                                        <input type="hidden" name="produits_id" value="<?=$produit->id();?>"/>
                                    </div>
                                    <!-- FORMAT PRODUIT -->
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="format" class="visible-lg visible-md">Format :</label>
                                            <input type="text" class="form-control" id="format" name="format" placeholder="Quel format ?">
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="alert alert-info">
                                            Si vous souhaitez seulement indiquer un prix, mettez un "/" dans ce champ, et laissez "n/a" dans le champ unité
                                        </div>
                                    </div>

                                    <!-- UNITE FORMAT -->
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="unite" class="visible-lg visible-md">Unité :</label>
                                            <select type="select" name="unite" id="unite" class="form-control">
                                                <?=TypeFormatTool::genoptionList();?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- FORMAT PRODUIT -->
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="prix" class="visible-lg visible-md">Prix :</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="prix" name="prix" placeholder="Quel prix ?">
                                                <span class="input-group-addon"><i class="fa fa-eur" aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="form-group text-right">
                                            <input class="btn btn-success" id="envoyer" type="submit" name="" value="sauvegarder">
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