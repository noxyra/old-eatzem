<?php require('Bundle/AjoutHorairesPro/Controller/index.php'); ?>

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
                                <h4 class="title">Ajouter une plage horaire</h4>
<!--                                <p class="category">Here is a subtitle for this table</p>-->
                            </div>
                            <div class="card-content">

                                <form method="post" action="./?page=ajout_horaires">

                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="jour">Jour concerné :</label>
                                            <select name="jour" id="jour" class="form-control">
                                                <option value="LUN">Lundi</option>
                                                <option value="MAR">Mardi</option>
                                                <option value="MER">Mercredi</option>
                                                <option value="JEU">Jeudi</option>
                                                <option value="VEN">Vendredi</option>
                                                <option value="SAM">Samedi</option>
                                                <option value="DIM">Dimanche</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="heureO">heure d'ouverture :</label>
                                            <select name="heureO" id="heureO" class="form-control">
                                                <?=TimeToolBox::prOptionHor();?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="heureF">heure de fermeture :</label>
                                            <select name="heureF" id="heureF" class="form-control">
                                                <?=TimeToolBox::prOptionHor();?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="form-group text-right">
                                            <input type="submit" class="btn btn-success" name="add_horaires" value="Ajouter l'horaire" />
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
</html>
