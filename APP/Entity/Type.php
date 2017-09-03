<?php
	class Type{

		// ATTRIBUTS

		private $_id;
		private $_type;

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
		public function type(){ return $this->_type; }

			// SETTERS

		public function setId($id){
			$id = (int) $id;
			$this->_id = $id;
		}

		public function setType($typ){
			if(is_string($typ) AND StringToolBox::size($typ, 1, 45)){
				$this->_type = $typ;
			}
		}
	}