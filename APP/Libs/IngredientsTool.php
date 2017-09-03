<?php
    class IngredientsTool{

        public static function genChoiceList(PDO $db){

            /**
             * Pour faire fonctionner cette fonction correctement, il faut un tableau d'ingredients classé par ordre alphabetique
             */

            $ingMan = new IngredientsManager($db);

            $ing_array = $ingMan->getAlpList();

            foreach($ing_array as $v){

                $actName = ucfirst($v->nom());
                $testLetter = substr($actName,0,1);

                if(!isset($currentLetter)){
                    $currentLetter = 'A';

                    // AFFICHAGE PREMIERE BARRE + PREMIER ITEM

                    echo '<div class="initialChar">'.$currentLetter.'</div>'; // AFFICHAGE DE LA BARRE
                    echo '<div class="contentCheckbox">'; // OUVERTURE DE LA BALISE CHECKBOX
                    echo '<input type="checkbox" id="' . $v->id() . '" name="'. $v->id() .'" /><label for="' . $v->id() . '">'. $actName .'</label>';

                }
                elseif($currentLetter == $testLetter){

                    // AFFICHAGE DES ITEMS
                    echo '<input type="checkbox" id="' . $v->id() . '" name="'. $v->id() .'" /><label for="' . $v->id() . '">'. $actName .'</label>';
                }
                elseif($currentLetter != $testLetter){
                    $currentLetter = $testLetter; // ACTUALISATION DE LA VARIABLE D'INDEX

                    // FERMETURE BOX INGREDIENTS + RESTART

                    echo '</div>'; // FERMETURE <div class="contentCheckbox">
                    echo '<div class="initialChar">'.$currentLetter.'</div>'; // AFFICHAGE DE LA BARRE
                    echo '<div class="contentCheckbox">'; // OUVERTURE DE LA BALISE CHECKBOX
                    echo '<input type="checkbox" id="' . $v->id() . '" name="'. $v->id() .'" /><label for="' . $v->id() . '">'. $actName .'</label>';
                }
            }

            // FERMETURE DE LA BALISE <div class="contentCheckbox">
            echo '</div>';


        }

        public static function genSelectedChoiceList(PDO $db, Produits $p){

            /**
             * Pour faire fonctionner cette fonction correctement, il faut un tableau d'ingredients classé par ordre alphabetique
             */

            $ingMan = new IngredientsManager($db);
            $prodMan = new ProduitsManager($db);

            $old_id = $prodMan->getIdTabIngr($p);

//            var_dump($old_id);

            $ing_array = $ingMan->getAlpList();

            foreach($ing_array as $v){

                $actName = ucfirst($v->nom());
                $testLetter = substr($actName,0,1);

                if(!isset($currentLetter)){
                    $currentLetter = 'A';

                    // AFFICHAGE PREMIERE BARRE + PREMIER ITEM

                    echo '<div class="initialChar">'.$currentLetter.'</div>'; // AFFICHAGE DE LA BARRE
                    echo '<div class="contentCheckbox">'; // OUVERTURE DE LA BALISE CHECKBOX
                    echo '<input type="checkbox" ';

                    if(in_array($v->id(), $old_id)){
                        echo 'checked';
                    }

                    echo ' id="' . $v->id() . '" name="'. $v->id() .'" /><label for="' . $v->id() . '">'. $actName .'</label>';

                }
                elseif($currentLetter == $testLetter){

                    // AFFICHAGE DES ITEMS
                    echo '<input type="checkbox" ';

                    if(in_array($v->id(), $old_id)){
                        echo 'checked';
                    }

                    echo ' id="' . $v->id() . '" name="'. $v->id() .'" /><label for="' . $v->id() . '">'. $actName .'</label>';
                }
                elseif($currentLetter != $testLetter){
                    $currentLetter = $testLetter; // ACTUALISATION DE LA VARIABLE D'INDEX

                    // FERMETURE BOX INGREDIENTS + RESTART

                    echo '</div>'; // FERMETURE <div class="contentCheckbox">
                    echo '<div class="initialChar">'.$currentLetter.'</div>'; // AFFICHAGE DE LA BARRE
                    echo '<div class="contentCheckbox">'; // OUVERTURE DE LA BALISE CHECKBOX
                    echo '<input type="checkbox" ';

                    if(in_array($v->id(), $old_id)){
                        echo 'checked';
                    }

                    echo ' id="' . $v->id() . '" name="'. $v->id() .'" /><label for="' . $v->id() . '">'. $actName .'</label>';
                }
            }

            // FERMETURE DE LA BALISE <div class="contentCheckbox">
            echo '</div>';
        }
    }