<?php
    class DebugToolBox{

        public static function DUMP($dumped){
            echo '<pre>';
            var_dump($dumped);
            echo '</pre>';
        }
    }