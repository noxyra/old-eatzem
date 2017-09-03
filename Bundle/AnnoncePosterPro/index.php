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
                                <h4 class="title">Poster une annonce</h4>
                            </div>
                            <div class="card-content">

                                <div class="panel" style="margin-top: 20px;">
                                    <form class="form panel-body" method="post" action="./?page=poster_annonce" id="save">
                                        <div class="form-group">
                                            <label for="enseigne">Pour quelle enseigne voulez vous poster une annonce ?</label>
                                            <select class="form-control" name="enseigne" id="enseigne">
                                                <?=$options;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="titre">Titre de l'annonce :</label>
                                            <input type="text" name="titre" id="titre" class="form-control" placeholder="Titre..." />
                                        </div>
                                        <div class="form-group">
                                            <label for="contenu">Contenu de l'annonce :</label>
                                            <textarea class="form-control" name="contenu" id="contenu"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="distmax">Distance de visibilité / Prix</label>
                                            <select class="form-control" name="distmax" id="distmax">
                                                <option value="2">2Km / 2 Crédits</option>
                                                <option value="4">4Km / 4 Crédits</option>
                                                <option value="8">8Km / 8 Crédits</option>
                                                <option value="16">16Km / 16 Crédits</option>
                                                <option value="32">32Km / 32 Crédits</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="poster" class="btn btn-success btn-block" value="envoyer" id="envoyer" />
                                        </div>
                                    </form>
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
<script src="Bundle/__BASE_ELEM_PRO/JS/valideForm.js"></script>
<script>
    $("#envoyer").click(function(e){
        e.preventDefault();
        resetAlert();

        valide = true;

        if(checkSelectInput($("#enseigne"), true) == false){ valide = false };
        if(checkTextInput($("#titre"), 10, 255, true) == false){ valide = false };
        if(checkTextInput($("#contenu"), 50, 500, true) == false){ valide = false; };

        if(valide == true){
            $("#save").submit();
        }
    });
</script>
</html>