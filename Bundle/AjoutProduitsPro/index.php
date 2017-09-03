<?php require('Bundle/AjoutProduitsPro/Controller/index.php'); ?>

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
                                <h4 class="title">Ajouter un produit</h4>
<!--                                <p class="category">Here is a subtitle for this table</p>-->
                            </div>
                            <div class="card-content">

                                <form method="post" action="./?page=ajout_produits" enctype="multipart/form-data" id="save">
                                    <!-- NOM PRODUIT -->
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="applelation" class="visible-lg visible-md">Nom :</label>
                                            <input type="text" class="form-control" id="appelation" name="appelation" placeholder="Nom de votre produit">
                                        </div>
                                    </div>

                                    <!-- IMAGE PRODUIT -->
                                    <div class="col-xs-12">
                                        <div class="form-group text-right">
                                            <label for="image"><span class="btn btn-success"><i class="fa fa-picture-o" aria-hidden="true"></i> Ajouter une image</label>
                                            <input type="file" name="imageProduit" style="display: none;" id="image" accept="image/*" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="alert alert-warning text-left" role="alert">
                                            <p>
                                                <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Pourquoi choisir une image ?</strong><br /><br />
                                                C'est une affaire de pertinence des données, un produit associé a une image sera toujours plus attrayant qu'un simple "post-it".
                                            </p>
                                        </div>
                                    </div>

                                    <!-- TYPE DE PRODUIT -->

                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="type">Type du produit :</label>
                                            <select type="select" class="form-control" name="type" id="type">
                                                <?=TypeProduitTool::genoptionList();?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- LIMITED -->

                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="durlim">Devons-nous limiter la durée de ce produit ?</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <div class="togglebutton">
                                                        <label>
                                                            <input type="checkbox" name="activate_dur_lim" id="activate_dur_lim">
                                                        </label>
                                                    </div>
<!--                                                    <input type="checkbox">-->
                                                </span>
                                                <input type="date" id="durlim" name="duree_limite" class="pickdate form-control" placeholder="Date de fin, format : jj/mm/aaaa">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="alert alert-danger text-left" role="alert">
                                            <p>
                                                <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Attention !</strong><br /><br />
                                                En cochant la case ci-dessus, votre produit sera automatiquement supprimé lors de son expiration.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="alert alert-info text-left" role="alert">
                                            <p>
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>Pour plus de précision sur votre produit vous pouvez indiquer les ingrédients utilisés.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="form-group text-right">
                                            <span class="btn btn-success activator_ing" id="activator_ing_id"><span class="fa fa-plus" aria-hidden="true"> Ingrédients</span></span>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div id="content_ing_picker" style="display: none">
                                            <fieldset>
                                                <legend>Nos ingrédients</legend>
                                                <p class="form_line_textarea">
                                                    <?=IngredientsTool::genChoiceList($db);?>
                                                </p>
                                            </fieldset>
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
<script src="Bundle/__BASE_ELEM_PRO/TimAssets/js/bootstrap-datepicker.js"></script>

<script src="Bundle/__BASE_ELEM_PRO/JS/script.js"></script>
<script src="Bundle/__BASE_ELEM_PRO/JS/valideForm.js"></script>
<script>
    $("#envoyer").click(function(e){
        e.preventDefault();
        resetAlert();

        valide = true;

        if(checkTextInput($("#appelation"), 3, 80, true) == false){ valide = false };
        if(checkSelectInput($("#type"), true) == false){ valide = false };

        if(valide == true){
            $("#save").submit();
        }
    });
</script>
<script>
    $(function(){
        $('#activator_ing_id').click(function() {
            $('#content_ing_picker').toggle();
        });

        $('.pickdate').datepicker({
            weekStart:1,
            format: "dd/mm/yyyy"
        });
    });
</script>
</html>