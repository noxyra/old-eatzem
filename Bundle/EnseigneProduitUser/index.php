<?php
    require('Bundle/EnseigneProduitUser/Controller/index.php');
?>

<html lang="fr">
<head>
    <?php require('Bundle/__BASE_ELEM_USER/PHP/metas.php');?>
</head>
<body>
<?php //require('APP/Widget/wid.pop.selecteurVille.php');?>
<?php require('Bundle/__BASE_ELEM_USER/PHP/header.php');?>

<div class="wrapper">
    <div class="container-fluid" style="padding: 0px; margin: 0px;">
        <header style="background-image: url('<?=ImageTools::pathEnseignePic($enseigne);?>')">
            <div class="white-filter centerize-conteneur int-spacing-min text-center">
                <h1><?=EnseigneCreator::HEADER($enseigne);?></h1>
                <h2>
                    <?php $i = 0 ; $imax = count($types); foreach ($types as $type){ ?>
                        <?=$type->type();?>
                        <?php $i++; if($i < $imax){ echo " | "; } ?>
                    <?php } ?>
                </h2>

                <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                    <nav class="navbar navbar-transparent" style="padding: 10px;border-radius: 15px;background: none;">
                        <?=EnseigneCreator::NAV($enseigne, $db);?>
                    </nav>
                </div>
            </div>
        </header>
    </div>
    <div class="container">
        <?php foreach($datatab as $produit){ ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <?php require('APP/Widget/wid.prod.affiche.php'); ?>
            </div>
        <?php } ?>
    </div>
</div>


<?php require('Bundle/__BASE_ELEM_USER/PHP/footer.php');?>

</body>

<?php if($_SESSION['preciseLocation'] == false){ ?>
    <script src="Bundle/EnseigneMenuUser/Ressources/JS/localisation.js"></script>
<?php } ?>


</html>