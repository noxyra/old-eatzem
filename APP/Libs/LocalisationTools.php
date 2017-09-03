<?php
    class LocalisationTools{
        public static function convertDistKm($dist){
            $dis_m = intval($dist);
            if($dis_m < 1000){
                echo $dis_m . ' m';
            }
            else{
                echo round($dis_m / 1000, 1) . ' Km';
            }
        }
    }