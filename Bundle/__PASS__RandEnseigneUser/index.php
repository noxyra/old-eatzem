<?php
    require('Bundle/__PASS__RandEnseigneUser/Controller/index.php');

    if(isset($redirect)){
        echo $redirect;
    }
?>



<html lang="fr">
<head>
    <!-- METAS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- TITLE / FAVICON -->
    <title>Accueil Eatzem</title>
    <link rel="shortcut icon" href="Upload/Graphisme/Icones/favicon.ico" type="image/x-icon">
    <link rel="icon" href="Upload/Graphisme/Icones/favicon.ico" type="image/x-icon">

    <!-- STYLESHEET -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="Bundle/__BASE_ELEM_USER/CSS/footer_header.css">
    <link rel="stylesheet" href="Bundle/__PASS__RandEnseigneUser/Ressources/CSS/article.css">

</head>
<body>
<?php require('APP/Widget/wid.pop.selecteurVille.php');?>
<?php //require('Bundle/__BASE_ELEM_USER/PHP/header_user.php');?>

<div id="fullpage">
        <div class="section" id="firstPage">
        <div class="centerize">
        <?php foreach($talker as $val){ ?>
            <p><?=$val;?></p>
        <?php } ?>
        </div>
    </div>
</div>


<?php //require('Bundle/__BASE_ELEM_USER/PHP/footer_pro.php');?>

</body>
<script src="APP/External/jQuery/jquery-3.1.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="APP/Widget/wid.pop.selecteurVille.js"></script>
<?php if($_SESSION['preciseLocation'] == false){ ?>
    <script src="Bundle/__PASS__RandEnseigneUser/Ressources/JS/localisation.js"></script>
<?php } ?>
</html>