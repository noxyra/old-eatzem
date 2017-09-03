<?php
/**
 *         !! ATTENTION !!
 *
 * Ce fichier est chargé avant la sécurisation des formulaires généraux.
 *
 * PENSER AU HTMLSPECIALCHARS
 */

require_once 'APP/External/Composer/vendor/autoload.php';
use GeoIp2\WebService\Client;

// TABLEAU D'EXCLUSION D'IP MAXMIND
$exclude = [
    '127.0.0.1',
    '::1'
];

// TODO SUPPRIMER DEFINITIVEMENT MAXMIND [ LE HTTPS AUTORISE LA RECUPERATION DE LOCALISATION ]
if(!in_array($_SERVER['REMOTE_ADDR'], $exclude)){
    if(!isset($_SESSION['localisationVisiteur'])){
//        $client = new Client(115520, 'BftmY5MqL9cD');
//
//        $record = $client->city($_SERVER["REMOTE_ADDR"]);
//
//        $_SESSION['localisationVisiteur'] = [
//            'codePays' => $record->country->isoCode,
//            'nomPays' => $record->country->name,
//            'nomDepartement' => $record->mostSpecificSubdivision->name,
//            'codeDepartement' => $record->mostSpecificSubdivision->isoCode,
//            'nomVille' => $record->city->name,
//            'codePostal' => $record->postal->code,
//            'lat' => $record->location->latitude,
//            'lon' => $record->location->longitude
//        ];
//        $_SESSION['preciseLocation'] = false;
        $_SESSION['localisationVisiteur'] = [
            'codePays' => "FR",
            'nomPays' => "France",
            'nomDepartement' => "Var",
            'codeDepartement' => "83",
            'nomVille' => "Sollies Pont",
            'codePostal' => "83210",
            'lat' => 43.193012237549,
            'lon' => 6.050668239594
        ];
        $_SESSION['preciseLocation'] = false;
    }
}
else{ // FAKE EN CAS DE LOCALHOST
    $_SESSION['localisationVisiteur'] = [
        'codePays' => "FR",
        'nomPays' => "France",
        'nomDepartement' => "Var",
        'codeDepartement' => "83",
        'nomVille' => "Sollies Pont",
        'codePostal' => "83210",
        'lat' => 43.193012237549,
        'lon' => 6.050668239594
    ];
    $_SESSION['preciseLocation'] = false;
}


if(isset($_POST['ManualSelect'])){
    $req = htmlspecialchars($_POST['nouvelle_localisation']);
    $pos_array = GeocodingGoogle::geocode($req);
    $_SESSION['localisationVisiteur']['nomVille'] = "";
    $_SESSION['localisationVisiteur']['lat'] = $pos_array['lat'];
    $_SESSION['localisationVisiteur']['lon'] = $pos_array['lon'];
    $_SESSION['preciseLocation'] = 'ManualMode';
}