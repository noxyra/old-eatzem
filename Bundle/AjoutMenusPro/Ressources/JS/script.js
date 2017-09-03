$(function(){
    // GESTION TAILLE MENU ET SECTION [Ft = header + footer]
    function resizeWindow(){
        var $h_height = $('#principal').height() + 12; // + 12 -> height + padding + border
        var $f_height = $('#principal_footer').height() + 12; // + 12 -> height + padding + border
        var $total_hf = $h_height + $f_height;
        var $expression_nav = 'calc(100% - ' + $total_hf + 'px)';
        var $expression_sec = 'calc(100% - ' + ($total_hf + 20) + 'px)';
        var $w_nav = $('#left_nav').width() + 20;
        var $w_section = 'calc(100% - ' + $w_nav + 'px)';

        $('#left_nav').css({ height : $expression_nav });
        $('#main_section').css({ height : $expression_sec, maxHeight: $expression_sec, overflow: 'auto', width : $w_section});
    }

    $(window).resize(function(){
        resizeWindow();
    });

    // GESTION DES BOX D'AIDE
    $( document ).tooltip({
        show: {
            effect: "slide",
            delay: 750
        }
    });

    // INITIALISATION DE LA PAGE
    resizeWindow();
});/**
 * Created by Noxyra on 12/08/2016.
 */
