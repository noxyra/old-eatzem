<?php
// VERIFICATION DE L'ETAT PRO
if(!isset($_SESSION['etat_entreprise'])){
    $_SESSION['etat_entreprise'] = 'logout';
    $_SESSION['guest_entreprise'] = NULL;
}
// SECURISATION DES FORMULAIRES
if(isset($_POST)){
    $post = Security::securizeArray($_POST);
    $_POST = [];
    unset($_POST);
}
if(isset($_GET)){
    $get = Security::securizeArray($_GET);
    $_GET = [];
    unset($_GET);
}
?>