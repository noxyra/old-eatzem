<?php

    if(isset($post['nom'])){

//        DebugToolBox::DUMP($post);

        if(!EntrepriseEditor::update($post, $db)){
            echo EntrepriseEditor::update($post, $db);
        }
        else{
            echo EntrepriseEditor::update($post, $db);
        }
    }
    require('Bundle/ProfilPro/index.php');
?>