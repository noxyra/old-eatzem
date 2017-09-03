<?php require('Bundle/AjoutEnseignePro/Controller/index.php'); ?>

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
                                <h4 class="title">Simple Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="card-content">

                                <form method="post" action="./?page=ajout_enseigne" enctype="multipart/form-data" id="save">
                                    <!-- PARTIE 1 -->
                                    <h4 class="text-center space-bottom">Dénomination</h4>
                                    <!-- NOM ENSEIGNE -->
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="nom" class="visible-lg visible-md">Nom :</label>
                                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom de votre enseigne">
                                        </div>
                                    </div>

                                    <!-- DESCRIPTION ENSEIGNE -->
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="description" class="visible-lg visible-md">Description :</label>
                                            <textarea class="form-control" rows="3" id="description" name="description" placeholder="Description de votre enseigne"></textarea>
                                        </div>
                                    </div>

                                    <!-- URL DE L'enseigne TODO Faire requete AJAX de verification -->

                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="url" class="visible-lg visible-md">Lien :</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">http://eatzem.fr/?enseigne=</span>
                                                <input type="text" class="form-control" id="url" name="url" placeholder="exemple">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="alert alert-warning text-left" role="alert">
                                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                            Cette Url sert à rendre votre site unique sur internet, choisissez la bien.<br />
                                            Pour accéder à votre enseigne vous devrez rentrer ce type d'adresse : http://eatzem.fr/?enseigne=exemple
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="alert alert-danger text-left" role="alert">
                                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Vous ne pourrez la changer qu'en contactant le service client.
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="alert alert-info text-left" role="alert">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i> Nous travaillons actuellement sur la réécriture d'url, vous pourrez bientot accéder à votre enseigne depuis une url de type : https://eatzem.fr/exemple
                                        </div>
                                    </div>

                                    <!-- LOGO DE L'enseigne -->

                                    <div class="col-xs-12">
                                        <div class="form-group text-right">
                                            <label for="logo"><span class="btn btn-success"><i class="fa fa-picture-o" aria-hidden="true"></i> Ajouter un Logo</label>
                                            <input type="file" name="logo" style="display: none;" id="logo" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="alert alert-warning text-left" role="alert">
                                            <p>
                                                <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Pourquoi bien choisir son logo ?</strong><br /><br />
                                                L'ajout d'un logo remplace l'affichage de votre nom d'enseigne par une image la réprésentant, ce qui est un plus de personnalisation étant donné que vous n'êtes pas limités par la police d'écriture.<br />
                                                Pour se faire il est important de choisir une image au format <strong>.png</strong> avec un <strong>fond transparent</strong> [ Nous travaillons actuellement sur système de personnalisation de vos pages, il serait problématique que votre font se retrouve inadapté (bien que vous puissiez le changer à tout moment).
                                            </p>
                                            <p class="text-center">
                                                <strong>Exemple :</strong>
                                                <br />
                                                <img style="width: auto; height: auto" src="../../Upload/Graphisme/Logo/eatzem.png" />
                                            </p>
                                        </div>
                                    </div>

                                    <!-- PARTIE 2 -->
                                    <h4 class="text-center space-bottom">Spécification</h4>

                                    <!-- Livraison -->
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="livraison">Livrez vous ?</label>

                                            <select class="form-control" name="livraison" id="livraison">
                                                <?=ModeLivraisonTool::buildSelect();?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- RAYON DE LIVRAISON -->
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="rayon_livraison">Si livraisons, sur combien de kilomètres ?</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="rayon_livraison" id="rayon_livraison" placeholder="Rayon de livraison en kilomettres" />
                                                <span class="input-group-addon"> Km</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- SUR PLACE -->
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="sur_place">Est-il possible de manger sur place ?</label>
                                            <select class="form-control" name="sur_place" id="sur_place">
                                                <option value="0" selected>Non</option>
                                                <option value="1">Oui</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- PARTIE 2 -->
                                    <h4 class="text-center space-top space-bottom">Localisation</h4>

                                    <!-- ADRESSE DE L'ENSEIGNE -->
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="adresse">Adresse de l'enseigne :</label>
                                            <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Adresse" />
                                        </div>
                                    </div>

                                    <!-- COMPLEMENT ADRESSE DE L'ENSEIGNE -->
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="adresse_c">Adresse de l'enseigne :</label>
                                            <input type="text" name="adresse_c" class="form-control" id="adresse_c" placeholder="Complément d'adresse" />
                                        </div>
                                    </div>

                                    <!-- CODE POSTAL -->
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <label for="cp">Code postal :</label>
                                            <input type="text" class="form-control" name="cp" id="cp" placeholder="Code postal" />
                                        </div>
                                    </div>

                                    <!-- VILLE -->
                                    <div class="col-xs-9">
                                        <div class="form-group">
                                            <label for="ville">Ville :</label>
                                            <select class="form-control" name="ville" id="ville">
                                                <option disabled selected>Entrez un code postal</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- PARTIE 3 -->
                                    <h4 class="text-center space-top space-bottom">Contact</h4>


                                    <div class="form-group">
                                        <!-- TELEPHONE FIXE -->
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label for="telephone_fixe">Téléphone fixe :</label>
                                            <input type="tel" class="form-control" name="telephone_fixe" id="telephone_fixe" placeholder="Téléphone (Ex : 0400000000" />
                                        </div>

                                        <!-- TELEPHONE PORTABLE -->
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label for="telephone_portable">Téléphone portable :</label>
                                            <input type="tel" class="form-control" name="telephone_portable" id="telephone_portable" placeholder="Téléphone (Ex : 0600000000" />
                                        </div>

                                        <!-- INFOS -->
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 space-top">
                                            <div class="alert alert-info text-left" role="alert">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                Vous pouvez mettre qu'un seul numéro de télépohone si vous le souhaitez
                                            </div>

                                        </div>
                                    </div>

                                    <!-- PARTIE 4 -->
                                    <h4 class="text-center space-top space-bottom">Type d'enseigne (plusieurs choix possibles) </h4>

                                    <div class="form-group">

                                        <?php foreach($typList as $v){ ?>

                                            <label class="checkbox-inline space-bottom" for="<?=$v->id();?>">

                                                <input type="checkbox" id="<?=$v->id();?>" name="<?=$v->id();?>">

                                                <?=$v->type();?>

                                            </label>

                                        <?php } ?>

                                    </div>

                                    <!-- SUBMIT -->

                                    <div class="form-group text-right">
                                        <input class="btn btn-success" id="envoyer" type="submit" name="" value="sauvegarder">
                                    </div>
                                </form>
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

<script src="Bundle/__BASE_ELEM_PRO/JS/script.js"></script>
<script src="Bundle/__BASE_ELEM_PRO/JS/valideForm.js"></script>
<script>
    $("#envoyer").click(function(e){
        e.preventDefault();
        resetAlert();

        valide = true;

        if(checkTextInput($("#nom"), 3, 100, true) == false){ valide = false };
        if(checkTextInput($("#description"), 1, 2500, true) == false){ valide = false; };
        if(checkTextInput($("#url"), 8, 45, true) == false){ valide = false; };
        if(checkTextInput($("#adresse"), 3, 100, true) == false){ valide = false; };
        if(checkTextInput($("#adresse_c"), 3, 100, false) == false){ valide = false; };
        if(checkTextInput($("#cp"), 5, 5, true) == false){ valide = false; };
        if(checkPhoneNumbers($("#telephone_fixe"),$("#telephone_portable"), false) == false){ valide = false; };

        if(valide == true){
            $("#save").submit();
        }
    });

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
</script>
</html>


