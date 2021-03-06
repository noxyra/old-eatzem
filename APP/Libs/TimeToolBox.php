<?php
    class TimeToolBox{
        public static function isValidTime($str){
            $a = [
                "00:00:00",
                "00:30:00",
                "01:00:00",
                "01:30:00",
                "02:00:00",
                "02:30:00",
                "03:00:00",
                "03:30:00",
                "04:00:00",
                "04:30:00",
                "05:00:00",
                "05:30:00",
                "06:00:00",
                "06:30:00",
                "07:00:00",
                "07:30:00",
                "08:00:00",
                "08:30:00",
                "09:00:00",
                "09:30:00",
                "10:00:00",
                "10:30:00",
                "11:00:00",
                "11:30:00",
                "12:00:00",
                "12:30:00",
                "13:00:00",
                "13:30:00",
                "14:00:00",
                "14:30:00",
                "15:00:00",
                "15:30:00",
                "16:00:00",
                "16:30:00",
                "17:00:00",
                "17:30:00",
                "18:00:00",
                "18:30:00",
                "19:00:00",
                "19:30:00",
                "20:00:00",
                "20:30:00",
                "21:00:00",
                "21:30:00",
                "22:00:00",
                "22:30:00",
                "23:00:00",
                "23:30:00"
            ];


            if(is_string($str)){
                if(in_array($str,$a)){
                    return true;
                }
                else{
                    return false;
                }
            }

            return false;
        }

        public static function prOptionHor(){
            $a = [
                "Fermé"   => "Ind",
                "00:00" => "00:00:00",
                "00:30" => "00:30:00",
                "01:00" => "01:00:00",
                "01:30" => "01:30:00",
                "02:00" => "02:00:00",
                "02:30" => "02:30:00",
                "03:00" => "03:00:00",
                "03:30" => "03:30:00",
                "04:00" => "04:00:00",
                "04:30" => "04:30:00",
                "05:00" => "05:00:00",
                "05:30" => "05:30:00",
                "06:00" => "06:00:00",
                "06:30" => "06:30:00",
                "07:00" => "07:00:00",
                "07:30" => "07:30:00",
                "08:00" => "08:00:00",
                "08:30" => "08:30:00",
                "09:00" => "09:00:00",
                "09:30" => "09:30:00",
                "10:00" => "10:00:00",
                "10:30" => "10:30:00",
                "11:00" => "11:00:00",
                "11:30" => "11:30:00",
                "12:00" => "12:00:00",
                "12:30" => "12:30:00",
                "13:00" => "13:00:00",
                "13:30" => "13:30:00",
                "14:00" => "14:00:00",
                "14:30" => "14:30:00",
                "15:00" => "15:00:00",
                "15:30" => "15:30:00",
                "16:00" => "16:00:00",
                "16:30" => "16:30:00",
                "17:00" => "17:00:00",
                "17:30" => "17:30:00",
                "18:00" => "18:00:00",
                "18:30" => "18:30:00",
                "19:00" => "19:00:00",
                "19:30" => "19:30:00",
                "20:00" => "20:00:00",
                "20:30" => "20:30:00",
                "21:00" => "21:00:00",
                "21:30" => "21:30:00",
                "22:00" => "22:00:00",
                "22:30" => "22:30:00",
                "23:00" => "23:00:00",
                "23:30" => "23:30:00"
            ];

            foreach($a as $k => $v){
                echo '<option value="'.$v.'">'. $k .'</option>';
            }

        }

        public static function prOptionHorSelect($horaire){
            $a = [
                "00:00" => "00:00:00",
                "00:30" => "00:30:00",
                "01:00" => "01:00:00",
                "01:30" => "01:30:00",
                "02:00" => "02:00:00",
                "02:30" => "02:30:00",
                "03:00" => "03:00:00",
                "03:30" => "03:30:00",
                "04:00" => "04:00:00",
                "04:30" => "04:30:00",
                "05:00" => "05:00:00",
                "05:30" => "05:30:00",
                "06:00" => "06:00:00",
                "06:30" => "06:30:00",
                "07:00" => "07:00:00",
                "07:30" => "07:30:00",
                "08:00" => "08:00:00",
                "08:30" => "08:30:00",
                "09:00" => "09:00:00",
                "09:30" => "09:30:00",
                "10:00" => "10:00:00",
                "10:30" => "10:30:00",
                "11:00" => "11:00:00",
                "11:30" => "11:30:00",
                "12:00" => "12:00:00",
                "12:30" => "12:30:00",
                "13:00" => "13:00:00",
                "13:30" => "13:30:00",
                "14:00" => "14:00:00",
                "14:30" => "14:30:00",
                "15:00" => "15:00:00",
                "15:30" => "15:30:00",
                "16:00" => "16:00:00",
                "16:30" => "16:30:00",
                "17:00" => "17:00:00",
                "17:30" => "17:30:00",
                "18:00" => "18:00:00",
                "18:30" => "18:30:00",
                "19:00" => "19:00:00",
                "19:30" => "19:30:00",
                "20:00" => "20:00:00",
                "20:30" => "20:30:00",
                "21:00" => "21:00:00",
                "21:30" => "21:30:00",
                "22:00" => "22:00:00",
                "22:30" => "22:30:00",
                "23:00" => "23:00:00",
                "23:30" => "23:30:00"
            ];

            foreach($a as $k => $v){
                if($v == $horaire){
                    echo '<option value="'.$v.'" selected>'. $k .'</option>';
                }
                else{
                    echo '<option value="'.$v.'">'. $k .'</option>';
                }
            }
        }

        public static function nowIsBeetween($horaire1, $horaire2){
            // Reconstitution de l'heure courante
            $hc_pp = date('H:i:s');
            $parse0 = explode(':', $hc_pp);
            $hc = (int) $parse0[0] . $parse0[1] . $parse0[2];

            // Reconstitution de l'horaire 1
            $parse1 = explode(':', $horaire1);
            $h1 = (int) $parse1[0] . $parse1[1] . $parse1[2];

            // Reconstitution de l'horaire 2
            $parse2 = explode(':', $horaire2);
            $h2 = (int) $parse2[0] . $parse2[1] . $parse2[2];

            $v1 = ($h1 < $hc);
            $v2 = ($h2 > $hc);

            if($v1 AND $v2){
                return true;
            }
            else{
                return false;
            }
        }
    }