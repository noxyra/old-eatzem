<?php
    class Seeker{
        // TODO Provisoirement traiter les parties relous en PHP passer en full SQL Quand j'ai le temps
        public static function enseigne(array $a, $db){
            $enseigneManager = new EnseigneManager($db);
            $finalList = [];
            if(isset($a['distance_max'])){
                if($a['distance_max'] == "5"){
                    $dist_max = 5;
                }
                elseif($a['distance_max'] == "15"){
                    $dist_max = 15;
                }
                elseif($a['distance_max'] == "30"){
                    $dist_max = 30;
                }
                elseif($a['distance_max'] == "50"){
                    $dist_max = 50;
                }
                elseif($a['distance_max'] == "100"){
                    $dist_max = 100;
                }
                else{
                    $dist_max = 5;
                }
            }
            $listEnseignes = $enseigneManager->getEnseignesAround($_SESSION['localisationVisiteur']['lat'], $_SESSION['localisationVisiteur']['lon'], $dist_max);

//            echo 'lol';

            foreach ($listEnseignes as $enseigne){
//                echo 'lol';
                $valide = true;
//                echo 'loli';

                if(isset($a['type']) AND ($a['type'] != 'ind')){
                    $type = (int) $a['type'];
                    $typeList = $enseigneManager->getTypeList($enseigne);
                    $ids = [];
                    foreach ($typeList as $v){
                        $ids[] = $v->id();
                    }

                    if(!in_array($type, $ids)){
                        $valide = false;
                    }
                }

                if(isset($a['sur_place'])){
                    if($enseigne->sur_place() != 1){
                        $valide = false;
                    }
                }

//                echo $valide;

                if(isset($a['livraison'])){
                    if($enseigne->livraison() == 1){
                        if($a['rayon_livraison'] == "5"){
                            $val = 5;
                            if($enseigne->rayon_livraison() < 5){
                                $valide = false;
                            }
                        }
                        elseif($a['rayon_livraison'] == "10"){
                            $val = 10;
                            if($enseigne->rayon_livraison() < 10){
                                $valide = false;
                            }
                        }
                        elseif($a['rayon_livraison'] == "15"){
                            $val = 15;
                            if($enseigne->rayon_livraison() < 15){
                                $valide = false;
                            }
                        }
                    }
                    else{
                        $valide = false;
                    }
                }

//                echo $valide;

                if(isset($a['name']) AND !empty($a['name'])){
                    $match = "#" . $a['name'] . "#i";
                    if(preg_match($match, $enseigne->nom()) OR preg_match($match, $enseigne->description())){
                        // C'est cool
                    }
                    else{
                        $valide = false;
                    }
                }

//                echo $valide;

                if(isset($a['open']) AND $a['open'] != 'osef'){
                    if($a['open'] == "today"){
                        if($enseigneManager->hydrateOpenEns($enseigne) == "Ouvert aujourd'hui"){
                            // C'est cool
                        }
                        else{
                            $valide = false;
                        }
                    }
                    elseif($a['open'] == "now"){
                        if($enseigneManager->hydrateOpenEns($enseigne) == "Ouvert"){
                            // C'est cool
                        }
                        else{
                            $valide = false;
                        }
                    }
                }

//                echo $valide;

                if($valide == true){
                    $finalList[] = $enseigne;
                }
            }

            return $finalList;
        }
    }