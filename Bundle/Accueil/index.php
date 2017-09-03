<?php require('Bundle/Accueil/Controller/index.php'); ?>

<html lang="fr">
<head>
    <!-- STYLESHEET -->
    <?php require('Bundle/__BASE_ELEM_USER/PHP/metas.php');?>
</head>
<body>
<?php require('Bundle/__BASE_ELEM_USER/PHP/header.php');?>

<div class="wrapper">
    <div class="container-fluid" style="margin: 0px; padding: 0px;">
        <header>
            <div class="white-filter centerize-conteneur int-spacing-min">
                <h1 class="centerized-contain text-center">Manger, simplement et rapidement</h1>
                <p class="text-center" style="margin-top: 50px;">
                    <a href="https://presentation.eatzem.fr" title="Découvrir Eatzem" class="btn btn-fill btn-round btn-lg btn-success">Découvrir Eatzem</a>
                </p>

            </div>
        </header>
    </div>

    <div class="container-fluid">

            <!-- ZONE ANNONCE -->
        <div class="row">
            <div class="col-xs-12">
                <ul class="nav nav-tabs" role="tablist" id="myTabs">
                    <li role="presentation"><a href="#annonces">Annonces</a></li>
                    <li role="presentation" class="active"><a href="#proximité">Enseignes a proximité</a></li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div role="tabpanel" class="tab-pane fade" id="annonces" style="padding: 10px;">
                        <div class="row">
                            <?php foreach ($dataTab as $item){ ?>
                                <div class="col-xs-12">
                                    <div class="card">
                                        <div class="content">
                                            <h3 class="category"><i class="fa fa-bullhorn" aria-hidden="true"></i> <?=$item['annonce']->titre();?></h3>
                                            <a class="card-link" href="./?enseigne=<?=$item['enseigne']->url();?>">
                                                <h4>
                                                    <?=nl2br($item['annonce']->contenu());?>
                                                </h4>
                                            </a>
                                            <a href="./?enseigne=<?=$item['enseigne']->url();?>"></a>
                                            <div class="footer">
                                                <div class="author">
                                                    <span><?=$item['enseigne']->nom();?></span>
                                                </div>
                                                <div class="stats pull-right">
                                                    <i class="fa fa-clock-o"></i>
                                                    <?=DateToolBox::conv_fr($item['annonce']->date_reup());?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in active" id="proximité" style="padding: 10px;">
                        <?php foreach($ProxList as $v){ require('APP/Widget/wid.ens.affiche.php'); } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('Bundle/__BASE_ELEM_USER/PHP/footer.php');?>

</body>
<!--<script src="APP/Widget/wid.pop.selecteurVille.js"></script>-->
<?php if($_SESSION['preciseLocation'] == false){ ?>
    <script src="Bundle/Accueil/Ressources/JS/localisation.js"></script>
<?php } ?>
</html>

