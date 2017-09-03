<?php
    class TypeProduitTool{

        static $typ = [
            '0' => 'Indéfini',
            '1' => 'Pizza (plat)',
            '2' => 'Pizza (dessert)',
            '3' => 'Boisson (soft)',
            '4' => 'Boisson (alcoolisé)',
            '5' => 'Entrée',
            '6' => 'Plat (chaud)',
            '7' => 'Plat (froid)',
            '8' => 'Dessert',
            '9' => 'Viénoiserie',
            '10' => 'Sandwish (pain / chaud)',
            '11' => 'Sandwish (pain / froid)',
            '12' => 'Sandwish (galette / chaud)',
            '13' => 'Sandwish (galette / froid)'
        ];

        public static function genoptionList(){
            foreach(self::$typ as $k => $v){
                echo '<option value="'.$k.'">'.$v.'</option>';
            }
        }

        public static function genoptionListSelected($id){
            $id = (int) $id;
            foreach(self::$typ as $k => $v){
                if($id == intval($k)){
                    echo '<option value="'.$k.'" selected>'.$v.'</option>';
                }
                else{
                    echo '<option value="'.$k.'">'.$v.'</option>';
                }
            }
        }

        public static function isValid($d){
            $d = (int) $d;
            foreach(self::$typ as $k => $v){
                $k = (int) $k;
                if($d == $k){
                    return true;
                }
            }
            return false;
        }

        public static function getType($d){
            foreach(self::$typ as $k => $v){
                $k = (int) $k;
                if($d == $k){
                    return $v;
                }
            }
        }
    }