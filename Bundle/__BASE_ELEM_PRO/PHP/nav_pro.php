<?php
$ent_man = new EntrepriseManager($db);
$ens_list = $ent_man->getEnseignes($_SESSION['guest_entreprise']);
?>

<nav class="col-lg-3 col-md-3 col-sm-4 col-xs-12 space-top">
    <div class="panel panel-default">
        <div class="panel-heading recolor_head">
            Mon compte
        </div>
        <div class="list-group">
            <a href="./?page=profil_pro" class="list-group-item list-group-item-info" role="presentation"><i style="margin-right: 5px" class="fa fa-user" aria-hidden="true"></i> Infos et Profil</a>
            <a href="./?page=portefeuille_pro" class="list-group-item list-group-item-warning" role="presentation"><i style="margin-right: 5px" class="fa fa-euro" aria-hidden="true"></i> Portefeuille<span class="badge"><?=$_SESSION['guest_entreprise']->coins();?><i style="margin-left: 5px;" class="glyphicon glyphicon-piggy-bank"></i></span></a>
            <a href="./?page=factures" class="list-group-item list-group-item-warning" role="presentation"><i style="margin-right: 5px" class="fa fa-money" aria-hidden="true"></i> Historique des paiements</a>
        </div>
    </div>
    <div class="panel panel-default space-top">
        <div class="panel-heading recolor_head">
            Annonces
        </div>
        <div class="list-group">
            <a href="./?page=poster_annonce" class="list-group-item list-group-item-success" title="Passer une annonce"><i style="margin-right: 5px" class="fa fa-plus" aria-hidden="true"></i> Poster</a>
            <a href="./?page=historique_annonce" class="list-group-item" title="historique annonces"><i style="margin-right: 5px" class="fa fa-list-ul" aria-hidden="true"></i> Historique</a>
        </div>
    </div>
    <div class="panel panel-default space-top">
        <div class="panel-heading recolor_head">
            Création rapide
        </div>
        <div class="list-group">
            <a href="./?page=enseigne_creator" class="list-group-item list-group-item-success" title="Easy install Enseigne"><i style="margin-right: 5px" class="fa fa-plus" aria-hidden="true"></i> Création complète</a>
        </div>
    </div>
    <div class="panel panel-default space-top">
        <div class="panel-heading recolor_head">
            Gestion avancée
        </div>
        <div class="list-group">
            <a href="./?page=gestion_enseigne" class="list-group-item" title="Gestion des enseigne"><i style="margin-right: 5px" class="fa fa-building-o" aria-hidden="true"></i> Enseignes<span class="badge" style="background-color:#5cb85c"><?=$ent_man->countOnlineEnseigne($_SESSION['guest_entreprise']);?></span><span class="badge"><?=$ent_man->countEnseignes($_SESSION['guest_entreprise']);?></span></a>
            <a href="./?page=gestion_produits" class="list-group-item" title="Gestion de mes produits"><i style="margin-right: 5px" class="fa fa-link" aria-hidden="true"></i> Produits<span class="badge"><?=$ent_man->countProduits($_SESSION['guest_entreprise']);?></a>
            <a href="./?page=gestion_menus" class="list-group-item" title="Gestion de mes menus"><i style="margin-right: 5px" class="fa fa-link" aria-hidden="true"></i> Menus</a>
            <a href="./?page=gestion_horaires" class="list-group-item" title="Gestion des plages horaires"><i style="margin-right: 5px" class="fa fa-link" aria-hidden="true"></i> Plages horaires</a>
            <a href="./?page=gestion_modePaiement" class="list-group-item" title="Gestion des modes de paiement"><i style="margin-right: 5px" class="fa fa-link" aria-hidden="true"></i> Modes de paiement</a>
        </div>
    </div>
</nav>