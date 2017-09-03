<?php
    class DateToolBox{

        public static function detectformat($d){
            if(is_string($d)) {
//            echo $d;
                $parsed = preg_replace('#-#', '/', $d);

                $exp = explode('/', $parsed);


                if (strlen($exp[0]) == 4) {
                    return 'US';
                } elseif (strlen($exp[0]) == 2) {
                    return 'FR';
                } else {
                    return false;
                }
            }
        }

        public static function conv_fr($d, $splitTime = false){
            if(is_string($d)) {
                if($splitTime = true){
                    $prepare = explode(' ', $d);
                    $d = $prepare[0];
                }


                if (self::detectformat($d) == 'FR') {
                    return $d;
                } elseif (self::detectformat($d) == 'US') {
                    $parsed = preg_replace('#-#', '/', $d);
                    $exp = explode('/', $parsed);

                    $j = $exp[2];
                    $m = $exp[1];
                    $a = $exp[0];

                    return $j . '/' . $m . '/' . $a;
                } else {
                    return false;
                }
            }
        }

        public static function conv_us($d){
            if(is_string($d)) {
                if (self::detectformat($d) == 'FR') {
                    $parsed = preg_replace('#-#', '/', $d);
                    $exp = explode('/', $parsed);

                    $j = $exp[0];
                    $m = $exp[1];
                    $a = $exp[2];

                    return $a . '/' . $m . '/' . $j;
                } elseif (self::detectformat($d) == 'US') {
                    return $d;
                } else {
                    return false;
                }
            }
        }

        public static function convHorTime($hor){
            $parsed = explode(':', $hor);
            $timed = '';
            foreach($parsed as $v){
                $timed .= $v;
            }

            return intval($timed);

        }
        
        public static function when($date){
            $current = date('Ymd');
            $conv_current = intval($current);


            $conv_date = intval(str_replace('-', '', $date));

//            echo $conv_current . ' | ' . $conv_date;

            if($conv_current < $conv_date){
                return 'FU';
            }
            elseif ($conv_current == $conv_date){
                return 'PR';
            }
            else{
                return 'PA';
            }
        }

        public static function tempsRestant($echeance, $now = null){
            /**
             * ATTENTION L'ECHEANCE DOIT ETRE UNE DATE AMERICAINE
             */
            if($now == null){
                return floor((strtotime($echeance) - time())/86400);
            }
            else{
                return floor((strtotime($echeance) - strtotime($now))/86400);
            }
        }
    }