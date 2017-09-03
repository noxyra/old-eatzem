<?php require('Bundle/AjoutMenusPro/Controller/index.php'); ?>

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
                                <h4 class="title">Ajouter un menu</h4>
<!--                                <p class="category">Here is a subtitle for this table</p>-->
                            </div>
                            <div class="card-content">

                                <form method="post" action="./?page=ajout_menus" id="save">
                                    <!-- PARTIE 1 -->
                                    <h4 class="text-center space-bottom">Dénomination</h4>
                                    <!-- NOM MENU -->
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="nom" class="visible-lg visible-md">Nom :</label>
                                            <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom du menu" />
                                        </div>
                                    </div>

                                    <!-- DESCRIPTION MENU -->
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="description" class="visible-lg visible-md">Description :</label>
                                            <textarea class="form-control" rows="3" id="description" name="description" placeholder="Décrivez votre menu [Cette case est optionnelle]"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="alert alert-info text-left" role="alert">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            La description n'est pas obligatoire, cependant elle peut aider au référencement de votre enseigne et attirer de nouveaux clients
                                        </div>
                                    </div>

                                    <!-- CONDITIONS -->
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="conditions" class="visible-lg visible-md">Souhaitez vous spécifier des conditions pour ce menu ?</label>
                                            <textarea name="conditions" class="form-control" id="conditions" placeholder="Conditions pour ce menu [Cette case est optionnelle]"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="alert alert-info text-left" role="alert">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            Les conditions ne sont pas obligatoires, mais elles peuvent servir à prévenir les utilisateur que leurs accès est règlementé.
                                        </div>
                                    </div>

                                    <!-- PRIX -->
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="prix">Quel-est le prix de ce menu ?</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="prix" name="prix" placeholder="prix" />
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

        if(checkTextInput($("#nom"), 3, 45, true) == false){ valide = false };
        if(checkTextInput($("#description"), 3, 1500, false) == false){ valide = false };
        if(checkTextInput($("#conditions"), 3, 1500, false) == false){ valide = false };
        if(checkTextInput($("#prix"), 1, 100, true) == false){ valide = false };

        if(valide == true){
            $("#save").submit();
        }
    });
</script>
</html>
