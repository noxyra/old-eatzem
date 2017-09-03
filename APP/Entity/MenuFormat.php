<?php
	class MenuFormat{

		// ATTRIBUTS

		private $_menu_id;
		private $_format_id;

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

		public function menu_id(){ return $this->_menu_id; }
		public function format_id(){ return $this->_format_id; }

			// SETTERS

		public function setMenu_id($id){
			$id = (int) $id;
			$this->_menu_id = $id;
		}

		public function setFormat_id($id){
			$id = (int) $id;
			$this->_format_id = $id;
		}

	}