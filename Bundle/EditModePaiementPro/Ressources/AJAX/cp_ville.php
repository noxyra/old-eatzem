<?php

//    header ("content-type: application/json; charset=utf-8");

//    var_dump($_POST);

require('../../../../APP/Config/ConnexionBDD.php');
require('../../../../APP/Entity/VillesFrance.php');
require('../../../../APP/Dao/VillesFranceManager.php');

$term = htmlspecialchars($_POST['cp']);

$man = new VillesFranceManager($db);
$donnees = $man->getListCp($term);

function hydrateSelect($donnees){
    $res = '';

    foreach($donnees as $v){
        $res .= '<option value="'.$v.'">'.$v.'</option>';
    }

    return $res;
}

//    var_dump($donnees);

echo hydrateSelect($donnees);
?>