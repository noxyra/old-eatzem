<?php
    class GeocodingGoogle
    {
        // ATTRIBUTS
        const API_KEY = 'AIzaSyC_R5TwWnlDnPRUoxvr_cqwwTxmdT5Rghw';
        const URL1 = 'https://maps.googleapis.com/maps/api/geocode/json?address=';
        const URL2 = '&key=';

        // METHODES
        public static function geocode($addresse){
//            var_dump($addresse);

            $addresse = str_replace(' ', '+', $addresse);
            $addresse = str_replace(',', '+', $addresse);
            $addresse = str_replace(';', '+', $addresse);
            $addresse = str_replace('-', '+', $addresse);
            $addresse = str_replace('_', '+', $addresse);

            $query = self::URL1 . $addresse . self::URL2 . self::API_KEY;
            $result = file_get_contents($query);

//            var_dump($query);

            $decode = json_decode($result);

//            var_dump($result);

            $return = [
                'lat' => $decode->{'results'}[0]->{'geometry'}->{'location'}->{'lat'},
                'lon' => $decode->{'results'}[0]->{'geometry'}->{'location'}->{'lng'}
            ];

            return $return;
        }
    }