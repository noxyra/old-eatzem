<?php require('Bundle/Accueil/Controller/index.php'); ?>

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
                            <div class="card-header" data-background-color="red">
                                <h4 class="title">Tutoriel</h4>
                                <p class="category">Vous trouverez ici un guide pratique pour vous aider dans la gestion de votre compte Eatzem.</p>
                            </div>
                            <div class="card-content">

                                <article id="sommaire">
                                    <ul class="list-group">
                                        <li class="list-group-item"><a href="#crea">1. Création du profil d'une enseigne</a></li>
                                        <li class="list-group-item"><a href="#gest">2. Gestion Avancée</a></li>
                                        <li class="list-group-item"><a href="#ann">3. Annonces et Portefeuille</a></li>
                                    </ul>
                                </article>

                                <article id="crea">
                                    <h4>1. Création du profil d'une enseigne</h4>
                                    <p style="color: grey; font-style: italic; font-size: 16px;">a - Création d'un profil pour votre enseigne</p>
                                    <p>
                                        Nous vous recommandons, pour la création de votre premier profil d'enseigne, d'utiliser le mode de Création complète.<br />
                                        Cliquez sur l'onglet «+ Création (complète)». La création se fait en plusieurs étapes :<br /><br />

                                        -Création de l'enseigne : remplissez les différents champs en veillant à ne pas faire d'erreurs. Sachez qu'il vous sera possible par la suite de modifier facilement les informations que vous aurez renseignées tout au long de la création.<br />
                                        L'ajout d'un logo n'est pas obligatoire.<br /><br />

                                        -Sélection des horaires d'ouverture : indiquez vos horaires d'ouverture.<br /><br />

                                        -Ajout de produits : indiquez les produits que vous proposez à la vente dans votre enseigne.<br />
                                        L'ajout d'une image et de formats ne sont pas obligatoires.<br />
                                        Il vous est possible de préciser les ingrédients qui entrent dans la composition de votre produit (pratique pour les pizzas, sandwichs, crêpes, etc). Nous faisons en sorte d'établir une liste aussi exhaustive que possible. Si l'ajout d'un ingrédient à cette liste s’avérait nécessaire, vous pouvez nous contacter à l'adresse e-mail suivante afin que nous le rajoutions : contact@eatzem.fr.<br /><br />

                                        -Création de menus : indiquez les menus que vous proposez.<br />
                                        Vous pouvez préciser les éventuelles conditions requises pour que le client puisse bénéficier d'un menu et de son tarif.<br />
                                        Exemple : menu étudiant avec tarif préférentiel sous réserve de la présentation d'une carte étudiant.<br />
                                        Une fois les différents champs remplis, vous pouvez sélectionner les produits proposés dans votre menu. Si certains de vos produits existent sous plusieurs formats, faites attention à sélectionner le produit associé au format adéquat.<br /><br />

                                        -Création de vos modes de paiement : indiquez vos modes de paiement.<br /><br />

                                        Vous aurez alors créé votre premier profil d'enseigne. Pour le mettre en ligne et le rendre, ainsi que les annonces concernant l’enseigne, visibles aux visiteurs du site, vous devez cliquer sur le bouton «Passer en ligne» sur la vignette correspondant au profil de votre enseigne.
                                    </p>
                                    <p style="color: grey; font-style: italic; font-size: 16px;">b - Ajouter une enseigne</p>
                                    <p>
                                        Lorsque vous cliquez sur le bouton bleu «Ajouter une enseigne», vous avez accès à un mode de création simplifié : en effet, contrairement à la création d'enseigne dite «complète», elle ne vous demande de renseigner que les informations générales concernant votre enseigne. Les autres informations, c'est-à-dire les produits, menus, horaires, et modes de paiement associés à cette enseigne, devront être créées depuis le mode Gestion avancée si besoin puis associées à l'enseigne depuis l'onglet «Enseignes» de la Gestion avancée.<br /><br />

                                        La création rapide d’enseigne est pratique dans le cas où vous auriez besoin de créer un deuxième profil pour une enseigne semblable à la première (dans le cas d’une chaîne par exemple). Les produits, menus, horaires et modes de paiement ayant déjà été créés, vous n’aurez plus qu’à les associer au profil de votre enseigne via l’onglet "Enseignes" de la Gestion avancée.
                                    </p>
                                </article>

                                <article id="gest">
                                    <h4>2. Gestion Avancée</h4>
                                    <p style="color: grey; font-style: italic; font-size: 16px;">a - Gestion des enseignes</p>
                                    <p>
                                        Cette page réunie tous les profils d'enseigne que vous avez créés.<br />
                                        À partir de la vignette de votre enseigne, vous pouvez modifier les informations de l'enseigne, la prévisualiser, la supprimer, changer son statut de «en ligne» à «hors ligne» et gérer les horaires, menus, produits et modes de paiement associés que vous aurez créés en passant par la Gestion avancée ou au cours de la Création complète du profil d’une enseigne.<br />
                                        En effet, les horaires, menus, produits et modes de paiement que vous créez depuis la Gestion avancée ne sont pas associés à un profil d'enseigne, c'est à vous de le faire depuis l’onglet «Enseignes» de la Gestion avancée.
                                    </p>
                                    <p style="color: grey; font-style: italic; font-size: 16px;">b - Gestion des produits</p>
                                    <p>
                                        Depuis ce menu vous pouvez créer, modifier et supprimer vos produits.<br />
                                        Lorsque vous créez un produit depuis l’onglet «Produits» de la Gestion avancée, il ne vous est pas possible de lui associer directement un prix et un format. Une fois le produit créé, vous êtes renvoyés sur le menu de présentation et gestion des produits.  Sur la vignette correspondant à votre produit, cliquez sur le «+» (ajouter un format). Il vous est également possible d'attribuer un prix et un format à votre produit en cliquant sur «Formats» (gérer les formats), puis sur le bouton «Ajouter un format».<br />
                                        Pour modifier ou supprimer un prix ou un format, cliquez sur «Formats» (gérer les formats). Cliquez ensuite sur le bouton «modifier le format» ou «supprimer le format» dans la colonne «Gestion» du tableau.
                                    </p>
                                    <p style="color: grey; font-style: italic; font-size: 16px;">c - Gestion des menus</p>
                                    <p>
                                        Cliquez sur le bouton «Ajouter un menu», renseignez les champs et sauvegardez. Vous pouvez, si vous le souhaitez, indiquer les produits et leur format compris dans votre menu. Pour cela, cliquez sur le bouton «Formats» dans la colonne «Gestion» du tableau. Il ne vous est pas possible de créer des produits à partir de la Gestion des menus, veillez donc à créer au préalable tous les produits dont vous avez besoin pour composer vos menus.
                                    </p>
                                    <p style="color: grey; font-style: italic; font-size: 16px;">d - Gestion des plages horaires</p>
                                    <p>
                                        Sur cette page vous pouvez créer, modifier et supprimer vos plages horaires.
                                    </p>
                                    <p style="color: grey; font-style: italic; font-size: 16px;">e - Gestion des modes de paiement</p>
                                    <p>
                                        Sur cette page vous pouvez créer, modifier et supprimer vos modes de paiement.
                                    </p>
                                </article>

                                <article id="ann">
                                    <h4>3. Annonces et Portefeuille</h4>

                                    <p style="color: grey; font-style: italic; font-size: 16px;">a - Annonces</p>
                                    <p>
                                        Eatzem propose à ses utilisateurs la possibilité de publier des annonces à caractère publicitaire qui apparaîtront sur le profil de leur enseigne et sur la page d'accueil du site. Sur cette dernière, les annonces seront affichées selon leur date de publication et leur nombre sera limité : les annonces récentes remplaceront au fur et à mesure les plus anciennes. Selon la fréquence de publication d'annonces, il se peut que la vôtre n’y apparaissent que pour un temps très limité, mais elle restera affichée sur le profil de votre enseigne et visible par tous.<br />
                                        Afin d'offrir aux visiteurs du site un contenu pertinent, nous utilisons la géolocalisation : seuls les visiteurs situés dans un certain périmètre (que vous définissez vous-même en publiant votre annonce) verront votre annonce s'afficher sur la page d'accueil du site.
                                    </p>
                                    <p style="color: grey; font-style: italic; font-size: 16px;">b - Portefeuille</p>
                                    <p>
                                        La publication d'annonces étant un service publicitaire payant, un système de Portefeuille a été mis au point afin de ne pas être obligé de vous rediriger vers une page de paiement à chaque fois que vous souhaitez en publier une. Vous ne pouvez acheter qu'entre 2 et 50 crédits à la fois.<br /><br />

                                        Il vous sera bientôt possible de souscrire un abonnement pour recevoir une certaine quantité de crédits tous les mois pendant une durée que vous déterminerez.<br /><br />

                                        10 crédits vous ont d’ores et déjà été offerts à la suite de votre inscription sur Eatzem.<br /><br />
                                    </p>
                                </article>
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

</html>

