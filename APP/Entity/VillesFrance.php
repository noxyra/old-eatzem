<?php
	class VillesFrance{

		// ATTRIBUTS

		private $_ville_id;
		private $_ville_departement;
		private $_ville_nom;
		private $_ville_nom_reel;
		private $_ville_code_postal;
		private $_ville_longitude_deg;
		private $_ville_latitude_deg;

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

		public function ville_id(){ return $this->_ville_id; }
		public function ville_departement(){ return $this->_ville_departement; }
		public function ville_nom(){ return $this->_ville_nom; }
		public function ville_nom_reel(){ return $this->_ville_nom_reel; }
		public function ville_code_postal(){ return $this->_ville_code_postal; }
		public function ville_longitude_deg(){ return $this->_ville_longitude_deg; }
		public function ville_latitude_deg(){ return $this->_ville_latitude_deg; }

			// SETTERS

		public function setVille_id($id){
			// VERIFICATION UNIQUEMENT POUR EVITER LE TRANSTYPAGE
			$id = (int) $id;
			$this->_ville_id = $id;
		}

		public function setVille_departement($dep){
			// BDD OFFICIELLE PAS BESOIN DE VERIF
			$this->_ville_departement = $dep;
		}

		public function setVille_nom($nom){
			// BDD OFFICIELLE PAS BESOIN DE VERIF
			$this->_ville_nom = $nom;
		}

		public function setVille_nom_reel($nom){
			// BDD OFFICIELLE PAS BESOIN DE VERIF
			$this->_ville_nom_reel = $nom;
		}

		public function setVille_code_postal($cp){
			// BDD OFFICIELLE PAS BESOIN DE VERIF
			$this->_ville_code_postal = $cp;
		}

		public function setVille_longitude_deg($deg){
			// BDD OFFICIELLE PAS BESOIN DE VERIF
			$this->_ville_longitude_deg = $deg;
		}

		public function setVille_latitude_deg($deg){
			// BDD OFFICIELLE PAS BESOIN DE VERIF
			$this->_ville_latitude_deg = $deg;
		}
	}