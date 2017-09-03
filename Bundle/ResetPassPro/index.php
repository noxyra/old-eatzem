<?php require('Bundle/ResetPassPro/Controller/index.php'); ?>

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
        <title>Eatzem Pro - Mot de passe oublié</title>
    </head>
    <body>
        <?php require('Bundle/__BASE_ELEM_PRO/PHP/header_pro_logout.php');?>

        <section id="main_section" class="container-fluid">
            <?php if(isset($pop_up_error)){ ?>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                <p class="alert alert-danger">
                    <?=$pop_up_error;?>
                </p>
            </div>
            <?php } ?>

            <?php if(isset($pop_up_success)){ ?>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                    <p class="alert alert-success">
                        <?=$pop_up_success;?>
                    </p>
                </div>
            <?php } ?>

            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                <form method="post" action="./?page=password_oublie">

                    <div class="row">
                        <div class="text-center">
                            <h3>Mot de passe oublié ?</h3>
                            <p>Entrez votre adresse email pour récupérer votre mot de passe.</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email :</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="email" placeholder="exemple@exemple.com" />
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success pull-right" name="reset_pass" value="Envoyer" />
                    </div>

                </form>
            </div>
        </section>



        <?php require('Bundle/__BASE_ELEM_PRO/PHP/footer_pro.php');?>


        <!-- SCRIPTS -->
        <script src="APP/External/jQuery/jquery-3.1.0.min.js"></script>
        <script src="APP/External/jQueryUI/jquery-ui.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
        <script src="Bundle/InscriptionPro/Ressources/JS/script.js"></script>
        <script src="Bundle/InscriptionPro/Ressources/JS/forms.js"></script>
        <script src="APP/Widget/wid.pop.connexion.js"></script>
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