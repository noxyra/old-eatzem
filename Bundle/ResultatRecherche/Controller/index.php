<?php

    if(count($post) < 1){
        $pop_up_error = "Vous avez sélectionné aucun filtres de recherche";
    }
    else{

//        DebugToolBox::DUMP($post);

        $results = Seeker::enseigne($post, $db);

        if(count($results) < 1){
            $pop_up_error = "Aucun résultat trouvé...";
        }

    }



?>