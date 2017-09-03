<?php
	class Consommateur{

		// ATTRIBUTS

		private $_id;
		private $_ip;
		private $_pseudo;

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
		public function ip(){ return $this->_ip; }
		public function pseudo(){ return $this->_pseudo; }

			// SETTERS

		public function setId($id){
			$id = (int) $id;
			$this->_id = $id;
		}

		public function setIp($ip){
			if(is_string($ip)){
				if(StringToolBox::size($ip, 0, 15)){
					$this->_ip = password_hash($ip, PASSWORD_BCRYPT);
				}
				elseif(StringToolBox::size($ip, 16, 100)){
					$this->_ip = $ip;
				}
			}
		}

		public function setPseudo($pseudo){
			if(is_string($pseudo) AND StringToolBox::size($pseudo, 3, 45)){
				$this->_pseudo = $pseudo;
			}
		}
	}