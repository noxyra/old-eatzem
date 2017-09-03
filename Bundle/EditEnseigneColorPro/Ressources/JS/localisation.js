$(function() {
    if(navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(hydratePreciseCoord, errorHandler, {enableHighAccuracy:false, maximumAge:60000, timeout:27000});
    }
    else
    {
        console.log('Votre navigateur ne prend malheureusement pas en charge la géolocalisation.');
    }


    // Fonction de traitement de la position
    function showLocation(position)
    {
        document.write('Latitude : '+ position.coords.latitude +' - Longitude : '+ position.coords.latitude);
    }

    function hydratePreciseCoord(position){
        $.ajax({
            url : 'APP/AJAX/HydrateLocalisationAccueil.php',
            type : 'POST',
            data : 'lat=' + position.coords.latitude + '&lon=' + position.coords.longitude,
            dataType: 'html'
        });

        console.log('Latitude : '+ position.coords.latitude +' - Longitude : '+ position.coords.latitude);
    }

    // Fonction de gestion des erreurs
    function errorHandler(error) {
        // On log l'erreur sans l'afficher, permet simplement de débugger.
        console.log('Geolocation error : code ' + error.code + ' - ' + error.message);
    }
});
