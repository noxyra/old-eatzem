<?php
    require('Bundle/EnseigneUser/Controller/index.php');
?>
<html lang="fr">
<head>
    <!-- TODO GERER META DES RESEAUX SOCIAUX -->
    <?php require('Bundle/__BASE_ELEM_USER/PHP/metas.php');?>
</head>
<body>

<?php //require('APP/Widget/wid.pop.selecteurVille.php');?>
<?php require('Bundle/__BASE_ELEM_USER/PHP/header.php');?>

<div class="wrapper">
    <div class="container-fluid" style="margin: 0px; padding: 0px;">
        <header style="background-image: url('<?=ImageTools::pathEnseignePic($current_enseigne);?>')">
            <div class="white-filter centerize-conteneur int-spacing-min text-center">
                <h1><?=EnseigneCreator::HEADER($current_enseigne);?></h1>
                <h2>
                    <?php $i = 0 ; $imax = count($types); foreach ($types as $type){ ?>
                        <?=$type->type();?>
                        <?php $i++; if($i < $imax){ echo " | "; } ?>
                    <?php } ?>
                </h2>

                <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                    <nav class="navbar navbar-transparent" style="padding: 10px;border-radius: 15px;background: none;">
                        <?=EnseigneCreator::NAV($current_enseigne, $db);?>
                    </nav>
                </div>
            </div>
        </header>
    </div>

    <div class="container">
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
            <div class="row">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="content">
                            <p class="category">Présentation</p>
                            <h4>
                                <?=nl2br($current_enseigne->description());?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <h3 class="text-center" style="margin-bottom: 30px;">Annonces</h3>

            <div class="row">
                <?php if(count($annonces) > 0){ ?>
                    <?php foreach ($annonces as $item){ ?>
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="content">
                                    <p class="category"><?=$item->titre();?></p>
                                    <h4 class="title"><?=nl2br($item->contenu());?></h4>
                                    <div class="footer">
                                        <div class="author">
                                            <span><i class="fa fa-clock-o"></i> <?=DateToolBox::conv_fr($item->date_reup());?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }}else{ ?>
                    <div class="col-xs-12">
                        <div class="alert alert-info">
                            Aucune annonce n'a encore été posté pour cette enseigne.
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="row">
                <?php if(!empty($current_enseigne->telephone_portable())){ ?>
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="content">
                                <p class="category">Tel. Portable</p>
                                <span class="card-link text-right">
                                    <p class="title">
                                        <?=$current_enseigne->telephone_portable();?>
                                    </p>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if(!empty($current_enseigne->telephone_fixe())){ ?>
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="content">
                                <p class="category">Tel. Fixe</p>
                                <span class="card-link text-right">
                                    <p class="title">
                                        <?=$current_enseigne->telephone_fixe();?>
                                    </p>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-xs-6">
                    <div class="card">
                        <div class="content">
                            <p class="category">Livraison ?</p>
                            <span class="card-link text-right">
                                <p class="title"><?=ModeLivraisonTool::getModeName($current_enseigne->livraison(), true);?></p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="card">
                        <div class="content">
                            <p class="category">Sur place ?</p>
                            <span class="card-link text-right">
                                <p class="title"><?php if($current_enseigne->sur_place() == 1){ echo '<span class="text-success">Oui</span>';}else{echo '<span class="text-danger">Non</span>';}?></p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="card">
                        <div class="content">
                            <p class="category">Ouverture</p>
                            <span class="card-link text-right">
                                <p class="title"><?=$EnsManager->hydrateOpenEns($current_enseigne);?></p>
                                <button type="button" class="btn btn-success btn-fill btn-round btn-sm btn-block" data-toggle="modal" data-target="#myModal2">
                                <i class="fa fa-calendar"></i> Horaires
                            </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="card card-background">
                        <div id="map" style="height: 200px">
                            <!-- GOOGLE MAP -->
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="card">
                        <div class="content">
                            <p class="category">Modes de paiement accepté</p>
                            <div class="card-link text-right" style="margin-top: 10px;">
                                <?php if(empty($modePaiements)){ ?>
                                    <span class="label label-warning">
                                       Non renseigné
                                    </span>
                                <?php }else{
                                        foreach ($modePaiements as $mode){ ?>
                                    <span class="label label-success" ><?=$mode->mode();?></span>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Horaires</h4>
            </div>
            <div class="modal-body text-center">
                <?php foreach ($horaires as $key => $value){ ?>
                    <h4 class="margin-bot-min margin-top-min"><?=$key;?></h4>
                    <?php foreach ($value as $horaire){ ?>
                        <p><?=$horaire->heureO();?> à <?=$horaire->heureF();?></p>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php require('Bundle/__BASE_ELEM_USER/PHP/footer.php');?>
</body>
    <?php if($_SESSION['preciseLocation'] == false){ ?>
        <script src="Bundle/EnseigneUser/Ressources/JS/localisation.js"></script>
    <?php } ?>

    <script>
        function initMap() {
            var directionsDisplay = new google.maps.DirectionsRenderer;
            var directionsService = new google.maps.DirectionsService;
            var $origin = {lat: <?=$_SESSION['localisationVisiteur']['lat'];?>,lng: <?=$_SESSION['localisationVisiteur']['lon'];?>};
            var $destination = {lat: <?=$current_enseigne->lat();?>, lon: <?=$current_enseigne->lon();?>};
            var destinationIcon = 'https://chart.googleapis.com/chart?' + 'chst=d_map_pin_letter&chld=D|FF0000|000000';
            var originIcon = 'https://chart.googleapis.com/chart?' + 'chst=d_map_pin_letter&chld=O|FFFF00|000000';
            // Create a map object and specify the DOM element for display.
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: <?=$center_lat;?>, lng: <?=$center_lon;?>},
                scrollwheel: false,
                zoom: 15
            });
            directionsDisplay.setMap(map);
            calculateAndDisplayRoute(directionsService, directionsDisplay);
        }
        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            directionsService.route({
                origin: {lat: <?=$_SESSION['localisationVisiteur']['lat'];?>, lng: <?=$_SESSION['localisationVisiteur']['lon'];?>},
                destination: {lat: <?=$current_enseigne->lat();?>,lng: <?=$current_enseigne->lon();?>},
                travelMode: google.maps.TravelMode.DRIVING
            }, function(response, status) {
                if (status === google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBI8YkifROgKYJsIkFveps6hLlT_4-ctg&callback=initMap" async defer></script>

</html>