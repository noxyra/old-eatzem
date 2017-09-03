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
                                <h4 class="title">Ajout d'un produit</h4>
                                <p class="category">Ici, vous pouvez ajouter un produit et recommencer autant de fois que nécéssaire</p>
                            </div>
                            <div class="card-content table-responsive">

                                <form method="post" id="save" action="./?page=enseigne_creator&selectAction=add_produits" enctype="multipart/form-data">

                                                <div class="row-fluid">
                                                    <div class="col-xs-12 col-md-8">
                                                        <div class="form-group">
                                                            <label for="nom">Nom du produit</label>
                                                            <input type="text" class="form-control" id="nom" name="appelation" />
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-4">
                                                        <div class="form-group">
                                                            <label>Image</label><br />
                                                            <label for="image" class="btn btn-default btn-block">Ajouter une image</label>
                                                            <input type="file" class="form-control" style="display: none" accept="Image" id="image" name="imageProduit" />

                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-8">
                                                        <div class="form-group">
                                                            <label for="type">De quel type de produit s'agit-il ?</label>
                                                            <select name="type" id="type" class="form-control">
                                                                <?=TypeProduitTool::genoptionList();?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-4">
                                                        <div class="form-group">
                                                            <label>Ce produit est-il à durée limitée ?</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
<!--                                                                    <input type="checkbox" id="limite" name="activate_dur_lim" />-->
                                                                    <div class="togglebutton">
                                                                        <label>
                                                                            <input type="checkbox" id="limite" name="activate_dur_lim">
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                                <input type="date" class="form-control" name="duree_limite" placeholder="xx/xx/xxxx" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="alert alert-info text-left" role="alert">
                                                            <p>
                                                                <i class="fa fa-info-circle" aria-hidden="true"></i>Pour plus de précision sur votre produit vous pouvez indiquer les ingrédients utilisés.
                                                            </p>
                                                        </div>
                                                        <button class="btn btn-default margin-bot-min" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                            Voir les ingrédients
                                                        </button>
                                                        <div class="collapse" id="collapseExample">
                                                            <div class="well">
                                                                <?=IngredientsTool::genChoiceList($db);?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" id="selector">
                                                    <div class="col-xs-12">
                                                        <p class="alert alert-info">
                                                            Si ce produit existe en plusieurs formats, cliquez sur  "ajouter un format", un prix par format vous sera proposé.<br />
                                                            Sinon, cliquez simplement sur "ajouter un prix".
                                                        </p>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6" style="margin-bottom: 10px;">
                                                        <span id="ajouter_formats" class="btn btn-success btn-block">Ajouter un format</span>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">
                                                        <span id="ajouter_prix" class="btn btn-success btn-block">Ajouter un prix</span>
                                                    </div>
                                                </div>

                                                <div class="row" id="content-items">
                                                    <!-- GENERER CONTENU JS ICI -->
                                                </div>

                                                <div class="row" id="format-supp-cont" style="display: none">
                                                    <div class="col-xs-12">
                                                        <span class="btn btn-success btn-block" id="format-supp">Ajouter un format</span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-12 col-md-4">
                                                        <a class="btn btn-danger btn-block" name="" value="Continuer" href="./?page=enseigne_creator&selectAction=add_menus">Continuer</a>
                                                    </div>
                                                    <div class="col-xs-12 col-md-4" style="margin-bottom: 10px;">
                                                        <input id="cont" type="submit" class="btn btn-warning btn-block" name="" value="Sauvegarder et continuer" />
                                                    </div>
                                                    <div class="col-xs-12 col-md-4">
                                                        <input id="restart" type="submit" class="btn btn-success btn-block" name="" value="Sauvegarder et ajouter nouveau" />
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
<script src="Bundle/EnseigneFacilitor/Ressources/JS/product_add.js"></script>
<script src="Bundle/__BASE_ELEM_PRO/JS/valideForm.js"></script>
<script>
    $("#cont").click(function(e){
        e.preventDefault();
        resetAlert();
        valide = true;

        if(checkTextInput($("#nom"), 3, 100, true) == false){ valide = false };

        if(valide == true){
            $("#save").append("<input type='hidden' name='ajout_prod_continue' value='on'>");
            $("#save").submit();
        }
    });
    $("#restart").click(function(e){
        e.preventDefault();
        resetAlert();
        valide = true;

        if(checkTextInput($("#nom"), 3, 100, true) == false){ valide = false };

        if(valide == true){
            $("#save").append("<input type='hidden' name='ajout_prod_and_new' value='on'>");
            $("#save").submit();
        }
    });
</script>
</html>