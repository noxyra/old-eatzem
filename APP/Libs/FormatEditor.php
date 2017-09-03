<?php

    class FormatEditor{

        public static function create(array $a, PDO $db){
            $ProdManager = new ProduitsManager($db);
            $Prod = $ProdManager->get($a['produits_id']);

            $add = new Format([]);

            // CHAMPS OPTIONNELS
            if(isset($a['promotion']) AND is_numeric($a['promotion']) AND (intval($a['promotion']) < 100)){
                $add->setPromotion($a['promotion']);

                if(isset($a['fin_promotion'])){
                    $add->setFin_promotion(DateToolBox::conv_us($a['fin_promotion']));
                }
            }

            // CHAMPS OBLIGATOIRES
            if(isset($a['format']) AND StringToolBox::size($a['format'], 1,20)){
                $add->setFormat($a['format']);
            }
            else{
                return 'Le format est invalide';
            }

            if(isset($a['unite']) AND TypeFormatTool::isValid($a['unite'])){
                $add->setUnite($a['unite']);
            }
            else{
                return 'L\'unité n\'est pas valide';
            }

            if(isset($a['prix'])){
                $prix = preg_replace('#,#', '.', $a['prix']);
                if(is_numeric($prix)){
                    $add->setPrix($prix);
                    $ProdManager->setFormat($Prod, $add);
                }
                else{
                    return 'Le prix n\'est pas valide';
                }
            }

        }

        public static function update(Format $add, array $a, PDO $db){
            $ProdManager = new ProduitsManager($db);
            $Prod = $ProdManager->get($add->produits_id());


            // CHAMPS OPTIONNELS
            if(isset($a['promotion']) AND is_numeric($a['promotion']) AND (intval($a['promotion']) < 100)){
                $add->setPromotion($a['promotion']);

                if(isset($a['fin_promotion'])){
                    $add->setFin_promotion(DateToolBox::conv_us($a['fin_promotion']));
                }
            }

            // CHAMPS OBLIGATOIRES
            if(isset($a['format']) AND StringToolBox::size($a['format'], 1,20)){
                $add->setFormat($a['format']);
            }
            else{
                return 'Le format est invalide';
            }

            if(isset($a['unite']) AND TypeFormatTool::isValid($a['unite'])){
                $add->setUnite($a['unite']);
            }
            else{
                return 'L\'unité n\'est pas valide';
            }

            if(isset($a['prix'])){
                $prix = preg_replace('#,#', '.', $a['prix']);
                if(is_numeric($prix)){
                    $add->setPrix($a['prix']);
                    $ProdManager->updateFormat($Prod, $add);
                }
                else{
                    return 'Le prix n\'est pas valide';
                }
            }
        }
    }