$(function(){

    // CREATION DU SELECT MENU VILLE
    // $('#ville').selectmenu();

    // RE-DESIGN SELECT VILLE
    $('#ville-button').css({
        padding: '5px',
        width: '49%',
        borderRadius: '3px 3px 0px 0px',
        borderTop: '1px solid black',
        borderLeft: '1px solid black',
        borderRight: '1px solid black',
        position: 'relative',
        left: '2px'
    });

    $('.ui-selectmenu-text').css({
        color: '#757575',
        textAlign: 'center',
        fontWeight: '100'
    });

    // CHECK DES TYPES

    $('input[type=checkbox]').checkboxradio({
        icon:false
    });
    $('input[type=checkbox] + label').css({
        fontSize: "12px"
    });

    // AJAX VILLES FRANCE

    $('#cp').blur(function(){
        // alert(30);
        var f_reg = $('#cp').serialize();

        $.ajax({
            type: 'POST',
            url: 'Bundle/AjoutEnseignePro/Ressources/AJAX/cp_ville.php',
            data: f_reg,
            timeout: 3000,
            success: function(data){
                $('#ville').html(data);
                // $('#ville').selectmenu();
            },
            error: function() {}
        });
    })
});
