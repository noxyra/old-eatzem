<?php
    require('Bundle/EditEnseigneColorPro/Controller/index.php');
?>



<html lang="fr">
<head>
    <!-- METAS -->
    <meta charset="utf-8">

    <!-- TITLE / FAVICON -->
    <title>Accueil Eatzem</title>

    <!-- STYLESHEET -->
    <link rel="stylesheet" href="APP/External/Normalize/normalize.css">
    <link rel="stylesheet" href="Bundle/EditEnseigneColorPro/Ressources/CSS/base.css">
    <link rel="stylesheet" href="Bundle/EditEnseigneColorPro/Ressources/CSS/article.css">
    <link rel="stylesheet" href="APP/External/jQueryUI/jquery-ui.css">
    <link rel="stylesheet" href="APP/External/owl_carousel/owl-carousel/owl.carousel.css" />
    <link rel="stylesheet" href="APP/External/owl_carousel/owl-carousel/owl.theme.css" />
    <link rel="stylesheet" href="APP/External/owl_carousel/owl-carousel/owl.transitions.css" />
    <link rel="stylesheet" href="APP/External/spectrum/spectrum.css" />
    <link rel="stylesheet" href="APP/External/fullPage/jquery.fullPage.min.js" /> <!-- TODO ?????? -->
</head>
<body>
<!-- PREVOIR UN WIDGET -->

    <div class="widget_colorise_enseigne ui-widget-content">
        <form method="post" action="./?page=editer_enseigne_theme&id=<?=$current_enseigne->id();?>">
            <fieldset>
                <legend>
                    Selection
                </legend>
                <input type="hidden" name="id" value="<?=$current_enseigne->id();?>" />
                <label for="light">Clair</label>
                <input type="color" id="light" name="light" value="<?=$current_enseigne->light();?>" class="colorPick" />
                <label  for="dark">Foncé</label>
                <input type="color" id="dark" name="dark" value="<?=$current_enseigne->dark();?>" class="colorPick" />
                <label for="elem1">Elements 1</label>
                <input type="color" id="elem1" name="elem1" value="<?=$current_enseigne->elem1();?>" class="colorPick" />
                <label for="elem2">Element 2</label>
                <input type="color" id="elem2" name="elem2" value="<?=$current_enseigne->elem2();?>" class="colorPick" />
                <label for="contrast">Contraste</label>
                <input type="color" id="contrast" name="contraste" value="<?=$current_enseigne->contrast();?>" class="colorPick" />

                <input type="button" id="test_button_color" name="test_button_color" value="tester" />
                <input type="submit" id="submit_button_color" name="submit_button_color" value="maj" />
            </fieldset>
        </form>
    </div>

    <style>
        .widget_colorise_enseigne{
            position: fixed;
            bottom: 100px;
            left: 0px;
            z-index: 15;
            width: 100px;
            height: auto;

            padding: 5px;

            background-color: #343434;
            border-top: 2px solid white;
            border-bottom: 2px solid white;
            border-right: 2px solid white;

            border-radius: 0px 5px 5px 0px;

            box-shadow: 2px 2px 10px #000;
        }
        .widget_colorise_enseigne > form{
            width: 100%;
            height: 100%;
            padding: 0px;
            margin: 0px;

            display: flex;
            flex-direction: column;

            text-align: center;
        }

        .widget_colorise_enseigne > form > fieldset{
            display: flex;
            flex-direction: column;

            border: none;
            padding: 0px;
            margin: 0px;
        }

        .widget_colorise_enseigne > form > fieldset > legend{
            color: #d0101a;
            font-weight: bold;
        }

        .widget_colorise_enseigne > form > fieldset > label{
            color: white;
            margin: 5px 0px;
        }

        #test_button_color, #submit_button_color{
            width: 100%;
            height: 25px;
            border: none;
            margin: 5px 0px;
            color: white;
            transition: background-color 0.3s, color 0.3s;
        }

        #test_button_color:hover, #submit_button_color:hover{
            background-color: white;
            color: #343434;
        }

        #test_button_color{
            background-color: #11709d;
        }
        #submit_button_color{
            background-color: #d0101a;
        }

    </style>

<!-- FIN WIDGET -->


