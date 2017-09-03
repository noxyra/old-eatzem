<?php
    session_start();
    if(isset($_POST['lat']) AND isset($_POST['lon'])) {
        $new_lat = floatval(htmlspecialchars($_POST['lat']));
        $new_lon = floatval(htmlspecialchars($_POST['lon']));
        $_SESSION['localisationVisiteur']['lat'] = $new_lat;
        $_SESSION['localisationVisiteur']['lon'] = $new_lon;
        $_SESSION['preciseLocation'] = true;
    }