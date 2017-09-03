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
    <link rel="stylesheet" href="APP/External/FontAwesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="Bundle/__BASE_ELEM_PRO/CSS/footer_header.css">
    <link rel="stylesheet" href="Bundle/ProfilPro/Ressources/CSS/form.css">

    <!-- TITLE -->
    <title>Eatzem Pro - Profil</title>
    <link rel="shortcut icon" href="Upload/Graphisme/Icones/favicon.ico" type="image/x-icon">
    <link rel="icon" href="Upload/Graphisme/Icones/favicon.ico" type="image/x-icon">
</head>
<body>

<?php require('Bundle/__BASE_ELEM_PRO/PHP/header_pro.php');?>

<div class="container-fluid" id="main_container">
    <div class="row-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <h3 class="text-center space-bottom">Mes informations d'entreprise</h3>
            <form method="post" action="./?reset_pass=1" enctype="multipart/form-data">
                <!-- HIDDEN -->
                <input type="hidden" name="email" value="<?=$entreprise->email();?>" />
                <input type="hidden" name="token" value="<?=$get['use_token'];?>" />
                <!-- PARTIE 1 -->
                <h4 class="text-center space-top space-bottom">Changement de mot de passe</h4>
                <!-- NOM ENSEIGNE -->
                <div class="form-group">
                    <label for="password" class="visible-lg visible-md">Nouveau mot de passe</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                    </div>
                    <label for="pass_conf" class="visible-lg visible-md">Confirmer mot de passe</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" id="pass_conf" name="pass_conf" placeholder="Mot de passe">
                    </div>
                    <input type="submit" class="btn btn-success pull-right" name="maj_pass" value="Mise à jour" />
                </div>
            </form>
        </div>
    </div>
</div>

<?php require('Bundle/__BASE_ELEM_PRO/PHP/footer_pro.php');?>

<!-- SCRIPTS -->
<script src="APP/External/jQuery/jquery-3.1.0.min.js"></script>
<script src="APP/External/jQueryUI/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="Bundle/__BASE_ELEM_PRO/JS/script.js"></script>
</body>
</html>