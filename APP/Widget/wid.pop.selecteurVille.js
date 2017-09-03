$(function(){

    var $last_date = Date.now();

    // alert($last_date);

    $('*').keypress(function(e){
        var $first_test = e.keyCode;
        var $second_test = e.which;

        // alert($first_test);
        // alert($second_test);

        if((Date.now() - $last_date) > 100){
            if(($first_test == 27) || ($second_test == 27)){
                oc_manual_localise();
            }

            $last_date = Date.now();
        }
    });

    $('#oc_ville_selector').click(function(){
        oc_manual_localise();
    });

    function oc_manual_localise(){
        if($('#selTown_overlay_content').css('display') == 'none'){
            $('#selTown_overlay_content').show('drop');
            $('#selTown_overlay_content').css({display:'block'});
            $('#setTown_overlay_txt').focus();
        }
        else{
            $('#selTown_overlay_content').hide('drop');
            $('#selTown_overlay_content').css({display:'none'});
        }
    }
});