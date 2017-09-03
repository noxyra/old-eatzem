<nav class="navbar navbar-ct-black navbar-fixed-top navbar-transparent" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=".">
                <div class="brand"> Eatzem </div>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a data-toggle="modal" data-target="#myModal">
                        <i class="pe-7s-search text-red reduct-icon"></i>
                        <p class="text-red">Recherche</p>
                    </a>
                </li>
                <li>
                    <a href="./?page=aleatoire_local">
                        <i class="pe-7s-shuffle text-red reduct-icon">
                        </i>
                        <p class="text-red">Aléatoire</p>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-map-marker text-red reduct-icon"></i>
                        <p class="text-red">Géolocalisation</p>
                    </a>
                    <div class="dropdown-menu expends">
                        <form class="form-inline text-center" method="post" action="." autocomplete="off" style="margin: auto;">
                            <div class="form-group" style="padding-top: 10px;">
                                <label for="adresse">Adresse complète :</label>
                                <input type="text" class="form-control" name="nouvelle_localisation" placeholder="Entrez votre adresse" />
                                <button type="submit" class="btn btn-success btn-fill" name="ManualSelect"><i class="fa fa-compass"></i></button>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--  end navbar -->