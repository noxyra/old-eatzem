<?php

    class MenusEditor{

        public static function create(array $a, PDO $db){
            $EntManager = new EntrepriseManager($db);

            $add = new Menu([]);

            if(isset($a['conditions']) AND !empty($a['conditions'])){
                $add->setConditions($a['conditions']);
            }

            if(isset($a['nom']) AND StringToolBox::size($a['nom'], 3, 45)){
                $add->setNom($a['nom']);

                if(isset($a['description']) AND StringToolBox::size($a['nom'], 3, 1500)){
                    $add->setDescription($a['description']);

                    if(isset($a['prix']) AND !empty($a['prix'])){
                        $add->setPrix($a['prix']);
                        $EntManager->setMenus($_SESSION['guest_entreprise'], $add);
                    }
                }
                else{
                    return 'La description est pas valide';
                }
            }
            else{
                return 'Le nom est invalide';
            }
        }

        public static function createAndGetSelected(array $a, PDO $db, Enseigne $enseigne){
            $EntManager = new EntrepriseManager($db);
            $EnsManager = new EnseigneManager($db);

            $add = new Menu([]);

            if(isset($a['conditions']) AND !empty($a['conditions'])){
                $add->setConditions($a['conditions']);
            }

            if(isset($a['nom']) AND StringToolBox::size($a['nom'], 3, 45)){
                $add->setNom($a['nom']);

                if(isset($a['description']) AND StringToolBox::size($a['nom'], 3, 1500)){
                    $add->setDescription($a['description']);

                    if(isset($a['prix']) AND !empty($a['prix'])){
                        $add->setPrix($a['prix']);
                        $EntManager->setMenus($_SESSION['guest_entreprise'], $add);
                        $EnsManager->setMenu($enseigne, $add->id());

//                        DebugToolBox::DUMP($add);

                        $_SESSION['lastMenuAdded'] = $add;
                    }
                }
                else{
                    return 'La description est pas valide';
                }
            }
            else{
                return 'Le nom est invalide';
            }
        }

        public static function update(Menu $add, array $a, PDO $db){
            $EntManager = new EntrepriseManager($db);

            if(isset($a['conditions']) AND !empty($a['conditions'])){
                $add->setConditions($a['conditions']);
            }

            if(isset($a['nom']) AND StringToolBox::size($a['nom'], 3, 45)){
                $add->setNom($a['nom']);

                if(isset($a['description']) AND StringToolBox::size($a['nom'], 3, 1500)){
                    $add->setDescription($a['description']);

                    if(isset($a['prix']) AND !empty($a['prix'])){
                        $add->setPrix($a['prix']);
                        $EntManager->updateMenu($_SESSION['guest_entreprise'], $add);
                    }
                }
                else{
                    return 'La description est pas valide';
                }
            }
            else{
                return 'Le nom est invalide';
            }
        }
    }