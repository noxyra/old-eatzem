<?php
	class Produits{

		// ATTRIBUTS

		private $_id;
		private $_appelation;
		private $_image;
		private $_type;
		private $_duree_limite;
		private $_formats;
		private $_ingredients;

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
		public function appelation(){ return $this->_appelation; }
		public function image(){ return $this->_image; }
		public function type(){ return $this->_type; }
		public function duree_limite(){ return $this->_duree_limite; }
		public function formats(){
		    return $this->_formats;
        }
        public function ingredients(){ return $this->_ingredients; }

			// SETTERS

		public function setId($id){
			$id = (int) $id;
			$this->_id = $id;
		}

		public function setAppelation($app){
			if(is_string($app) AND StringToolBox::size($app, 2, 80)){
				$this->_appelation = $app;
			}
		}

		public function setImage($img){
			// CREER OBJET DE VALIDATION [URL / FICHIER]
			$this->_image = $img;
		}

		public function setType($typ){
			// CREER OBJET DE VALIDATION TYPE [ 0 : non défini, 1 : boisson soft, ...]
			$typ = (int) $typ;
			$this->_type = $typ;
		}

		public function setDuree_limite($dl){
			// CREER OBJET DE VALIDATION / CONVERSION DATE TIMESTAMP
			$this->_duree_limite = $dl;
		}

		public function hydrateFormats($db){
		    $prodManager = new ProduitsManager($db);
		    $this->_formats = $prodManager->getFormats($this);
        }

        public function hydrateIngredients($db)
        {
            $ingManager = new ProduitsManager($db);
            $this->_ingredients = $ingManager->getIngredients($this);
        }
	}