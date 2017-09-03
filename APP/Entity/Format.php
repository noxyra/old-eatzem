<?php
	class Format{
		// ATTRIBUTS
		private $_produits_id;
		private $_id;
		private $_format;
		private $_unite;
		private $_prix;
		private $_promotion;
		private $_fin_promotion;
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

		public function produits_id(){ return $this->_produits_id; }
		public function id(){ return $this->_id; }
		public function format(){ return $this->_format; }
		public function unite(){ return $this->_unite; }
		public function prix(){ return $this->_prix; }
		public function promotion(){ return $this->_promotion; }
		public function fin_promotion(){ return $this->_fin_promotion; }

			// SETTERS

		public function setProduits_id($id){
			$id = (int) $id;
			$this->_produits_id = $id;
		}

		public function setId($id){
			$id = (int) $id;
			$this->_id = $id;
		}

		public function setFormat($form){
			if(is_string($form) AND StringToolBox::size($form, 1, 20)){
				$this->_format = $form;
			}
		}

		public function setUnite($unit){
			// CREER OBJET DE VERIFICATION UNITE VALIDE [0 : centimètre, 1 : mètre, ... voir schéma]
			$unit = (int) $unit;
			$this->_unite = $unit;
		}

		public function setPrix($prix){
			if(is_string($prix) AND StringToolBox::size($prix, 0, 10)){
			    $final = str_replace(',', '.', $prix);
				$this->_prix = $final;
			}
		}

		public function setPromotion($prom){
			$prom = (int) $prom;
			$this->_promotion = $prom;
		}

		public function setFin_promotion($end){
			// CREER UN OBJET QUI VALIDE LES TIMESTAMP
			$this->_fin_promotion = $end;
		}
	}