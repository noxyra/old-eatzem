<div id="search_panel_bloc">
    <div class="title_space">
        <span class="title_menu">Recherche</span>
        <span id="close_panel" class="btn btn-danger"><i class="fa fa-close"></i></span>
    </div>
    <form action="./?page=resultat" method="post" class="content_menu">
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
                    <input type="checkbox" name="livraison" />
                </span>
                <select name="rayon_livraison" class="form-control">
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

        <div class="form-group">
            <input class="btn-block btn btn-success" type="submit" name="rechercher" value="Rechercher" />
        </div>
    </form>
</div>