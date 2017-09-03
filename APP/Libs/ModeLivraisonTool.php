<?php

    class ModeLivraisonTool {

        static $modes = [
            'Non',
            'Oui',
            'Midi Uniquement',
            'Soir Uniquement',
            'Oui (sauf dimanche)',
            'Oui (sauf week end)',
            'Midi uniquement (sauf dimanche)',
            "Midi uniquement (sauf week end)",
            "Soir uniquement (sauf dimanche)",
            "Soir uniquement (sauf week end)",
            "Midi (week end uniquement)",
            "Soir (week end uniquement)"
        ];

        static $modes_colored = [
            '<span class="text-danger">Non</span>',
            '<span class="text-success">Oui</span>',
            '<span class="text-success">Midi Uniquement</span>',
            '<span class="text-success">Soir Uniquement</span>',
            '<span class="text-success">Oui (sauf dimanche)</span>',
            '<span class="text-success">Oui (sauf week end)</span>',
            '<span class="text-success">Midi uniquement (sauf dimanche)</span>',
            "<span class=\"text-success\">Midi uniquement (sauf week end)</span>",
            "<span class=\"text-success\">Soir uniquement (sauf dimanche)</span>",
            "<span class=\"text-success\">Soir uniquement (sauf week end)</span>",
            "<span class=\"text-success\">Midi (week end uniquement)</span>",
            "<span class=\"text-success\">Soir (week end uniquement)</span>"
        ];

        public static function validMode($int){
            $int = (int) $int;
            foreach (self::$modes as $k => $v){
                if($k == $int){
                    return true;
                }
            }
            return false;
        }

        public static function buildSelect(){
            foreach(self::$modes as $k => $v){
                echo '<option value="' . $k . '">' . $v . '</option>';
            }
        }

        public static function buidSelectedSelect(Enseigne $e){
            foreach(self::$modes as $k => $v){
                echo '<option value="' . $k . '" ';

                if($e->livraison() == $k){
                    echo 'selected';
                }

                echo '>' . $v . '</option>';
            }
        }
        
        public static function getModeName($int, $colored = false){
            $int = (int) $int;

            if(self::validMode($int)){
                if($colored == false){
                    echo self::$modes[$int];
                }
                else{
                    echo self::$modes_colored[$int];
                }
            }
        }
    }