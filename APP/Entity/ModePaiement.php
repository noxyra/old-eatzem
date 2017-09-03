<?php
	class ModePaiement{

		// ATTRIBUTS

		private $_id;
		private $_mode;

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

		public function id(){ 	return $this->_id; }
		public function mode(){ return $this->_mode; }

			// SETTERS

		public function setId($id){
			$id = (int) $id;
			$this->_id = $id;
		}

		public function setMode($mod){
			if(is_string($mod) AND StringToolBox::size($mod, 1, 45)){
				$this->_mode = $mod;
			}
		}
	}