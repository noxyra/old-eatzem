<?php

    $EnsManager = new EnseigneManager($db);
    $prepare_enseigne = $EnsManager->get(intval($get['id']));
    $current_enseigne = $EnsManager->getWithDist($prepare_enseigne->id(), 0.0000, 0.0000);

//    $EnsManager->hydrateDistEnseigne($current_enseigne, $_SESSION['localisationVisiteur']['lat'], $_SESSION['localisationVisiteur']['lon']);

    // CALCULS POUR GOOGLE MAP

    $center_lat = ($_SESSION['localisationVisiteur']['lat'] + $current_enseigne->lat()) / 2;
    $center_lon = ($_SESSION['localisationVisiteur']['lon'] + $current_enseigne->lon()) / 2;

    if(isset($post['submit_button_color'])){
        if(isset($post['id']) and !empty($post['id'])){
            $test_id = (int) $post['id'];

            if($EnsManager->isMine($_SESSION['guest_entreprise'], $test_id)){
                $toUp = $EnsManager->get($test_id);
                EnseigneEditor::updateColor($post, $toUp, $db);
            }
        }
    }

?>