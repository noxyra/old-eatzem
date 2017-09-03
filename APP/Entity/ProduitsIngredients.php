<?php
	class ProduitsIngredients{

		// ATTRIBUTS

		private $_produits_id;
		private $_ingredients_id;

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
		public function ingredients_id(){ return $this->_ingredients_id; }

			// SETTERS

		public function setProduits_id($id){
			$id = (int) $id;
			$this->_produits_id = $id;
		}

		public function setIngredients_id($id){
			$id = (int) $id;
			$this->_ingredients_id = $id;
		}
	}