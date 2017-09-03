<?php
	class Horaires{

		// ATTRIBUTS

		private $_id;
		private $_jour;
		private $_heureO;
		private $_heureF;

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
		public function jour(){ return $this->_jour; }
		public function heureO(){ return $this->_heureO; }
		public function heureF(){ return $this->_heureF; }

			// SETTERS

		public function setId($id){
			$id = (int) $id;
			$this->_id = $id;
		}

		public function setJour($jour){
			if(DayToolBox::DayValidLong($jour)){
				$this->_jour = DayToolBox::DayTransform($jour);
			}
			elseif(DayToolBox::DayValidShort($jour)){
				$this->_jour = $jour;
			}
		}

		public function setHeureO($h){
			// CREER UN SYSTEME DE VALIDATION
			$this->_heureO = $h;
		}

		public function setHeureF($h){
			// CREER UN SYSTEME DE VALIDATION
			$this->_heureF = $h;
		}
	}