<?php
    class TypeFormatTool{

        static $typ = [
            '0' => 'n/a',
            '1' => 'mm',
            '2' => 'cm',
            '3' => 'm',
            '4' => "mg",
            '5' => "g",
            '6' => 'kg',
            '7' => 'ml',
            '8' => 'cl',
            '9' => 'l',
        ];

        public static function genoptionList(){
            foreach(self::$typ as $k => $v){
                echo '<option value="'.$k.'">'.$v.'</option>';
            }
        }

        public static function genCheckOptionList($id){
            $id = (int) $id;
            foreach(self::$typ as $k => $v){
                if(intval($k) == $id){
                    echo '<option value="'.$k.'" selected >'.$v.'</option>';
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

        public static function getType(int $d){
            foreach(self::$typ as $k => $v){
                $k = (int) $k;
                if($d == $k){
                    return $v;
                }
            }
        }
    }