<?php require('APP/Widget/wid.pop.selecteurVille.php');?>
<header id="principal">
    <div class="left_zone">
        <a href="./?page=gestion_enseigne" title="retourner a l'accueil">Retour</a>
    </div>
    <nav class="right_zone">
        <div class="center_menu_block">
            <a title="Enseigne choisit au hasard près de chez vous" class="linker_nav" href="#"><img src="Upload/Graphisme/Icones/dice_white.png" alt="recherche aléatoire" class="mini_icon_button" /></a>
            <a title="Enseignes par les mieux notées proche de chez vous" class="linker_nav" href="#"><img src="Upload/Graphisme/Icones/location_white.png" alt="recherche localisé" class="mini_icon_button" /><span class="text_button">Qu'es-ce qu'on mange ?</span></a>
            <a title="Recherche avancée" class="linker_nav" href="#"><img src="Upload/Graphisme/Icones/search_white.png" alt="recherche avancée" class="mini_icon_button" /></a>
            <a class="linker_nav" rel="canonical" href="#" title="Changer de ville" id="oc_ville_selector"><img class="icon_footer" alt="icone selecteur de ville" src="Upload/Graphisme/Icones/geolocation_white.png"/></a>
        </div>
    </nav>
</header>

<section id="main_section">
    <header class="name_enseigne">
        <span class="center_name_enseigne">
            <?=EnseigneCreator::HEADER($current_enseigne);?>
        </span>
    </header>
    <nav class="nav_enseigne">
        <!-- generer le menu ici -->
        <?=EnseigneCreator::NAV($current_enseigne, $db);?>
    </nav>



    <article id="Presentation">
        <h2><span><?=$current_enseigne->nom();?> en bref</span></h2>
        <p>
            <?=$current_enseigne->description();?>
        </p>
    </article>

    <div class="content_aside_bar">
        <aside>
            <h3><span>État</span></h3>
            <p>
                <img src="Upload/Graphisme/Icones/radar.png" class="ens_aff_icn" alt="distance de l'enseigne" />
                <span><?=LocalisationTools::convertDistKm($current_enseigne->dist());?></span>
            </p>
            <p>
                <img src="Upload/Graphisme/Icones/open.png" class="ens_aff_icn" alt="Ouverture de l'enseigne" />
                <span><?=$EnsManager->hydrateOpenEns($current_enseigne);?></span>
            </p>
        </aside>

        <aside>
            <h3><span>Services</span></h3>
            <p>
                <img src="Upload/Graphisme/Icones/scooter.png" class="ens_aff_icn" alt="livraison disponible ?" />
                <span style="text-align: right">
                    <?=ModeLivraisonTool::getModeName($current_enseigne->livraison());?>
                </span>
            </p>
            <p>
                <img src="Upload/Graphisme/Icones/picnic.png" class="ens_aff_icn" alt="Peut-on manger sur place ?" />
                <span>
                    <?php if($current_enseigne->sur_place() == 1){ echo 'Oui';}else{echo 'Non';}?>
                </span>
            </p>
        </aside>
        <aside>
            <h3><span>Contact</span></h3>
            <p class="special_p_center">
                <?=$current_enseigne->telephone_portable();?>
            </p>
        </aside>
        <aside>
            <h3><span>Note moyenne</span></h3>
            <p class="special_p_center">
                Note moyenne
            </p>
        </aside>
    </div>

    <article id="Localisation">
        <div id="map">
            <!-- Google map zone -->
        </div>
    </article>




</section>


<footer id="principal_footer">
    <div class="left_zone">
        <a rel="canonical" href="#" title="A propos">À propos</a>
        <a rel="canonical" href="#" title="Foire aux questions">F.A.Q</a>
        <a rel="canonical" href="#" title="Fonctionnement du site">Fonctionnement</a>
        <a rel="canonical" href="#" title="Conditions générales d'utilisation">C.G.U</a>
    </div>
    <div class="right_zone">
        <a rel="canonical" href="./?page=espace_pro" title="Espace pro">Pro ?</a>
    </div>
</footer>

</body>
<script src="APP/External/jQuery/jquery-3.1.0.min.js"></script>
<script src="APP/External/jQueryUI/jquery-ui.js"></script>
<script src="APP/External/fullPage/jquery.fullPage.min.js"></script>
<!--    <script src="APP/External/owl_carousel/owl-carousel/owl.carousel.js" type="text/javascript"></script>-->
<script src="APP/Widget/wid.pop.selecteurVille.js"></script>
<script src="Bundle/EditEnseigneColorPro/Ressources/JS/script.js"></script>
<script src="Bundle/EditEnseigneColorPro/Ressources/JS/colorize.js"></script>
<script src="APP/External/spectrum/spectrum.js"></script>
<script>
    $(function(){
        $('.colorPick').spectrum({
            preferredFormat: "rgb",
            showInitial: true,
            showInput: true,
            change: function(color) {
                color.toHexString(); // #ff0000
            },
            showAlpha:true
        })
    });
</script>
<?php if($_SESSION['preciseLocation'] == false){ ?>
    <script src="Bundle/EditEnseigneColorPro/Ressources/JS/localisation.js"></script>
<?php } ?>

