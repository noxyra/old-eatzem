<?php
	class Entreprise{

		// ATTRIBUTS

		private $_id;
		private $_nom;
		private $_email;
		private $_password;
		private $_adresse;
		private $_complement_adresse;
		private $_cp;
		private $_ville;
		private $_telephone;
		private $_siret;
		private $_etat_compte;
		private $_abonnement;
		private $_etat_abonnement;
		private $_fin_abonnement;
		private $_date_inscription;
		private $_token;
		private $_optin;
		private $_beta;
		private $_coins = 0;

		// METHODES

		public function hydrate(array $donnees){
			foreach($donnees as $key => $value){
				$method = 'set' . (ucfirst($key));
				if(method_exists($this, $method)){
					$this->$method($value);
				}
			}
		}

		public function __construct(array $donnees){
			$this->hydrate($donnees);
		}

			// GETTERS

		public function id(){ 					return $this->_id; }
		public function nom(){ 					return $this->_nom; }
		public function email(){ 				return $this->_email; }
		public function password(){ 			return $this->_password; }
		public function adresse(){ 				return $this->_adresse; }
		public function complement_adresse(){ 	return $this->_complement_adresse; }
		public function cp(){ 					return $this->_cp; }
		public function ville(){ 				return $this->_ville; }
		public function telephone(){ 			return $this->_telephone; }
		public function siret(){ 				return $this->_siret; }
		public function etat_compte(){ 			return $this->_etat_compte; }
		public function abonnement(){ 			return $this->_abonnement; }
		public function etat_abonnement(){ 		return $this->_etat_abonnement; }
		public function fin_abonnement(){ 		return $this->_fin_abonnement; }
		public function date_inscription(){ 	return $this->_date_inscription; }
		public function token(){				return $this->_token; }
		public function optin(){                return $this->_optin; }
		public function beta(){                 return $this->_beta; }
		public function coins(){                return $this->_coins; }

			// SETTERS

		public function setId($id){
			$id = (int) $id;
			$this->_id = $id;
		}

		public function setNom($nom){
			if(is_string($nom) AND StringToolBox::size($nom, 3, 100)){
				$this->_nom = $nom;
			}
		}

		public function setEmail($email){
			if(is_string($email) AND StringToolBox::size($email, 10, 100)){
				$this->_email = $email;
			}
		}

		public function setPassword($pass){
			if(is_string($pass) AND StringToolBox::size($pass, 8, 100)){
				$this->_password = $pass;
			}
		}

		public function setAdresse($addr){
			if(is_string($addr) AND StringToolBox::size($addr, 1, 100)){
				$this->_adresse = $addr;
			}
		}

		public function setComplement_adresse($addr){
			if(is_string($addr) AND (strlen($addr) <= 100)){
				$this->_complement_adresse = $addr;
			}
		}

		public function setCp($cp){
			if(is_string($cp) AND StringToolBox::size($cp, 5, 5)){
				$this->_cp = $cp;
			}
		}

		public function setVille($ville){
			if(is_string($ville) AND StringToolBox::size($ville, 1, 100)){
				$this->_ville = $ville;
			}
		}

		public function setTelephone($tel){
			if(is_string($tel) AND StringToolBox::size($tel, 10,10)){
				$this->_telephone = $tel;
			}
		}

		public function setSiret($sir){
			if(is_string($sir) AND StringToolBox::size($sir, 14, 14)){
				$this->_siret = $sir;
			}
		}

		public function setEtat_compte($etat){
			$etat = (int) $etat;
			$this->_etat_compte = $etat;
		}

		public function setAbonnement($abo){
			$abo = (int) $abo;
			$this->_abonnement = $abo;
		}

		public function setEtat_abonnement($etat){
			$etat = (int) $etat;
			$this->_etat_abonnement = $etat;
		}

		public function setFin_abonnement($end){
			$this->_fin_abonnement = $end;
		}

		public function setDate_inscription($date){
			$this->_date_inscription = $date;
		}

		public function setToken($tok){
			if(is_string($tok)){
				$this->_token = $tok;
			}
		}

        public function setOptin($opt){
            $opt = (int) $opt;
            $this->_optin = $opt;
        }

        public function setBeta($bt){
            $bt = (int) $bt;
            $this->_beta = $bt;
        }

        public function setCoins($coins){
            $coins = (int) $coins;
            $this->_coins = $coins;
        }

        public function payCoins(int $coins, $test = false){
            $coins = (int) $coins;
            if(($this->_coins - $coins) >= 0){
                if($test == false){
                    $this->_coins = $this->_coins - $coins;
                }
            }
            else{
                return false;
            }
            return true;
        }

        public function receiveCoins(int $coins){
            $coins = (int) $coins;
            $this->_coins += $coins;
        }
	}


