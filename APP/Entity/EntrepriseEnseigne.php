<?php 
	class EntrepriseEnseigne{

		// ATTRIBUTS

		private $_entreprise_id;
		private $_enseigne_id;

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

		public function entreprise_id(){ return $this->_entreprise_id; }
		public function enseigne_id(){ return $this->_enseigne_id; }

			// SETTERS

		public function setEntreprise_id($id){
			$id = (int) $id;
			$this->_entreprise_id = $id;
		}

		public function setEnseigne_id($id){
			$id = (int) $id;
			$this->_enseigne_id = $id;
		}
	}