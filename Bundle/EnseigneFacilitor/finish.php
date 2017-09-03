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
                            <div class="card-header" data-background-color="green">
                                <h4 class="title">Toutes nos félicitations</h4>
                                <p class="category">Votre enseigne est prête</p>
                            </div>
                            <div class="card-content table-responsive">


                                    <div class="alert alert-info space-bottom" style="display: block">
                                        Vous avez fait une erreur ? Pas de panique ! Votre enseigne n'est pas encore visible en ligne.
                                        Nous vous expliquons dans les lignes ci-dessous comment la modifier.
                                    </div>
                                    <p>
                                        Si vous souhaitez rectifier une erreur, ou mettre à jour les informations de votre enseigne ultérieurement il vous suffit de passer par la gestion avancée.
                                    </p>
                                    <h5>Vous souhaitez modifier / corriger une enseigne ?</h5>
                                    <ul>
                                        <li>
                                            Rendez-vous dans l'onglet "Enseignes" de la Gestion avancée. Vous aurez accès au profil de votre enseigne et pourrez modifier les informations qui lui sont associées : produits, menus, prix, formats, horaires, modes de paiement, etc. (dits éléments).
                                        </li>
                                        <li>
                                            Pour modifier les informations de l'enseigne, cliquez simplement sur l'icone correspondant à l'élément concerné.
                                        </li>
                                    </ul>
                                    <div class="alert alert-danger space-bottom" style="display: block">
                                        Attention ! Les éléments peuvent être associé à plusieurs enseignes (dans le cas ou vous en auriez plusieurs).<br />
                                        Cela signifie donc que si vous modifiez un menu par exemple, et qu'il apparait sur deux enseignes, il sera donc modifié pour les deux. Cette solution s'avère très pratique dans la plupart des cas vous évitant de mettre à jour plusieurs fois le même élément.
                                    </div>
                                    <h5>Ça y est ? Vous êtes sûr de vous ? Il est temps de passer en ligne ! :)</h5>
                                    <p>
                                        Pour cela rien de plus simple.<br />
                                        Cliquez sur "Enseigne" dans le menu de gestion avancé et cliquez sur le bouton "passer en ligne" (le nombre d'enseigne que vous pouvez avoir en ligne simultanément dépend de votre abonnement). Voilà, vous êtes maintenant sur internet et parés à remplacer vos flyers papiers.
                                    </p>
                                </div>

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
<script src="Bundle/__BASE_ELEM_PRO/JS/script.js"></script>
</html>
