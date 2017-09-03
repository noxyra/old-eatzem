<?php
    require('Bundle/EnseigneMenuUser/Controller/index.php');
?>



<html lang="fr">
<head>
    <!-- METAS -->
    <meta charset="utf-8">

    <!-- TITLE / FAVICON -->
    <title>Accueil Eatzem</title>
    <?php require('Bundle/__BASE_ELEM_USER/PHP/metas.php');?>
</head>
<body>
<?php //require('APP/Widget/wid.pop.selecteurVille.php');?>
<?php require('Bundle/__BASE_ELEM_USER/PHP/header.php');?>

<div class="wrapper">
    <div class="container-fluid" style="margin: 0px; padding: 0px;">
        <header style="background-image: url('<?=ImageTools::pathEnseignePic($current_enseigne);?>')">
            <div class="white-filter centerize-conteneur int-spacing-min text-center">
                <h1><?=EnseigneCreator::HEADER($current_enseigne);?></h1>
                <h2>
                    <?php $i = 0 ; $imax = count($types); foreach ($types as $type){ ?>
                        <?=$type->type();?>
                        <?php $i++; if($i < $imax){ echo " | "; } ?>
                    <?php } ?>
                </h2>

                <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                    <nav class="navbar navbar-transparent" style="padding: 10px;border-radius: 15px;background: none;">
                        <?=EnseigneCreator::NAV($current_enseigne, $db);?>
                    </nav>
                </div>
            </div>
        </header>
    </div>

    <div class="container">
        <?php foreach($datatab as $v){ ?>
            <article class="col-xs-12 col-sm-6 col-md-4 card" style="padding: 0px;">
                <h2><span><?=$v['menu']->nom();?></span></h2>
                <div class="text-center margin-top-min margin-bot-min">Description :</div>
                <p>
                    <?=$v['menu']->description();?>
                </p>
                <div class="text-center margin-top-min margin-bot-min">Conditions :</div>
                <p>
                    <?=$v['menu']->conditions();?>
                </p>
                <?php if(!empty($v['assocFormats'])) { ?>
                    <div class="display_products">
                        <?php foreach($v['assocFormats'] as $lnkFormat){ ?>
                            <aside>
                                <a style="color:white" tabindex="0" data-content="<?php echo $lnkFormat['objFormat']->format() . ' ' . TypeFormatTool::getType($lnkFormat['objFormat']->unite()); ?>" role="button" data-toggle="popover" data-trigger="focus" title="Formats inclus">
                                    <div class="content_prod_img" style="background-image: url('<?=$lnkFormat['imagePath'];?>')">

                                    </div>
                                    <div class="format_info">
                                        <span><?=$lnkFormat['nameProd'];?></span>
                                    </div>
                                </a>
                            </aside>
                        <?php } ?>
                    </div>
                <?php }else{ ?>
                    <p class="alert alert-warning">
                        Il n'y a pas de format associé à ce menu.
                    </p>
                <?php } ?>
                <p class="panel-footer spe-price" style="padding: 0px;">
                    <span class="special-prix prix-success"><?=$v['menu']->prix();?> €</span>
                </p>
            </article>
        <?php } ?>
    </div>
</div>



<?php require('Bundle/__BASE_ELEM_USER/PHP/footer.php');?>

</body>

<script src="Bundle/EnseigneUser/Ressources/JS/script.js"></script>
<?php if($_SESSION['preciseLocation'] == false){ ?>
    <script src="Bundle/EnseigneMenuUser/Ressources/JS/localisation.js"></script>
<?php } ?>


</html>
