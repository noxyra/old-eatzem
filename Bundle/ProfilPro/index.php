<!doctype html>
<html lang="fr">
<head>
    <?php require('Bundle/__BASE_ELEM_PRO/PHP/metas.php'); ?>
</head>

<body>

<div class="wrapper">
    <?php require('Bundle/__BASE_ELEM_PRO/PHP/nav.php'); ?>

    <div class="main-panel">
        <?php require('Bundle/__BASE_ELEM_PRO/PHP/topBar.php'); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" data-background-color="red">
                                <h4 class="title">Profil</h4>
                                <p class="category">Edition des informations de profil utilisateur</p>
                            </div>
                            <div class="card-content">
                                <form method="post" action="./?page=profil_pro" enctype="multipart/form-data" id="save">
                                    <!-- PARTIE 1 -->
                                    <h4 class="text-center space-top space-bottom">Identification</h4>
                                    <!-- NOM ENSEIGNE -->
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="email" class="visible-lg visible-md">Adresse email<span class="tred">*</span> :</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Adresse email" disabled value="<?=$_SESSION['guest_entreprise']->email();?>">
                                        </div>
                                    </div>

                                    <h4 class="text-center space-top space-bottom">Entreprise</h4>

                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="nom" class="visible-lg visible-md">Raison sociale<span class="tred">*</span> :</label>
                                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Raison sociale" value="<?=$_SESSION['guest_entreprise']->nom();?>">
                                        </div>
                                    </div>

                                    <h4 class="text-center space-top space-bottom">Localisation</h4>

                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="adresse" class="visible-lg visible-md">Adresse<span class="tred">*</span> :</label>
                                            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="adresse postale" value="<?=$_SESSION['guest_entreprise']->adresse();?>">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="adresse_c" class="visible-lg visible-md">Complément d'adresse (facultatif) :</label>
                                            <input type="text" class="form-control" id="adresse_c" name="adresse_c" placeholder="complément d'adresse" value="<?=$_SESSION['guest_entreprise']->complement_adresse();?>">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="cp" class="visible-lg visible-md">Code postal<span class="tred">*</span> :</label>
                                            <input type="text" class="form-control" id="cp" name="cp" placeholder="code postal" value="<?=$_SESSION['guest_entreprise']->cp();?>">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="ville" class="visible-lg visible-md">Ville<span class="tred">*</span> :</label>
                                            <input type="text" readonly class="form-control" id="ville" name="ville" placeholder="Ville" value="<?=$_SESSION['guest_entreprise']->ville();?>">
                                        </div>
                                    </div>

                                    <h4 class="text-center space-top space-bottom">Contact</h4>

                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="telephone" class="visible-lg visible-md">Téléphone<span class="tred">*</span> :</label>
                                            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="numéro de téléphone" value="<?=$_SESSION['guest_entreprise']->telephone();?>">
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="form-group text-right">
                                            <input type="submit" class="btn btn-success" name="update_profil" value="Mise à jour" id="envoyer" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require('Bundle/__BASE_ELEM_PRO/PHP/footer.php'); ?>

    </div>
</div>

</body>

<!--   Core JS Files   -->
<script src="Bundle/__BASE_ELEM_PRO/TimAssets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="Bundle/__BASE_ELEM_PRO/TimAssets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="Bundle/__BASE_ELEM_PRO/TimAssets/js/material.min.js" type="text/javascript"></script>

<script type="text/javascript" src="Bundle/__BASE_ELEM_PRO/MaterialKit/assets/js/nouislider.min.js"></script>
<script type="text/javascript" src="Bundle/__BASE_ELEM_PRO/MaterialKit/assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="Bundle/__BASE_ELEM_PRO/MaterialKit/assets/js/material-kit.js"></script>

<!--  Charts Plugin -->
<script src="Bundle/__BASE_ELEM_PRO/TimAssets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="Bundle/__BASE_ELEM_PRO/TimAssets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Material Dashboard javascript methods -->
<script src="Bundle/__BASE_ELEM_PRO/TimAssets/js/material-dashboard.js"></script>



<!-- SCRIPTS -->
<!--<script src="APP/External/jQuery/jquery-3.1.0.min.js"></script>-->
<!--<script src="APP/External/jQueryUI/jquery-ui.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
<!--<script src="Bundle/__BASE_ELEM_PRO/JS/script.js"></script>-->
<script src="Bundle/__BASE_ELEM_PRO/JS/valideForm.js"></script>
<script>
    $("#envoyer").click(function(e){
        e.preventDefault();
        resetAlert();

        valide = true;

        if(checkTextInput($("#email"), 2, 100, true) == false){ valide = false };
        if(checkEmailRegexOnly($("#email")) != true){ valide = false; };
//        if(checkTextInput($("#password"), 8, 100, true) == false){ valide = false; alert("password") };
//        if(checkConfPassword($("#password_c"), $("#password")) == false){ valide = false; alert("passconf") };
        if(checkTextInput($("#nom"), 3, 100, true) == false){ valide = false; };
        if(checkTextInput($("#adresse"), 3, 100, true) == false){ valide = false; };
        if(checkTextInput($("#adresse_c"), 3, 100, false) == false){ valide = false; };
        if(checkTextInput($("#cp"), 5, 5, true) == false){ valide = false; };
        if(checkPhoneNumber($("#telephone"), true) == false){ valide = false; };
//        if(checkSelectInput($("#ville"), true) == false){ valide = false; alert("ville") };

        if(valide == true){
            $("#save").submit();
        }
    });
</script>
</html>

<!--<style>-->
<!--    .space-top{-->
<!--        margin-top: 20px;-->
<!--    }-->
<!---->
<!--    .recolor_head{-->
<!--        background-color: #343434 !important;-->
<!--        color: #FFF !important;-->
<!--        font-size: 18px !important;-->
<!--        text-align: center;-->
<!--    }-->
<!--</style>-->