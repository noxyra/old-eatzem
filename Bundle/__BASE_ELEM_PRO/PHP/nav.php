<div class="sidebar" data-color="red" data-background-color="white">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->

    <div class="logo">
        <a href="http://eatzem.fr/?page=accueilPro" class="simple-text">
            Eatzem Pro
        </a>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="active">
                <a href="./?page=accueilPro">
                    <i class="material-icons">dashboard</i>
                    <p>Accueil</p>
                </a>
            </li>
            <li>
                <a href="./?page=profil_pro">
                    <i class="material-icons">person</i>
                    <p>Infos et Profil</p>
                </a>
            </li>

            <li>
                <a href="./?page=portefeuille_pro">
                    <i class="material-icons">monetization_on</i>
                    <p>Portefeuille<span class="badge pull-right" style="padding: 5px;position: relative; top: 3px;"><?=$_SESSION['guest_entreprise']->coins();?></span></p>
                </a>
            </li>
            <li>
                <a href="./?page=factures">
                    <i class="material-icons">receipt</i>
                    <p>Mes paiements</p>
                </a>
            </li>

            <hr>

            <li>
                <a href="./?page=poster_annonce">
                    <i class="material-icons">record_voice_over</i>
                    <p>Poster une annonce</p>
                </a>
            </li>
            <li>
                <a href="./?page=historique_annonce">
                    <i class="material-icons">reorder</i>
                    <p>Historique</p>
                </a>
            </li>

            <hr>

            <?php if($ENTREPRISE_MAN->countEnseignes($_SESSION['guest_entreprise']) == 0){ ?>
                <li>
                    <a href="./?page=enseigne_creator">
                        <i class="material-icons">stars</i>
                        <p>Je me référence !</p>
                    </a>
                </li>
            <?php }else{ ?>
                <li>
                    <a href="./?page=gestion_enseigne">
                        <i class="material-icons">store</i>
                        <p>Enseignes</p>
                    </a>
                </li>
                <li>
                    <a href="./?page=gestion_produits">
                        <i class="material-icons">label</i>
                        <p>Produits</p>
                    </a>
                </li>
                <li>
                    <a href="./?page=gestion_menus">
                        <i class="material-icons">class</i>
                        <p>Menus</p>
                    </a>
                </li>
                <li>
                    <a href="./?page=gestion_horaires">
                        <i class="material-icons">schedule</i>
                        <p>Plages horaires</p>
                    </a>
                </li>
                <li>
                    <a href="./?page=gestion_modePaiement">
                        <i class="material-icons">credit_card</i>
                        <p>Modes de paiement</p>
                    </a>
                </li>

            <?php } ?>

            <hr>

            <li>
                <a href="./?page=fonctionnement">
                    <i class="material-icons">import_contacts</i>
                    <p>Tutoriel</p>
                </a>
            </li>
        </ul>
    </div>
</div>