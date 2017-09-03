<?php
	class StringToolBox{
		// GESTION DE LA TAILLE D'UNE CHAINE
		public static function size( $test, $min, $max){
			if((strlen($test) >= $min) AND strlen($test) <= $max){
				return true;
			}
			else{
				return false;
			}
		}
	}