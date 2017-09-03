<?php
	class Ingredients{

		// ATTRIBUTS

		private $_id;
		private $_nom;

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

		public function id(){ return $this->_id; }
		public function nom(){ return $this->_nom; }

			// SETTERS

		public function setId($id){
			$id = (int) $id;
			$this->_id = $id;
		}

		public function setNom($nom){
			if(is_string($nom) AND StringToolBox::size($nom, 1, 80)){
				$this->_nom = $nom;
			}
		}
	}