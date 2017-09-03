<?php require('Bundle/EditMenusFormatPro/Controller/index.php'); ?>


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
                                    Pour chaque format que vous souhaitez ajouter à votre menu, cliquez sur le bouton sélectionner.<br />
                                    Les formats sélectionnés apparaissent en rouge.
                                </p>
                            </div>

                            <form class="card-content table-responsive" method="post" action="./?page=editer_menus_format&men_id=<?=$men_id;?>">
                                    <!-- CONTENT -->
                                    <table class="table">
                                        <thead class="text-danger">
                                        <th>Sélection</th>
                                        <th>Produit</th>
                                        <th>Format</th>
                                        <th>Unité</th>
                                        </thead>
                                        <?php foreach($FormEntList as $v){ ?>
                                            <tr>
                                                <td><input type="checkbox" name="<?=$v->id();?>" id="<?=$v->id();?>" <?php if(in_array($v->id(), $FormArray)){ echo 'checked';}?> /><label for="<?=$v->id();?>">Sélectionner</label></td>
                                                <td class="text-left padding5px"><?=ProduitsEditor::getName($v->produits_id(), $db);?></td>
                                                <td><?=$v->format();?></td>
                                                <td><?=TypeFormatTool::getType($v->unite());?></td>

                                            </tr>
                                        <?php } ?>
                                    </table>
                                    <div class="form-group space-top text-right">
                                        <button type="submit" name="maj_format_menus" class="btn btn-success">Sauvegarder</button>
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
</html>