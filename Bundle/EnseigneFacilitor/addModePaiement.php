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
                                <h4 class="title">Ajouter un mode de paiement</h4>
                                <p class="category">Ajouter les modes de paiement que vous acceptez, vous pourrez recommencer cette étape autant de fois que nécéssaire</p>
                            </div>
                            <div class="card-content">
                                <form method="post" action="./?page=enseigne_creator&selectAction=add_modePaiement" id="save">
                                    <!-- PARTIE 1 -->
                                    <h4 class="text-center space-bottom">Dénomination</h4>
                                    <!-- NOM MODE PAIEMENT -->
                                    <div class="form-group">
                                        <label for="nom" class="visible-lg visible-md">Nom :</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-eur" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="mode" id="mode" placeholder="Ex : Carte banquaire (min 5€)" />
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <a class="btn btn-danger" name="" value="Continuer" href="./?page=enseigne_creator&selectAction=finish">Continuer</a>
                                        <input class="btn btn-warning" id="cont" type="submit" name="" value="Sauvegarder et finaliser">
                                        <input class="btn btn-success" id="restart" type="submit" name="" value="Sauvegarder et ajouter nouveau">
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
    // Validateur de formulaire
    $("#cont").click(function(e){
        e.preventDefault();
        resetAlert();
        valide = true;

        if(checkTextInput($("#mode"), 1, 255, true) == false){ valide = false };

        if(valide == true){
            $("#save").append("<input type='hidden' name='add_modepaiement_finish' value='on'>");
            $("#save").submit();
        }
    });
    $("#restart").click(function(e){
        e.preventDefault();
        resetAlert();
        valide = true;

        if(checkTextInput($("#mode"), 1, 255, true) == false){ valide = false };

        if(valide == true){
            $("#save").append("<input type='hidden' name='add_modepaiement_and_new' value='on'>");
            $("#save").submit();
        }
    });
</script>
</body>
</html>
