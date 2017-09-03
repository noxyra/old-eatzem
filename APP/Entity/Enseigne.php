<?php
	class Enseigne{

		// ATTRIBUTS

		private $_id;
		private $_nom;
		private $_description;
		private $_adresse;
		private $_complement_adresse;
		private $_cp;
		private $_ville;
		private $_telephone_fixe;
		private $_telephone_portable;
		private $_livraison;
		private $_rayon_livraison;
		private $_sur_place;
		private $_url;
		private $_logo;
		private $_lat;
		private $_lon;
		private $_dist;
		private $_open;
		private $_light;
		private $_dark;
		private $_elem1;
		private $_elem2;
		private $_contrast;
		private $_online;
		private $_annonces = [];

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
		public function description(){ 			return $this->_description; }
		public function adresse(){ 				return $this->_adresse; }
		public function complement_adresse(){ 	return $this->_complement_adresse; }
		public function cp(){ 					return $this->_cp; }
		public function ville(){ 				return $this->_ville; }
		public function telephone_fixe(){ 		return $this->_telephone_fixe; }
		public function telephone_portable(){ 	return $this->_telephone_portable; }
		public function livraison(){ 			return $this->_livraison; }
		public function rayon_livraison(){		return $this->_rayon_livraison; }
		public function sur_place(){ 			return $this->_sur_place; }
		public function url(){ 					return $this->_url; }
		public function logo(){ 				return $this->_logo; }
		public function lat(){					return $this->_lat; }
		public function lon(){					return $this->_lon; }
		public function dist(){					return $this->_dist; }
		public function open(){					return $this->_open; }
		public function light(){ return $this->_light; }
		public function dark(){ return $this->_dark; }
		public function elem1(){ return $this->_elem1; }
		public function elem2(){ return $this->_elem2; }
		public function contrast(){ return $this->_contrast; }
		public function online(){ return $this->_online; }
		public function annonces(){ return $this->_annonces; }

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

		public function setDescription($desc){
			if(is_string($desc) AND StringToolBox::size($desc, 0, 5000)){
				$this->_description = $desc;
			}
		}

		public function setAdresse($addr){
			if(is_string($addr) AND StringToolBox::size($addr, 3, 100)){
				$this->_adresse = $addr;
			}
		}

		public function setComplement_adresse($addr){
			if(is_string($addr) AND StringToolBox::size($addr, 0, 100)){
				$this->_complement_adresse = $addr;
			}
		}

		public function setCp($cp){
			if(is_string($cp) AND StringToolBox::size($cp, 5, 5)){
				$this->_cp = $cp;
			}
		}

		public function setVille($vill){
			if(is_string($vill) AND StringToolBox::size($vill, 1, 100)){
				$this->_ville = $vill;
			}
		}

		public function setTelephone_fixe($tel){
			if(is_string($tel) AND StringToolBox::size($tel, 10, 10)){
				$this->_telephone_fixe = $tel;
			}
		}

		public function setTelephone_portable($tel){
			if(is_string($tel) AND StringToolBox::size($tel, 10, 10)){
				$this->_telephone_portable = $tel;
			}
		}

		public function setLivraison($livr){
			$livr = (int) $livr;
			$this->_livraison = $livr;
		}

		public function setRayon_livraison($rayon){
			$rayon = (int) $rayon;
			$this->_rayon_livraison = $rayon;
		}

		public function setSur_place($sp){
			$sp = (int) $sp;
			// 0 = non / 1 = oui
			if(($sp == 0) OR ($sp == 1)){
				$this->_sur_place = $sp;
			}
		}

		public function setUrl($url){
			if(is_string($url) AND StringToolBox::size($url, 8, 45)){
				$this->_url = $url;
			}
		}

		public function setLogo($logo){
			if(is_string($logo) AND StringToolBox::size($logo, 0, 200)){
				$this->_logo = $logo;
			}
		}

		public function setLat($lat){
			// PEUT FONCTIONNER SANS VERIFICATION [GOOGLE API IS CHECKED]
			$this->_lat = $lat;
		}

		public function setLon($lon){
			// PEUT FONCTIONNER SANS VERIFICATION [GOOGLE API IS CHECKED]
			$this->_lon = $lon;
		}

		public function setDist($dist){
			$this->_dist = $dist;
		}

		public function setOpen($open){
			$this->_open = $open;
		}

		public function setLight($light){
			if(is_string($light)){
				$this->_light = $light;
			}
		}

		public function setDark($dark){
			if(is_string($dark)){
				$this->_dark = $dark;
			}
		}

		public function setElem1($e){
			if(is_string($e)){
				$this->_elem1 = $e;
			}
		}

		public function setElem2($e){
			if(is_string($e)){
				$this->_elem2 = $e;
			}
		}

		public function setContrast($c){
			if(is_string($c)){
				$this->_contrast = $c;
			}
		}

		public function setOnline($o){
	        $o = (int) $o;
			if(is_int($o)){
				$this->_online = $o;
			}
		}

		public function setAnnonces($annonce){
		    $this->_annonces = $annonce;
        }

        public function hydrateAnnonces($db){
            $AnnManager = new AnnoncesManager($db);
            $this->_annonces = $AnnManager->getEnseigneList($this);
        }
	}