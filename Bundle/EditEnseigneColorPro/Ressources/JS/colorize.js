$(function(){
    function hydrateTemplate(light, dark, elem1, elem2, contrast){
        $('.content_aside_bar > aside > p').css({'border-bottom': '1px solid ' + dark });
        $('.content_aside_bar > aside > p:last-child').css({'border-bottom': 'none' });
        $('.content_aside_bar > aside > h3 > span').css({ 'color': light });
        $('.content_aside_bar > aside > h3').css({'background-color': elem2 });
        $('.content_aside_bar > aside').css({
            'background-color': light,
            'border': '2px solid ' + light
        });
        $('#Presentation > h2 > span').css({'color':light});
        $('#Presentation > h2').css({'background-color':elem2});
        $('#Presentation').css({
            'background-color':light,
            'border': '2px solid ' + light
        });
        $('#Localisation').css({'border-top': '1px solid ' + light});
        $('.name_enseigne > a:hover').css({'background-color':elem2});
        $('.nav_enseigne > a').css({
            'background-color': elem1,
            'color':light
        });
        // TODO VOIR POUR NAV_ENSEIGNE BACKGROUND_COLOR
        $('#oc_ville_selector:hover').css({'background-color':elem1});
        $('#oc_ville_selector').css({'background-color': dark});
        $('#principal_footer > .right_zone > a:hover').css({
            'background-color':elem2,
            'color':light
        });
        $('#principal_footer > .right_zone > a:visited').css({'color':dark});
        $('#principal_footer > .right_zone > a').css({
            'color':dark,
            'background-color':elem1
        });
        $('#principal_footer > .left_zone > a:hover').css({'background-color':elem1});
        $('#principal_footer > .left_zone > a:visited').css({'color':light});
        $('#principal_footer > .left_zone > a').css({'color':light});
        $('#principal_footer').css({
            'background-color':dark,
            'border-top': '2px solid ' + elem1
        });
        $('#main_section').css({
            'background-color': contrast,
            'border-left': '2px solid ' + dark,
            'border-right': '2px solid ' + dark
        });
        $('.text_button:visited').css({'color':light});
        $('.text_button:hover').css({'color':light});
        $('.text_button').css({'color':light});
        $('.linker_nav:hover').css({'background-color':elem2});
        $('.linker_nav').css({'background-color':elem1});
        $('#principal').css({
            'background-color':dark,
            'border-bottom': '2px solid ' + elem1
        });
    }

    function TesterColor(){
        var light = $('#light').val();
        var dark = $('#dark').val();
        var elem1 = $('#elem1').val();
        var elem2 = $('#elem2').val();
        var contrast = $('#contrast').val();

        hydrateTemplate(light, dark, elem1, elem2, contrast);


    }

    $('#test_button_color').click(function(){
        TesterColor();
    });
});