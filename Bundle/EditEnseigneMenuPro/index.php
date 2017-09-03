<?php require('Bundle/EditEnseigneMenuPro/Controller/index.php'); ?>

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

                            <div class="card-content">
                                <p class="alert alert-info space-top">
                                    Pour chaque menu que vous souhaitez ajouter à votre enseigne, cliquez sur le bouton "selectionner".<br />
                                    Les menus sélectionnés apparaissent en rouge.
                                </p>
                            </div>

                            <form class="card-content table-responsive" method="post" action="./?page=editer_enseigne_menu&id=<?=$ens_id;?>">
                                    <!-- CONTENT -->
                                    <table class="table">
                                        <thead class="text-danger">
                                            <th>Gestion</th>
                                            <th>Nom</th>
                                            <th>Prix</th>
                                        </thead>

                                        <?php foreach($MenEntList as $v){ ?>
                                            <tr class="line_table">
                                                <td><input type="checkbox" name="<?=$v->id();?>" id="<?=$v->id();?>" <?php if(in_array($v->id(), $MenArray)){ echo 'checked';}?> /><label for="<?=$v->id();?>">Sélectionner</label></td>
                                                <td><?=$v->nom();?></td>
                                                <td><?=$v->prix();?>€</td>
                                            </tr>
                                        <?php } ?>
                                    </table>

                                    <div class="form-group space-top text-right">
                                        <input type="submit" name="maj_menu_enseigne" class="btn btn-success" value="Sauvegarder">
                                    </div>
                            </form>
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
<script src="Bundle/EditEnseigneMenuPro/Ressources/JS/form.js"></script>
</html>