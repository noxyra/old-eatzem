$(function(){
    // GESTION TAILLE MENU ET SECTION [Ft = header + footer]
    // function resizeWindow(){
    //     var $h_height = $('.centerize_header').height(); // + 12 -> height + padding + border
    //     var $f_height = $('.centerize_footer').height(); // + 12 -> height + padding + border
    //     var $expression_nav = 'calc(100% - ' + $f_height + 'px)';
    //     $('#main_container').css({ "padding-top" : $h_height + 'px', "max-height" : $expression_nav, "min-height" : $expression_nav});
    // }

    // resizeWindow();
    //
    // $(window).resize(function(){
    //     resizeWindow();
    // });

    // INITIALISATION DES BOX DE CONFIRMATION DE SUPPRESSION
    // var theHREF;
    // $( "#dialog-confirm" ).css({ position: 'absolute', left : '30%', top: '200px'}).dialog({
    //     resizable: false,
    //     height:160,
    //     width:500,
    //     autoOpen: false,
    //     modal: true,
    //     buttons: {
    //         "Oui": function() {
    //             $( this ).dialog( "close" );
    //             window.location.href = theHREF;
    //         },
    //         "Annuler": function() {
    //             $( this ).dialog( "close" );
    //         }
    //     }
    // });

    // $(".suppress_button").click(function(e) {
    //     e.preventDefault();
    //     theHREF = $(this).attr("href");
    //     $("#dialog-confirm").dialog("open");
    // });

    // $("input[type='checkbox']").checkboxradio({ icon: false });
});