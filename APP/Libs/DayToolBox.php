<?php
	class DayToolBox{
		public static function DayValidLong(string $day){
			$day = strtolower($day);
			switch($day){
				case 'lundi':
					return true;
					break;
				case 'mardi':
					return true;
					break;
				case 'mercredi':
					return true;
					break;
				case 'jeudi':
					return true;
					break;
				case 'vendredi':
					return true;
					break;
				case 'samedi':
					return true;
					break;
				case 'dimanche':
					return true;
					break;
				default:
					return false;
					break;
			}
		}

		public static function DayValidShort(string $day){
			$day = strtoupper($day);
			switch($day){
				case 'LUN':
					return true;
					break;
				case 'MAR':
					return true;
					break;
				case 'MER':
					return true;
					break;
				case 'JEU':
					return true;
					break;
				case 'VEN':
					return true;
					break;
				case 'SAM':
					return true;
					break;
				case 'DIM':
					return true;
					break;
				default:
					return false;
					break;
			}
		}

		public static function DayConvLong(strign $day){
			if(self::DayValidShort($day)){
				switch($day){
					case 'LUN':
						return 'lundi';
						break;
					case 'MAR':
						return 'mardi';
						break;
					case 'MER':
						return 'mercredi';
						break;
					case 'JEU':
						return 'jeudi';
						break;
					case 'VEN':
						return 'vendredi';
						break;
					case 'SAM':
						return 'samedi';
						break;
					case 'DIM':
						return 'dimanche';
						break;
					default:
						return false;
						break;
				}
			}
		}

		public static function DayConvShort(string $day){
			if(self::DayValidLong($day)){
				switch($day){
					case 'lundi':
						return 'LUN';
						break;
					case 'mardi':
						return 'MAR';
						break;
					case 'mercredi':
						return 'MER';
						break;
					case 'jeudi':
						return 'JEU';
						break;
					case 'vendredi':
						return 'VEN';
						break;
					case 'samedi':
						return 'SAM';
						break;
					case 'dimanche':
						return 'DIM';
						break;
					default:
						return false;
						break;
				}
			}
		}

		public static function DayTransform(string $day){
			if(self::DayValidShort($day)){
				return self::DayConvLong($day);
			}
			elseif(self::DayValidLong($day)){
				return self::DayConvShort($day);
			}
		}

		public static function convertToFR(string $day){
			if($day == 'Mon'){
				return 'LUN';
			}
			elseif($day == 'Tue'){
				return 'MAR';
			}
			elseif($day == 'Wed'){
				return 'MER';
			}
			elseif($day == 'Thu'){
				return 'JEU';
			}
			elseif($day == 'Fri'){
				return 'VEN';
			}
			elseif($day == 'Sun'){
				return 'DIM';
			}
			else{
				return false;
			}
		}
	}