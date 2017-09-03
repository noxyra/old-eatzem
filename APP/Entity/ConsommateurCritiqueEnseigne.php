<?php
	class ConsommateurCritiqueEnseigne{

		// ATTRIBUTS

		private $_consommateur_id;
		private $_enseigne_id;
		private $_note;
		private $_commentaire;
		private $_dateajout;

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

		public function consommateur_id(){ return $this->_consommateur_id; }
		public function enseigne_id(){ return $this->_enseigne_id; }
		public function note(){ return $this->_note; }
		public function commentaire(){ return $this->_commentaire; }
		public function dateajout(){ return $this->_dateajout; }

			// SETTERS

		public function setConsommateur_id($id){
			$id = (int) $id;
			$this->_consommateur_id = $id;
		}

		public function setEnseigne_id($id){
			$id = (int) $id;
			$this->_enseigne_id = $id;
		}

		public function setNote($note){
			$note = (int) $note;
		}

		public function setCommentaire($com){
			if(is_string($com) AND StringToolBox::size($com, 1, 2500)){
				$this->_commentaire = $com;
			}
		}

		public function setDateajout($dat){
			// CREER OBJET E VALIDATION / CONVERSION DES DATES TIMESTAMP
			$this->_dateajout = $dat;
		}
	}