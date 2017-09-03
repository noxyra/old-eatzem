<?php
    class Security{
        public static function securizeArray(array $array){
            $result = [];
            foreach($array as $key => $value){
                $keyP = htmlspecialchars($key);
                $valP = htmlspecialchars($value);
                $result[$keyP] = $valP;
            }
            return $result;
        }
    }