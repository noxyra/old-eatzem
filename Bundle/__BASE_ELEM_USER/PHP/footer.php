
<footer class="footer footer-black">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a class="text-red" title="Vers l'espace pro" href="./?page=espace_pro">
                                Pro
                            </a>
                        </li>
                        <li>
                            <a href="./?page=cgu" title="Vers les conditions générales d'utilisation particulier">
                                C.G.U.
                            </a>
                        </li>
                        <li>
                            <a href="./?page=cgv" title="Vers les conditions générales de vente pro">
                                C.G.U. (Pro)
                            </a>
                        </li>
                    </ul>
                </nav>
                <!--        <div class="social-area pull-right">-->
                <!--            <a class="btn btn-social btn-facebook btn-simple">-->
                <!--                <i class="fa fa-facebook-square"></i>-->
                <!--            </a>-->
                <!--            <a class="btn btn-social btn-twitter btn-simple">-->
                <!--                <i class="fa fa-twitter"></i>-->
                <!--            </a>-->
                <!--            <a class="btn btn-social btn-pinterest btn-simple">-->
                <!--                <i class="fa fa-pinterest"></i>-->
                <!--            </a>-->
                <!--        </div>-->
                <div class="copyright pull-right">
                    &copy; 2017 Eatzem
                </div>
            </div>
    </footer>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="./?page=resultat" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Recherche</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nom de l'enseigne</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input class="form-control" id="name" name="name" placeholder="Nom de l'enseigne" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="type">Type d'enseigne recherché</label>
                    <select class="form-control" id="type" name="type">
                        <option value="ind" selected>Tout</option>
                        <?=TypeTool::genOptionType($db);?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="distance_max">Distance maximale</label>
                    <select class="form-control" name="distance_max" id="distance_max">
                        <option value="5">5 Km</option>
                        <option value="15">15 Km</option>
                        <option value="30">30 Km</option>
                        <option value="50">50 Km</option>
                        <option value="100">100 Km</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Livraison ?</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" id="action" name="livraison" />
                        </span>
                        <select id="actionned-by-check" name="rayon_livraison" class="form-control" disabled>
                            <option value="ind" selected>Indiférent</option>
                            <option value="5">5 Km</option>
                            <option value="10">10 Km</option>
                            <option value="15">15 Km</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Manger sur place ?</label>
                    <div class="input-group">
                <span class="input-group-addon">
                    <input type="checkbox" name="sur_place" />
                </span>
                        <input disabled readonly value="sur place ?" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <span class="title_group">Ouverture</span><br />
                    <label>
                        <input type="radio" name="open" id="open_now" value="now"> Ouvert maintenant
                    </label><br />
                    <label>
                        <input type="radio" name="open" id="open_today" value="today"> Ouvert Aujourd'hui
                    </label><br />
                    <label>
                        <input type="radio" name="open" id="open_osef" value="osef" checked> Indiférent
                    </label><br />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                <input type="submit" name="envoyer" class="btn btn-info btn-simple" value="Rechercher">
            </div>
        </form>
    </div>
</div>


<!-- jQuery and Bootstrap core files -->
<!--<script src="Bundle/__BASE_ELEM_USER/TimGSD/assets/js/jquery.js" type="text/javascript"></script>-->
<script src="Bundle/__BASE_ELEM_USER/TimGSD/assets/js/jquery-ui.custom.min.js" type="text/javascript"></script>

<script src="Bundle/__BASE_ELEM_USER/TimGSD/bootstrap3/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Plugins -->
<script src="Bundle/__BASE_ELEM_USER/TimGSD/assets/js/gsdk-checkbox.js"></script>
<script src="Bundle/__BASE_ELEM_USER/TimGSD/assets/js/gsdk-morphing.js"></script>
<script src="Bundle/__BASE_ELEM_USER/TimGSD/assets/js/gsdk-radio.js"></script>
<script src="Bundle/__BASE_ELEM_USER/TimGSD/assets/js/gsdk-bootstrapswitch.js"></script>
<script src="Bundle/__BASE_ELEM_USER/TimGSD/assets/js/bootstrap-select.js"></script>
<script src="Bundle/__BASE_ELEM_USER/TimGSD/assets/js/bootstrap-datepicker.js"></script>
<script src="Bundle/__BASE_ELEM_USER/TimGSD/assets/js/chartist.min.js"></script>
<script src="Bundle/__BASE_ELEM_USER/TimGSD/assets/js/jquery.tagsinput.js"></script>
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>-->

<!-- Get Shit Done Kit PRO Core javascript -->
<script src="Bundle/__BASE_ELEM_USER/TimGSD/assets/js/get-shit-done.js"></script>

<!-- NAVBAR SPE -->
<!--<script src="Bundle/__BASE_ELEM_USER/TimNav/js/bootstrap.js"></script>-->
<script src="Bundle/__BASE_ELEM_USER/TimNav/js/ct-navbar.js"></script>

<script>
    $(function () {
        $('#myTabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });

        $('#action').click(function(){
            if($('#action').is(':checked')){
                $("#actionned-by-check").prop("disabled", false);
            }
            else{
                $('#actionned-by-check').val("ind");
                $("#actionned-by-check").prop("disabled", true);
            }
        });
    });
</script>