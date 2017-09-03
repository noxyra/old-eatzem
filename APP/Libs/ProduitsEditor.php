<?php
    class ProduitsEditor{

        public static function getName($id, PDO $db){
            $ProdMan = new ProduitsManager($db);
            $id = (int) $id;
            $Prod = $ProdMan->get($id);
            return $Prod->appelation();
        }

        public static function create(array $a, PDO $db){
            $EntManager = new EntrepriseManager($db);

            $add = new Produits([]);

            if(isset($a['duree_limite']) AND !empty($a['duree_limite'])){
                $add->setDuree_limite(DateToolBox::conv_us($a['duree_limite']));
            }

            if(isset($a['appelation']) AND StringToolBox::size($a['appelation'], 3, 80)){
                $add->setAppelation($a['appelation']);

                if(isset($a['type']) AND TypeProduitTool::isValid($a['type'])){
                    $add->setType($a['type']);
                    $EntManager->setProduits($_SESSION['guest_entreprise'], $add);

                    if(isset($_FILES) AND !empty($_FILES)) {
                        ImageTools::setProduitsPicture($add, $_FILES, $db);
                    }

//                    if(isset($a['activator_ing'])){
                        $assocMan = new ProduitsIngredientsManager($db);
                        foreach($a as $k => $v){
                            if(is_numeric($k)) {
                                $k = (int) $k;
                                $link = new ProduitsIngredients([
                                    'produits_id' => $add->id(),
                                    'ingredients_id' => intval($k)
                                ]);

                                if (!$assocMan->exists($link)) {
                                    $assocMan->add($link);
                                }
                            }
                        }
//                    }
                }
                else{
                    return 'Type de produit non valide';
                }
            }
            else{
                return 'Appelation non valide';
            }
        }

        public static function createAndGetSelected(array $a, PDO $db, Enseigne $enseigne){

            $EntManager = new EntrepriseManager($db);
            $EnsManager = new EnseigneManager($db);
            $add = new Produits([]);

            if(isset($a['activate_dur_lim'])){
                if(isset($a['duree_limite']) AND !empty($a['duree_limite'])){
                    $add->setDuree_limite(DateToolBox::conv_us($a['duree_limite']));
                }
            }

            if(isset($a['appelation']) AND StringToolBox::size($a['appelation'], 3, 80)){
                $add->setAppelation($a['appelation']);

                if(isset($a['type']) AND TypeProduitTool::isValid($a['type'])){
                    $add->setType($a['type']);
                    $EntManager->setProduits($_SESSION['guest_entreprise'], $add);
                    $EnsManager->setProduits($enseigne, $add->id());

                    $_SESSION['lastAddProduct'] = $add->id();

                    if(isset($_FILES) AND !empty($_FILES)) {
                        ImageTools::setProduitsPicture($add, $_FILES, $db);
                    }

//                    if(isset($a['activator_ing'])){
                        $assocMan = new ProduitsIngredientsManager($db);
                        foreach($a as $k => $v){
                            if(is_numeric($k)) {
                                $k = (int) $k;
                                $link = new ProduitsIngredients([
                                    'produits_id' => $add->id(),
                                    'ingredients_id' => intval($k)
                                ]);

                                if (!$assocMan->exists($link)) {
                                    $assocMan->add($link);
                                }
                            }
                        }
//                    }
                }
                else{
                    return 'Type de produit non valide';
                }
            }
            else{
                return 'Appelation non valide';
            }
        }

        public static function update(Produits $p, array $a, PDO $db){
            $EntManager = new EntrepriseManager($db);

            if(isset($a['duree_limite']) AND !empty($a['duree_limite'])){
                $p->setDuree_limite(DateToolBox::conv_us($a['duree_limite']));
            }

            // GERER L'IMAGE ICI

            if(isset($a['appelation']) AND StringToolBox::size($a['appelation'], 3, 80)){
                $p->setAppelation($a['appelation']);

                if(isset($a['type']) AND TypeProduitTool::isValid($a['type'])){
                    $p->setType($a['type']);
                    $EntManager->updateProduits($_SESSION['guest_entreprise'], $p);

                    if(isset($_FILES) AND !empty($_FILES)){
                        ImageTools::setProduitsPicture($p, $_FILES, $db);
                    }

//                    if(isset($a['activator_ing'])){
                        $prodManager = new ProduitsManager($db);
                        $prodManager->resetIngredients($p);

                        $assocMan = new ProduitsIngredientsManager($db);
                        foreach($a as $k => $v){
                            if(is_numeric($k)) {
                                $k = (int) $k;
                                $link = new ProduitsIngredients([
                                    'produits_id' => $p->id(),
                                    'ingredients_id' => intval($k)
                                ]);

                                if (!$assocMan->exists($link)) {
                                    $assocMan->add($link);
                                }
                            }
                        }
//                    }
                }
                else{
                    return 'Type de produit non valide';
                }
            }
            else{
                return 'Appelation non valide';
            }
        }
    }