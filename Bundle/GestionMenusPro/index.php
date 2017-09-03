<?php require('Bundle/GestionMenusPro/Controller/index.php'); ?>

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
                                <h4 class="title">Gestion des menus</h4>
                            </div>

                            <div class="card-content">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 space-top space-bottom text-right">
                                    <a type="button" href="./?page=ajout_menus" class="btn btn-primary">Ajouter un menu</a>
                                </div>
                            </div>
                            <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-danger">
                                        <th>Gestion</th>
                                        <th>Nom</th>
                                        <th>Prix</th>
                                        </thead>
                                        <?php foreach($MenList as $v){ ?>
                                            <tr>
                                                <td class="text-center min_gest">
                                                    <a type="button" class="btn btn-danger" href="./?page=gestion_menus&delete_id=<?=$v->id();?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    <a type="button" class="btn btn-warning" href="./?page=editer_menus&men_id=<?=$v->id();?>"><i class="fa fa-cog" aria-hidden="true"></i></a>
                                                    <a type="button" class="btn btn-default" href="./?page=editer_menus_format&men_id=<?=$v->id();?>"><i class="fa fa-link" aria-hidden="true"></i> Formats</a>
                                                </td>
                                                <td><?=$v->nom();?></td>
                                                <td><?=$v->prix();?> €</td>

                                            </tr>
                                        <?php } ?>
                                    </table>
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