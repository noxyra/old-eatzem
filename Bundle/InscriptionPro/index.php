<?php require('Bundle/InscriptionPro/Controller/index.php'); ?>

<!doctype html>
<html lang="fr">
    <head>
        <!-- METAS -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <!-- LINKS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="Bundle/__BASE_ELEM_PRO/CSS/footer_header.css">

        <!-- TITLE -->
        <title>Eatzem Pro - Accueil invité</title>
    </head>
    <body>
        <?php require('APP/Widget/wid.pop.connexion.php'); ?>
        <?php require('Bundle/__BASE_ELEM_PRO/PHP/header_pro_logout.php');?>

        <section id="sectionInscription" class="container-fluid">
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 panel">
                <form method="post" action="./?page=espace_pro" id="inscr">

                    <div class="text-center">
                        <h3>Inscription Pro</h3>
                    </div>

                    <fieldset>
                        <legend>Sécurité</legend>

                        <div class="form-group">
                            <label for="basic-url">Email :</label>
                            <input name="email" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="exemple">
                            <label for="password">Mot de passe :</label>
                            <input name="password" type="password" id="password" class="form-control" placeholder="Mot de passe">
                            <label for="password_c">Confirmer le mot de passe :</label>
                            <input name="password_c" type="password" id="password_c" class="form-control" placeholder="Confirmer">
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Informations d'entreprise</legend>

                        <div class="form-group">
                            <label for="nom">Raison sociale :</label>
                            <input type="text" name="nom" id="nom" class="form-control" placeholder="Raison sociale">
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Localisation</legend>

                        <div class="form-group">
                            <label for="adresse">Adresse postale :</label>
                            <input type="text" name="adresse" id="adresse" class="form-control" placeholder="xxx rue de l'exemple">
                            <label for="adresse_c">Complement d'adresse :</label>
                            <input type="text" name="adresse_c" id="adresse_c" class="form-control"  placeholder="Complement d'adresse" />
                            <label for="cp">Code postal :</label>
                            <input type="text" name="cp" id="cp" class="form-control" placeholder="XXXXX">
                            <label for="ville">Ville :</label><br />
                            <select class="form-control" name="ville" id="ville">
                                <option disabled>Entrez un code postal</option>
                            </select>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Contact</legend>

                        <div class="form-group">
                            <label for="telephone">Téléphone :</label>
                            <input name="telephone" type="text" class="form-control" id="telephone" placeholder="04XXXXXXXX">
                        </div>
                    </fieldset>

                    <div class="row spacing">
                        <div class="col-xs-12 text-right">
                            <label for="optin">Acceptez vous de recevoir de nos nouvelles par email ? </label><input type="checkbox" name="optin" id="optin">
                        </div>
                        <div class="col-xs-12 text-right">
                            <label for="cgv">Pour pous inscrire vous devez accepter les <a href="./?page=cgv" title="CGV">C.G.V.</a> </label><input type="checkbox" name="cgv" id="cgv">
                        </div>

                        <input type="submit" name="inscr_entreprise" class="btn btn-success btn-block margin-top-min" id="envoyer">

                    </div>

                </form>
            </div>
        </section>



        <?php require('Bundle/__BASE_ELEM_PRO/PHP/footer_pro.php');?>


        <!-- SCRIPTS -->
        <script src="APP/External/jQuery/jquery-3.1.0.min.js"></script>
        <script src="APP/External/jQueryUI/jquery-ui.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>-->
        <script src="Bundle/InscriptionPro/Ressources/JS/script.js"></script>
        <script src="Bundle/InscriptionPro/Ressources/JS/forms.js"></script>
        <script src="Bundle/__BASE_ELEM_PRO/JS/valideForm.js"></script>
        <script src="APP/Widget/wid.pop.connexion.js"></script>
    <script>
        $("#envoyer").click(function(e){
            e.preventDefault();
            resetAlert();

            valide = true;

            if(checkTextInput($("#basic-url"), 2, 100, true) == false){ valide = false; };
            if(checkEmailRegexOnly($("#basic-url")) != true){ valide = false; };
            if(checkTextInput($("#password"), 8, 100, true) == false){ valide = false;};
            if(checkConfPassword($("#password_c"), $("#password")) == false){ valide = false; };
            if(checkTextInput($("#nom"), 3, 100, true) == false){ valide = false; };
            if(checkTextInput($("#adresse"), 3, 100, true) == false){ valide = false; };
            if(checkTextInput($("#adresse_c"), 3, 100, false) == false){ valide = false; };
            if(checkTextInput($("#cp"), 5, 5, true) == false){ valide = false; };
            if(checkPhoneNumber($("#telephone"), true) == false){ valide = false; };
            if(checkSelectInput($("#ville"), true) == false){ valide = false; };
            if(checkCheckbox($('#cgv')) == false){ valide = false; }

            if(valide == true){
                $("#inscr").submit();
            }
        });
    </script>
    </body>
</html>

<style>
    fieldset{
        margin-top: 20px;
    }

    label{
        margin-top: 20px;
    }

    .spacing{
        margin: 20px;
    }
</style>