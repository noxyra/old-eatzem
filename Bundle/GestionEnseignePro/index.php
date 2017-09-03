<?php require('Bundle/GestionEnseignePro/Controller/index.php'); ?>

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
                                <h4 class="title">Gestion des enseignes</h4>
                            </div>
                            <div class="card-content table-responsive">

                                <div class="row">
                                    <div class="col-xs-12 text-right">
                                        <a type="button" href="./?page=ajout_enseigne" class="btn btn-success">Ajouter une enseigne</a>
                                    </div>
                                    <div class="text-center col-xs-12">

                                        <?php foreach($EnsList as $v){ ?>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" style="display: flex;justify-content: flex-end; flex-wrap: wrap">
                                                            <a class="btn btn-default btn-tooltip" data-toggle="tooltip" data-placement="bottom" data-original-title="Editer l'enseigne" href="./?page=editer_enseigne&id=<?=$v->id();?>"><span class="fa fa-cog" aria-hidden="true"></span></a>
                                                            <a class="btn btn-default btn-tooltip" data-toggle="tooltip" data-placement="bottom" data-original-title="Modifier les horaires" href="./?page=editer_enseigne_horaires&id=<?=$v->id();?>"><i class="material-icons">schedule</i></a>
                                                            <a class="btn btn-default btn-tooltip" data-toggle="tooltip" data-placement="bottom" data-original-title="Modifier les modes de paiement" href="./?page=editer_enseigne_paiement&id=<?=$v->id();?>"><i class="material-icons">credit_card</i></a>
                                                            <a class="btn btn-default btn-tooltip" data-toggle="tooltip" data-placement="bottom" data-original-title="Modifier les menus" href="./?page=editer_enseigne_menu&id=<?=$v->id();?>"><i class="material-icons">class</i></a>
                                                            <a class="btn btn-default btn-tooltip" data-toggle="tooltip" data-placement="bottom" data-original-title="Modifier les produits" href="./?page=editer_enseigne_produits&id=<?=$v->id();?>"><i class="material-icons">label</i></a>
                                                            <a title="Suppression de l'enseigne" class="suppress_button btn btn-danger btn-tooltip" data-toggle="tooltip" data-placement="bottom" data-original-title="Supprimer l'enseigne" href="./?page=gestion_enseigne&delete_id=<?=$v->id();?>"><span class="fa fa-trash" aria-hidden="true"></span></a>
                                                    </div>
                                                    <div class="panel-body centerize">
                                                        <?=EnseigneCreator::HEADER($v);?>
                                                    </div>
                                                    <div class="panel-body text-center">
                                                        <?php
                                                        if($v->online() == 1){
                                                            echo "<span style=\"color:#449d44\">En ligne</span><br /><br /><a href='./?page=gestion_enseigne&desactive_id=".$v->id()."' class='btn btn-danger'>Passer hors ligne</a>";
                                                        }else{
                                                            echo "<span style=\"color:#32b0d5\">Non publié</span><br /><br /><a href='./?page=gestion_enseigne&active_id=".$v->id()."' class='btn btn-success'>Passer en ligne</a>";
                                                        }
                                                        ?>
                                                        <a href="http://eatzem.fr/?enseigne=<?=$v->url();?>" class="btn btn-info">Prévisualiser</a>
                                                    </div>
                                                    <div class="panel-body text-center border-bottom" style="color: #222;">
                                                        http://eatzem.fr/?enseigne=<?=$v->url();?><br /><br />
                                                    </div>

                                                </div>
                                        <?php } ?>
                                    </div>
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

</html>