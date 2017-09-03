<?php
	class EnseigneHoraires{

		// ATTRIBUTS

		private $_enseigne_id;
		private $_horaires_id;

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
		public function horaires_id(){ return $this->_horaires_id; }

			// SETTERS

		public function setEnseigne_id($id){
			$id = (int) $id;
			$this->_enseigne_id = $id;
		}

		public function setHoraires_id($id){
			$id = (int) $id;
			$this->_horaires_id = $id;
		}
	}