<script>
    function initMap() {
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;

        var $origin = {lat: <?=$_SESSION['localisationVisiteur']['lat'];?>,lng: <?=$_SESSION['localisationVisiteur']['lon'];?>};
        var $destination = {lat: <?=$current_enseigne->lat();?>, lon: <?=$current_enseigne->lon();?>};

//        var styleArray = [{"featureType":"all","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"color":"#ed5929"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#c4c4c4"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"color":"#2aacff"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21},{"visibility":"on"}]},{"featureType":"poi.business","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ce0b24"},{"lightness":"0"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"color":"#ce0b24"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#575757"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.text.stroke","stylers":[{"color":"#2c2c2c"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#999999"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}];

        var destinationIcon = 'https://chart.googleapis.com/chart?' + 'chst=d_map_pin_letter&chld=D|FF0000|000000';
        var originIcon = 'https://chart.googleapis.com/chart?' + 'chst=d_map_pin_letter&chld=O|FFFF00|000000';

        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: <?=$center_lat;?>, lng: <?=$center_lon;?>},
            scrollwheel: false,
//            styles: styleArray,
            zoom: 15
        });
        directionsDisplay.setMap(map);

        calculateAndDisplayRoute(directionsService, directionsDisplay);

//        document.getElementById('start').addEventListener('change', onChangeHandler);
//        document.getElementById('end').addEventListener('change', onChangeHandler);
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

<style>
    /* PARTIE HEADER */

    #principal{
        background-color: <?=$current_enseigne->dark();?>;
        border-bottom: 2px solid <?=$current_enseigne->elem1();?>;
    }

    .linker_nav{
        background-color: <?=$current_enseigne->elem1();?>;

    }

    .linker_nav:hover{
        background-color: <?=$current_enseigne->elem2();?>;
    }

    .text_button{
        color: <?=$current_enseigne->light();?>;
    }

    .text_button:hover{
        color: <?=$current_enseigne->light();?>;
    }

    .text_button:visited{
        color: <?=$current_enseigne->light();?>;
    }

    /* SECTION PRINCIPALE */

    #main_section{
        background-color: <?=$current_enseigne->contrast();?>;
        border-left: 2px solid <?=$current_enseigne->dark();?>;
        border-right: 2px solid <?=$current_enseigne->dark();?>;
    }


    /* PARTIE FOOTER */

    #principal_footer{
        background-color: <?=$current_enseigne->dark();?>;
        border-top: 2px solid <?=$current_enseigne->elem1();?>;
    }

    #principal_footer > .left_zone > a{
        color: <?=$current_enseigne->light();?>;
    }

    #principal_footer > .left_zone > a:visited{
        color: <?=$current_enseigne->light();?>;
    }

    #principal_footer > .left_zone > a:hover{
        background-color: <?=$current_enseigne->elem1();?>;
    }

    #principal_footer > .right_zone > a{
        color: <?=$current_enseigne->dark();?>;
        background-color: <?=$current_enseigne->elem1();?>;
    }

    #principal_footer > .right_zone > a:visited{
        color: <?=$current_enseigne->dark();?>;
    }

    #principal_footer > .right_zone > a:hover{
        background-color: <?=$current_enseigne->elem2();?>;
        color: <?=$current_enseigne->light();?>;
    }

    #oc_ville_selector{
        background-color: <?=$current_enseigne->dark();?>;
    }

    #oc_ville_selector:hover{
        background-color: <?=$current_enseigne->elem1();?>;
    }

    .nav_enseigne{
        /* TODO TROUVER QUOI METTRE */
        background-color: #9B9B9B;
    }

    .nav_enseigne > a {
        background-color: <?=$current_enseigne->elem1();?>;
        color: <?=$current_enseigne->light();?>;
    }

    .nav_enseigne > a:hover{
        background-color: <?=$current_enseigne->elem2();?>;
    }

    #Localisation{
        border-top: 1px solid <?=$current_enseigne->light();?>;
    }

    #Presentation{
        background-color: <?=$current_enseigne->light();?>;
        border: 2px solid <?=$current_enseigne->light();?>;
    }

    #Presentation > h2{
        background-color: <?=$current_enseigne->elem2();?>;
    }

    #Presentation > h2 > span {
        color: <?=$current_enseigne->light();?>;
    }

    .content_aside_bar > aside{
        background-color: <?=$current_enseigne->light();?>;
        border: 2px solid <?=$current_enseigne->light();?>;
    }

    .content_aside_bar > aside > h3{
        background-color: <?=$current_enseigne->elem2();?>;
    }

    .content_aside_bar > aside > h3 > span {
        color: <?=$current_enseigne->light();?>;
    }

    .content_aside_bar > aside > p {
        border-bottom: 1px solid <?=$current_enseigne->dark();?>;
    }
</style>
