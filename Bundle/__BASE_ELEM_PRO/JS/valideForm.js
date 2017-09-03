function checkTextInput(input, $min, $max, $req){
    $err_msg1 = "<div class='alert alertRemover alert-danger'>Ce champ doit faire entre " + $min + " et " + $max + " caractères.</div>";
    $err_msg2 = "<div class='alert alertRemover alert-danger'>Ce champ est requis</div>";
    // $suc_msg = "<div class='alert alertRemover alert-success'>Ce champ est bien remplis</div>";
    $compare = input.val().length;

    // Req doit être un booléen
    if($req == true){
        if($compare == 0){
            $($err_msg2).insertBefore(input);
            borderRecolor(input, "red");
            return false;
        }

        if(($compare > $max) || ($compare < $min)){
            $($err_msg1).insertBefore(input);
            borderRecolor(input, "red");
            return false;
        }
    }

    borderRecolor(input, "green");
    return true;
}

function checkEmailRegexOnly(input){
    $err_msg1 = "<div class='alert alertRemover alert-danger'>l'adresse email doit être valide (ex : exemple@exemple.fr)</div>";
    $test = input.val();
    $striped = $test.replace(/ /g, "");

    $verify = $striped.match(/^[\w\-\+]+(\.[\w\-]+)*@[\w\-]+(\.[\w\-]+)*\.[\w\-]{2,4}$/g);

    if($verify){
        borderRecolor(input, "green");
        return true;
    }
    else{
        if(input.val().length != 0){
            $($err_msg1).insertBefore(input);
        }
        borderRecolor(input, "red");
        return false;
    }
}

function checkSelectInput(input, $req){
    $err_msg1 = "<div class='alert alertRemover alert-danger'>Ce champ doit être renseigné</div>";

    if($req == true){
        if(input.val() == null){
            $($err_msg1).insertBefore(input);
            borderRecolor(input, "red");
            return false;
        }
    }

    borderRecolor(input, "green");
    return true;
}

function checkPhoneNumber(input, $req){
    $err_msg1 = "<div class='alert alertRemover alert-danger'>Le numéro de téléphone doit faire 10 chiffres (Ex : 0494000000).</div>";
    $err_msg2 = "<div class='alert alertRemover alert-danger'>Le numéro de téléphone ne doit contenir que des chiffres.</div>";
    $err_msg3 = "<div class='alert alertRemover alert-danger'>Le numéro de téléphone est obligatoire.</div>";
    $test = input.val();

    $striped = $test.replace(/( |-|\.)/g, "");
    $onlyInt = $striped.match(/^[0-9]{10}/g);

    input.val($striped);

    if($striped.length != 10){
        borderRecolor(input, "orange");
    }
    else{
        if($onlyInt){
            borderRecolor(input, "green");
        }
        else{
            borderRecolor(input, "orange");
        }
    }

    if($req == true){
        if($striped.length != 10){
            $($err_msg1).insertBefore(input);
            return false;
        }
        else{
            if($onlyInt){
                return true;
            }
            else{
                $($err_msg2).insertBefore(input);
                return false;
            }
        }
    }
}

function checkCheckbox(input){
    $err_msg1 = "<div class='alert alertRemover alert-danger'>Il est obligatoire d'accepter les CGV pour s'inscrire.</div>";
    if(input.is(":checked")){
        return true;
    }
    else{
        $($err_msg1).insertBefore(input);
        return false;
    }
}

function checkPhoneNumbers(fixe, portable, force_two) {
    $valide = 0;

    $len_fixe = fixe.val().length;
    $len_port = portable.val().length;

    if($len_fixe != 0){
        if(checkPhoneNumber(fixe, true)){
            $valide++;
        }
    }
    if($len_port != 0){
        if(checkPhoneNumber(portable, true)){
            $valide++
        }
    }

    if(force_two == true){
        if($valide === 2){
            return true;
        }
        else{
            return false;
        }
    }
    else{
        if($valide === 1){
            return true;
        }
        else{
            borderRecolor(fixe, "orange")
            borderRecolor(portable, "orange")
            return false;
        }
    }


}

function checkConfPassword(confirm, password){
    $err_msg1 = "<div class='alert alertRemover alert-danger'>Les passwords ne sont pas identiques.</div>";
    if(confirm.val() == password.val()){
        borderRecolor(confirm, "green");
        return true
    }
    else{
        borderRecolor(confirm, "red");
        borderRecolor(password, "red");
        return false;
    }
}

function resetAlert(){
    $(".alertRemover").replaceWith($(""));
}

function borderRecolor(input, $color){
    // En cas de couleur spéciale -> utiliser l'exa ou le rgb(a)
    if($color == "default"){
        $color = "#cccccc";
    }
    else if($color == "red"){
        $color = "red";
    }
    else if($color == "orange"){
        $color = "orange";
    }
    else if($color == "green"){
        $color = "green";
    }
    else{
        $color = $color;
    }

    // input.css({ border: "1px solid " + $color });
}