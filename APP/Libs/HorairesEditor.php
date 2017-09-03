<?php

    class HorairesEditor{
        
        public static function create(array $a, PDO $db){
            $EntManager = new EntrepriseManager($db);
            $add = new Horaires([]);
            if(isset($a['jour']) AND DayToolBox::DayValidShort($a['jour'])){
                $add->setJour($a['jour']);
                if(isset($a['heureO']) AND TimeToolBox::isValidTime($a['heureO'])){
                    $add->setHeureO($a['heureO']);
                    if(isset($a['heureF']) AND TimeToolBox::isValidTime($a['heureF'])){
                        $add->setHeureF($a['heureF']);
                        $EntManager->setHoraires($_SESSION['guest_entreprise'], $add);
                        return false;
                    }else{ return 'Heure de fermeture non valide'; }
                }else{ return 'Heure d\'ouverture non valide'; }
            }else{ return 'Jour non valide'; }
        }

        public static function update(Horaires $add, array $a, PDO $db){
            $EntManager = new EntrepriseManager($db);
            if(isset($a['jour']) AND DayToolBox::DayValidShort($a['jour'])){
                $add->setJour($a['jour']);
                if(isset($a['heureO']) AND TimeToolBox::isValidTime($a['heureO'])){
                    $add->setHeureO($a['heureO']);
                    if(isset($a['heureF']) AND TimeToolBox::isValidTime($a['heureF'])){
                        $add->setHeureF($a['heureF']);
                        $EntManager->updateHoraires($_SESSION['guest_entreprise'], $add);
                        return false;
                    }
                    else{ return 'Heure de fermeture non valide'; }
                }else{ return 'Heure d\'ouverture non valide'; }
            }else{ return 'Jour non valide'; }
        }
    }