<?php
	class EnseigneProduits{

		// ATTRIBUTS

		private $_enseigne_id;
		private $_produits_id;

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

		public function enseigne_id(){ return $this->_enseigne_id; }
		public function produits_id(){ return $this->_produits_id; }

			// SETTERS

		public function setEnseigne_id($id){
			$id = (int) $id;
			$this->_enseigne_id = $id;
		}

		public function setProduits_id($id){
			$id = (int) $id;
			$this->_produits_id = $id;
		}
	}