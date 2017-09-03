<?php

    class EnseigneCreator{

        // ATTRIBUTS

        // METHODES

        public static function HEADER(Enseigne $e){
//            if(is_null($e->logo()) OR empty($e->logo())){
                return '<h1 class="text_name_enseigne">'.$e->nom().'</h1>';
//            }
//            else{
//                return '<h1 style="display: none">'.$e->nom().'</h1><img style="width: auto; height: auto" title="'.$e->nom().'" src="'.ImageTools::pathEnseignePic($e).'" class="logo_header_enseigne" />';
//            }
        }

        public static function NAV(Enseigne $e, PDO $db){
            /**
             * Récupérer le nombre d'associations et construire le menu en fonction :
             *
             * - Mode de paiement (dans la page principale : informations [ aside ])
             * - Horaires (dans la page principale : informations [ aside ])
             * - Menus
             * - Produits
             *
             */

            $EnsManager = new EnseigneManager($db);

            $samp_nav_1 = '<span class="nav_item">';
            $samp_nav_2 = '</span>';

            $menu_nb = count($EnsManager->getListMenu($e));

            // Liste de produits a traiter
            $prod_list = $EnsManager->getProdList($e);

            //Preparation des tableaux

            $entree = [];
            $plat = [];
            $pizza = [];
            $dessert = [];
            $sandwish = [];
            $vienoiserie = [];
            $boisson = [];

            /* PREPARATION */

            foreach($prod_list as $v){
                if($v->type() == 5){
                    $entree[] = $v;
                }
                elseif (($v->type() == 6) OR ($v->type() == 7)){
                    $plat[] = $v;
                }
                elseif(($v->type() == 1) OR ($v->type() == 2)){
                    $pizza[] = $v;
                }
                elseif ($v->type() == 8){
                    $dessert[] = $v;
                }
                elseif (($v->type() == 10) OR ($v->type() == 11) OR ($v->type() == 12) OR ($v->type() == 13)){
                    $sandwish[] = $v;
                }
                elseif ($v->type() == 9){
                    $vienoiserie[] = $v;
                }
                elseif (($v->type() == 3) OR ($v->type() == 4)){
                    $boisson[] = $v;
                }
            }

            /* COMPTEUR */

            $nb_entree = count($entree);
            $nb_plat = count($plat);
            $nb_pizza = count($pizza);
            $nb_dessert = count($dessert);
            $nb_sandwish = count($sandwish);
            $nb_vienoiserie = count($vienoiserie);
            $nb_boisson = count($boisson);

            /* AFFICHEUR */

                // INFORMATION : ALL

            echo '<a class="btn btn-primary" title="Information de '. $e->nom() . '" href="./?enseigne='.$e->url().'">Informations</a>';

//            echo '<a title="Présentation de '. $e->nom() . '" href="./?enseigne='.$e->url().'"><span>' . $samp_nav_1 . 'Présentation' . $samp_nav_2 . '</span></a>';

            if($menu_nb > 0){
                echo '<a class="btn btn-success" title="Menus de ' . $e->nom() . '" href="./?enseigne='.$e->url().'&select=menus">Menus</a>';
            }

            if($nb_entree > 0){
                echo '<a class="btn btn-danger" title="Voir les entrées de ' . $e->nom() . '" href="./?enseigne='.$e->url().'&select=entrees">Entrées</a>';
            }

            if($nb_plat > 0){
                echo '<a class="btn btn-danger" title="Voir les plats de ' . $e->nom() . '" href="./?enseigne='.$e->url().'&select=plats">Plats</a>';
            }

            if($nb_pizza > 0){
                echo '<a class="btn btn-danger" title="Voir les pizzas de ' . $e->nom() . '" href="./?enseigne='.$e->url().'&select=pizzas">Pizzas</a>';
            }

            if($nb_dessert > 0){
                echo '<a class="btn btn-danger" title="Voir les desserts de ' . $e->nom() . '" href="./?enseigne='.$e->url().'&select=desserts">Desserts</a>';
            }

            if($nb_sandwish > 0){
                echo '<a class="btn btn-danger" title="Voir les sandwichs de ' . $e->nom() . '" href="./?enseigne='.$e->url().'&select=sandwichs">Sandwichs</a>';
            }

            if($nb_vienoiserie > 0){
                echo '<a class="btn btn-danger" title="Voir les viénoiseries de ' . $e->nom() . '" href="./?enseigne='.$e->url().'&select=vienoiseries">Viénoiseries</a>';
            }

            if($nb_boisson > 0){
                echo '<a class="btn btn-info" title="Voir les boissons de ' . $e->nom() . '" href="./?enseigne='.$e->url().'&select=boissons">Boissons</a>';
            }
        }

        public static function FAKE_NAV(Enseigne $e, PDO $db){
            /**
             * Récupérer le nombre d'associations et construire le menu en fonction :
             *
             * - Mode de paiement (dans la page principale : informations [ aside ])
             * - Horaires (dans la page principale : informations [ aside ])
             * - Menus
             * - Produits
             *
             */

            $EnsManager = new EnseigneManager($db);

            $samp_nav_1 = '<span class="nav_item">';
            $samp_nav_2 = '</span>';

            $menu_nb = count($EnsManager->getListMenu($e));

            // Liste de produits a traiter
            $prod_list = $EnsManager->getProdList($e);

            //Preparation des tableaux

            $entree = [];
            $plat = [];
            $pizza = [];
            $dessert = [];
            $sandwish = [];
            $vienoiserie = [];
            $boisson = [];

            /* PREPARATION */

            foreach($prod_list as $v){
                if($v->type() == 5){
                    $entree[] = $v;
                }
                elseif (($v->type() == 6) OR ($v->type() == 7)){
                    $plat[] = $v;
                }
                elseif(($v->type() == 1) OR ($v->type() == 2)){
                    $pizza[] = $v;
                }
                elseif ($v->type() == 8){
                    $dessert[] = $v;
                }
                elseif (($v->type() == 10) OR ($v->type() == 11) OR ($v->type() == 12) OR ($v->type() == 13)){
                    $sandwish[] = $v;
                }
                elseif ($v->type() == 9){
                    $vienoiserie[] = $v;
                }
                elseif (($v->type() == 3) OR ($v->type() == 4)){
                    $boisson[] = $v;
                }
            }

            /* COMPTEUR */

            $nb_entree = count($entree);
            $nb_plat = count($plat);
            $nb_pizza = count($pizza);
            $nb_dessert = count($dessert);
            $nb_sandwish = count($sandwish);
            $nb_vienoiserie = count($vienoiserie);
            $nb_boisson = count($boisson);

            /* AFFICHEUR */

            // INFORMATION : ALL

            echo '<a title="Information de '. $e->nom() . '" href="#"><span>' . $samp_nav_1 . 'Informations' . $samp_nav_2 . '</span></a>';

//            echo '<a title="Présentation de '. $e->nom() . '" href="./?enseigne='.$e->url().'"><span>' . $samp_nav_1 . 'Présentation' . $samp_nav_2 . '</span></a>';

            if($menu_nb > 0){
                echo '<a title="Menus de ' . $e->nom() . '" href="#"><span>' . $samp_nav_1 . 'Menus <span class="char_bg_recolor">' . $menu_nb . '</span>' . $samp_nav_2 . '</span></a>';
            }

            if($nb_entree > 0){
                echo '<a title="Voir les entrées de ' . $e->nom() . '" href="#"><span>'.$samp_nav_1 . 'Entrées <span class="char_bg_recolor">'.$nb_entree.'</span>'.$samp_nav_2.'</span></a>';
            }

            if($nb_plat > 0){
                echo '<a title="Voir les plats de ' . $e->nom() . '" href="#"><span>'.$samp_nav_1 . 'Plats <span class="char_bg_recolor">'.$nb_plat.'</span>'.$samp_nav_2.'</span></a>';
            }

            if($nb_pizza > 0){
                echo '<a title="Voir les pizzas de ' . $e->nom() . '" href="#"><span>'.$samp_nav_1 . 'Pizzas <span class="char_bg_recolor">'.$nb_pizza.'</span>'.$samp_nav_2.'</span></a>';
            }

            if($nb_dessert > 0){
                echo '<a title="Voir les desserts de ' . $e->nom() . '" href="#"><span>'.$samp_nav_1 . 'Desserts <span class="char_bg_recolor">'.$nb_dessert.'</span>'.$samp_nav_2.'</span></a>';
            }

            if($nb_sandwish > 0){
                echo '<a title="Voir les sandwichs de ' . $e->nom() . '" href="#"><span>'.$samp_nav_1 . 'Sandwichs <span class="char_bg_recolor">'.$nb_sandwish.'</span>'.$samp_nav_2.'</span></a>';
            }

            if($nb_vienoiserie > 0){
                echo '<a title="Voir les viénoiseries de ' . $e->nom() . '" href="#"><span>'.$samp_nav_1 . 'Viénoiseries <span class="char_bg_recolor">'.$nb_vienoiserie.'</span>'.$samp_nav_2.'</span></a>';
            }

            if($nb_boisson > 0){
                echo '<a title="Voir les boissons de ' . $e->nom() . '" href="#"><span>'.$samp_nav_1 . 'Boissons <span class="char_bg_recolor">'.$nb_boisson.'</span>'.$samp_nav_2.'</span></a>';
            }
        }
    }