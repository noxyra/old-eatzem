<?php require('Bundle/ResultatRecherche/Controller/index.php'); ?>

<html lang="fr">
<head>
    <!-- METAS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- TITLE / FAVICON -->
    <title>Accueil Eatzem</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="APP/External/FontAwesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="Bundle/__BASE_ELEM_USER/CSS/footer_header.css">
    <link rel="stylesheet" href="Bundle/Accueil/Ressources/CSS/article.css">

    <link rel="shortcut icon" href="Upload/Graphisme/Icones/favicon.ico" type="image/x-icon">
    <link rel="icon" href="Upload/Graphisme/Icones/favicon.ico" type="image/x-icon">

    <!-- STYLESHEET -->

</head>
<body>
<?php require('APP/Widget/wid.pop.selecteurVille.php');?>
<?php require('Bundle/__BASE_ELEM_USER/PHP/header_user.php');?>

<section id="sectionPrincipale">
    <div class="big_value">
        <h1 class="text_value">Résultat de votre recherche</h1>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">

            <?php if(isset($pop_up_error)){ ?>
                <p class="alert alert-warning">
                    <?=$pop_up_error;?>
                </p>
            <?php } ?>

        <?php foreach($results as $v){?>
            <div class="col-lg-4 col-md-6 col-sm-12 padding5px">
                <?php require('APP/Widget/wid.ens.affiche.php');?>
            </div>
        <?php } ?>
        </div>
    </div>


</section>

<?php require('Bundle/__BASE_ELEM_USER/PHP/footer_user.php');?>







</body>
<script src="APP/External/jQuery/jquery-3.1.0.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="APP/Widget/wid.pop.selecteurVille.js"></script>
<?php if($_SESSION['preciseLocation'] == false){ ?>
    <script src="Bundle/Accueil/Ressources/JS/localisation.js"></script>
<?php } ?>
</html>

<script>
    $(function(){
        $dspp = $('#display_search_panel');
        $clsp = $('#close_panel');
        $spb = $('#search_panel_bloc');

        $dspp.click(function(){
            $spb.css({ 'right' : "0px" });
        });

        $clsp.click(function(){
            $spb.css({ 'right' : "-300px" });
        });
    });
</script>