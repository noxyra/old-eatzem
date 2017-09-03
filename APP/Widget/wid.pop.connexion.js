/**
 * Created by Noxyra on 08/08/2016.
 */

$(function(){
    function hideConnexion(){
        $('.center_overlay').hide("slide", { direction: "right"}, "slow");
        $('.middlebar').hide("slide", { direction: "left"}, "slow");
        $('.overlay_footer').hide("fade", "fast");
        $('#back_overlay').delay(500).hide("drop", "slow");

    }

    function toggleConnexion(){
        $('#back_overlay').toggle("drop", "slow");
        $('.middlebar').delay(500).toggle("slide", { direction: "left"}, "slow");
        $('.center_overlay').delay(500).toggle("slide", { direction: "right"}, "slow");
        $('.overlay_footer').delay(1000).toggle("fade", "fast");
    }

    $('#close_overlay_co').click(function(){
        hideConnexion();
        // $('#back_overlay').css({ display: 'none'});
    });

    $('#overlay_open_co').click(function(e){
        toggleConnexion();
        // $('#back_overlay').css({ display: 'flex'});
    });
});
