<?php
    class UrlChecker{

        // ATTRIBUTS

        // METHODES

        public static function EnseigneCheck($url, PDO $db){
            $EnsMan = new EnseigneManager($db);
            return $EnsMan->urlExists($url);
        }
    }