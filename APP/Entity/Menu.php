<?php
	class Menu{

		// ATTRIBUTS

		private $_id;
		private $_nom;
		private $_description;
		private $_conditions;
		private $_prix;

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
		public function description(){ return $this->_description; }
		public function conditions(){ return $this->_conditions; }
		public function prix(){ return $this->_prix; }

			// SETTERS
		

		public function setId($id){
			$id = (int) $id;
			$this->_id = $id;
		}

		public function setNom($nom){
			if(is_string($nom) AND StringToolBox::size($nom, 3, 45)){
				$this->_nom = $nom;
			}
		}

		public function setDescription($desc){
			if(is_string($desc) AND StringToolBox::size($desc, 0, 2500)){
				$this->_description = $desc;
			}
		}

		public function setConditions($cond){
			if(is_string($cond) AND StringToolBox::size($cond, 0, 200)){
				$this->_conditions = $cond;
			}
		}

		public function setPrix($prix){
			if(is_string($prix) AND StringToolBox::size($prix, 0, 10)){
				$this->_prix = $prix;
			}
		}
	}