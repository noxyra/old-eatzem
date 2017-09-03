var $numberProduit = 1;

var $priceContent = '<div class="col-xs-12"><div class="form-group"><label for="only_price">Prix :</label><div class="input-group"><span class="input-group-addon"><i class="fa fa-eur" aria-hidden="true"></i></span><input class="form-control" name="only_price" id="only_price" type="text"/></div></div>';

// Fonctions
function genFormatBox(number){
    // SELECT
    var $select1 = '<option value="0">n/a</option>';
    var $select2 = '<option value="1">mm</option>';
    var $select3 = '<option value="2">cm</option>';
    var $select4 = '<option value="3">m</option>';
    var $select5 = '<option value="4">mg</option>';
    var $select6 = '<option value="5">g</option>';
    var $select7 = '<option value="6">kg</option>';
    var $select8 = '<option value="7">ml</option>';
    var $select9 = '<option value="8">cl</option>';
    var $select10 = '<option value="9">l</option>';

    // PREPARATION HTML
    var box_start = '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">';
    var box_title = '<h4 class="text-center">Format n°' + number + '</h4>';
    var box_inp1 = '<div class="form-group"><input class="form-control" name="format-' + number + '" type="text" placeholder="Format (Ex : 29)"/></div>';
    var box_inp2 = '<div class="form-group"><select class="form-control" name="unite-' + number + '">' + $select1 + $select2 + $select3 + $select4 + $select5 + $select6 + $select7 + $select8 + $select9 + $select10 +'</select></div>';
    var box_inp3 = '<div class="form-group"><input class="form-control" name="prix-' + number + '" type="text" placeholder="Prix (Ex : 50)"/></div>';
    var box_end = '</div>';

    // CONCATENATION DE LA BOX
    var box = box_start + box_title + box_inp1 + box_inp2 + box_inp3 + box_end;

    // RETOUR
    return box;
}

// Lors du clic sur "Ajouter un prix"
$('#ajouter_prix').click(function(){
    $('#selector').hide();
    $('#content-items').css({ display : "block" });
    $('#content-items').html($priceContent);
});


// Lors du clic sur "Ajouter un format"
$('#ajouter_formats').click(function(){
    $('#selector').hide();
    $('#content-items').css({ display : "block" });
    $('#format-supp-cont').css({ display : "block" });

    $('#content-items').html(genFormatBox($numberProduit));
    $numberProduit++;
    // alert($numberProduit);
});

// Lors du clic sur "Format supplémentaire"
$('#format-supp').click(function(){
    if($numberProduit <= 4){
        $('#content-items').append(genFormatBox($numberProduit));
        $numberProduit++;
    }
    else{
        alert("Il est déconseillé d'ajouter plus de 4 formats différent pour un même produit. Cependant, si vous en avez réellement besoin vous pouvez passer par le menu de \"gestion avancé.\"");
    }
    // alert($numberProduit);
});