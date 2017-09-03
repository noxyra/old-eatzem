<!doctype html>
<html lang="fr">
<head>
    <!-- METAS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- LINKS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="APP/External/FontAwesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="Bundle/__BASE_ELEM_PRO/CSS/footer_header.css">

    <!-- TITLE -->
    <title>Eatzem Pro - Accueil</title>
    <link rel="shortcut icon" href="Upload/Graphisme/Icones/favicon.ico" type="image/x-icon">
    <link rel="icon" href="Upload/Graphisme/Icones/favicon.ico" type="image/x-icon">
</head>
<body>

<?php require('Bundle/__BASE_ELEM_PRO/PHP/header_pro.php');?>

<div class="container-fluid" id="main_container">
    <div class="row-fluid">
        <?php require('Bundle/__BASE_ELEM_PRO/PHP/nav_pro.php');?>

        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 space-top">

            <?php if(isset($error_abo) or isset($success_abo)){ ?>
                <div class="row-fluid">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center space-bottom">

                        <?php if(isset($error_abo)){ ?>
                            <p class="alert alert-danger">
                                <!-- ICONE -->
                               <?=$error_abo;?>
                            </p>
                        <?php } ?>

                        <?php if(isset($success_abo)){ ?>
                            <p class="alert alert-success">
                                <!-- ICONE -->
                                <?=$success_abo;?>
                            </p>
                        <?php } ?>
                    </div>

                </div>
            <?php } ?>

            <?php if($_SESSION['guest_entreprise']->etat_abonnement() == 0){ ?>

                <div class="row-fluid">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center space-bottom">

                        <h3>Abonnement</h3>

                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center panel">
<!--                        <div class="panel">-->
                            <div class="panel-heading">
                                Abonnement Actuel :
                            </div>
                            <div class="panel-body text-center">
                                <h4><?=$aboCheck->getAbonnement();?></h4>
                            </div>
                            <div class="panel-body text-center">
                                <h5>Temps restant : <?=DateToolBox::tempsRestant($_SESSION['guest_entreprise']->fin_abonnement());?> Jours</h5>
                            </div>
<!--                        </div>-->
                    </div>
                </div>


                <div class="row-fluid">
                <table class="table table-responsive table-bordered text-center bg-white">
                    <tr>
                        <td>#</td>
<!--                        <td>--><?//=AbonnementCkecker::FREE['name'];?><!-- (durée limite 6 mois)</td>-->
                        <td>Abonnement <?=AbonnementCkecker::BASIC['name'];?></td>
                        <td>Abonnement <?=AbonnementCkecker::GOLD['name'];?></td>
                        <td>Abonnement <?=AbonnementCkecker::DIAM['name'];?></td>
                    </tr>

                    <tr>
                        <td>Enseignes en ligne</td>
<!--                        <td>--><?//=AbonnementCkecker::FREE['maxOnline'];?><!--</td>-->
                        <td><?=AbonnementCkecker::BASIC['maxOnline'];?></td>
                        <td><?=AbonnementCkecker::GOLD['maxOnline'];?></td>
                        <td><?=AbonnementCkecker::DIAM['maxOnline'];?></td>
                    </tr>
<!--                    <tr>-->
<!--                        <td>Enseignes hors ligne</td>-->
<!--                        <td>--><?//=AbonnementCkecker::FREE['maxOffline'];?><!--</td>-->
<!--                        <td>--><?//=AbonnementCkecker::BASIC['maxOffline'];?><!--</td>-->
<!--                        <td>--><?//=AbonnementCkecker::GOLD['maxOffline'];?><!--</td>-->
<!--                        <td>--><?//=AbonnementCkecker::DIAM['maxOffline'];?><!--</td>-->
<!--                    </tr>-->
                    <tr>
                        <td>Produits maximums</td>
<!--                        <td>--><?//=AbonnementCkecker::FREE['maxProds'];?><!--</td>-->
                        <td><?=AbonnementCkecker::BASIC['maxProds'];?></td>
                        <td><?=AbonnementCkecker::GOLD['maxProds'];?></td>
                        <td><?=AbonnementCkecker::DIAM['maxProds'];?></td>
                    </tr>
                    <tr>
                        <td>Prix par mois</td>
<!--                        <td>Gratuit</td>-->
                        <td><?=AbonnementCkecker::BASIC['prixMois'];?>€</td>
                        <td><?=AbonnementCkecker::GOLD['prixMois'];?>€</td>
                        <td><?=AbonnementCkecker::DIAM['prixMois'];?>€</td>
                    </tr>
                    <tr>
                        <td>Sélection</td>
<!--                        <td>n/a</td>-->
                        <td>
                            <form  method="post" action="./?page=abonnement_pro&selected=basique">
                                <div class="form-group">
                                    <label class="sr-only" for="duree">Durée</label>
                                    <select class="form-control" id="duree" name="duree">
                                        <option value="1">1 mois - <?=$aboCheck->finalPrice('basique', 1)['finalPrice'];?>€</option>
                                        <option value="6">6 mois - <?=$aboCheck->finalPrice('basique', 6)['finalPrice'];?>€</option>
                                        <option value="12">12 mois - <?=$aboCheck->finalPrice('basique', 12)['finalPrice'];?>€</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Commander</button>
                            </form>
                        </td>
                        <td>
                            <form  method="post" action="./?page=abonnement_pro&selected=affaire">
                                <div class="form-group">
                                    <label class="sr-only" for="duree">Durée</label>
                                    <select class="form-control" id="duree" name="duree">
                                        <option value="1">1 mois - <?=$aboCheck->finalPrice('affaire', 1)['finalPrice'];?>€</option>
                                        <option value="6">6 mois - <?=$aboCheck->finalPrice('affaire', 6)['finalPrice'];?>€</option>
                                        <option value="12">12 mois - <?=$aboCheck->finalPrice('affaire', 12)['finalPrice'];?>€</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Commander</button>
                            </form>
                        </td>
                        <td>
                            <form  method="post" action="./?page=abonnement_pro&selected=ultime">
                                <div class="form-group">
                                    <label class="sr-only" for="duree">Durée</label>
                                    <select class="form-control" id="duree" name="duree">
                                        <option value="1">1 mois - <?=$aboCheck->finalPrice('ultime', 1)['finalPrice'];?>€</option>
                                        <option value="6">6 mois - <?=$aboCheck->finalPrice('ultime', 6)['finalPrice'];?>€</option>
                                        <option value="12">12 mois - <?=$aboCheck->finalPrice('ultime', 12)['finalPrice'];?>€</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Commander</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>

            <?php } ?>

            <?php if($_SESSION['guest_entreprise']->etat_abonnement() == 1 OR $_SESSION['guest_entreprise']->etat_abonnement() == 2){ ?>

                <div class="row-fluid">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center space-bottom">

                        <h3>Vos informations actuelles</h3>

                    </div>

                    <div class="jumbotron">
                        <h4>Abonnement actuel :</h4>
                        <p><?=$aboCheck->getAbonnement();?></p>
                        <h4>Date de fin de l'abonnement :</h4>
                        <p><?=DateToolBox::conv_fr($_SESSION['guest_entreprise']->fin_abonnement(), true);?> (soit dans : <?=DateToolBox::tempsRestant($_SESSION['guest_entreprise']->fin_abonnement());?> Jours).</p>
                        <div class="text-right">
                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Renouveler ?</button>
                        </div>
                    </div>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Pour combien de temps ?</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-inline" method="post" action="./?page=abonnement_pro&selected=<?=strtolower($aboCheck->getAbonnement());?>">
                                        <div class="form-group">
                                            <select class="form-control" name="duree">
                                                <option value="1">1 mois</option>
                                                <option value="6">6 mois</option>
                                                <option value="12">12 mois</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success">Renouveler</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if($_SESSION['guest_entreprise']->abonnement() <= 2){ ?><div class="row-fluid">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">

                        <div class="panel">
                            <div class="panel-body">
                                <?php if($_SESSION['guest_entreprise']->abonnement() <= 1){ ?><div class="btn btn-warning" data-toggle="modal" data-target="#myThirdModal">Upgrader en Affaire</div><?php } ?>
                                <div type="button" class="btn btn-danger" data-toggle="modal" data-target="#mySecondModal">Upgrader en Ultime</div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade text-left" id="mySecondModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Pour combien de temps ?</h4>
                                    </div>
                                    <div class="modal-body text-right">
                                        <form class="form-inline" method="post" action="./?page=abonnement_pro&selected=ultime">
                                            <div class="form-group">
                                                <select class="form-control" name="duree">
                                                    <option value="1">1 mois</option>
                                                    <option value="6">6 mois</option>
                                                    <option value="12">12 mois</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-danger">Renouveler</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if($_SESSION['guest_entreprise']->abonnement() <= 1){ ?>

                            <!-- Modal -->
                            <div class="modal fade text-left" id="myThirdModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Pour combien de temps ?</h4>
                                        </div>
                                        <div class="modal-body text-right">
                                            <form class="form-inline" method="post" action="./?page=abonnement_pro&selected=affaire">
                                                <div class="form-group">
                                                    <select class="form-control" name="duree">
                                                        <option value="1">1 mois</option>
                                                        <option value="6">6 mois</option>
                                                        <option value="12">12 mois</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-warning">Renouveler</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                    </div>

                </div><?php } ?>

            <?php } ?>
        </div>
    </div>
</div>





<?php require('Bundle/__BASE_ELEM_PRO/PHP/footer_pro.php');?>




</body>
<!-- SCRIPTS -->
<script src="APP/External/jQuery/jquery-3.1.0.min.js"></script>
<script src="APP/External/jQueryUI/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="Bundle/__BASE_ELEM_PRO/JS/script.js"></script>
</html>

<style>
    .space-top{
        margin-top: 20px;
    }

    .recolor_head{
        background-color: #343434 !important;
        color: #FFF !important;
        font-size: 18px !important;
        text-align: center;
    }
</style>