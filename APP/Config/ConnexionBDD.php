<?php
include('Informations.php');
$preparation	= 'mysql:host='.$dbhost.';dbname='.$dbname;
try{
    $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET NAMES \'UTF8\'';
    $db 		= new PDO($preparation,$dblogin,$dbpass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (Exception $e){
    die('ERREUR : ' . $e->getMessage());
}
?>