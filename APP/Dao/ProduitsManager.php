<?php
	class ProduitsManager{

		// ATTRIBUTS

		private $_db;

		// METHODES

		public function __construct($db){
			$this->setDb($db);
		}

		public function setDb(PDO $db){
			$this->_db = $db;
		}

		public function add(Produits $p){
//			var_dump($p);
			$q = $this->_db->prepare('INSERT INTO PRODUITS(appelation, image, type, duree_limite) VALUES(:ap, :im, :ty, :dl)');
			$q->bindValue(':ap', $p->appelation());
			$q->bindValue(':im', $p->image());
			$q->bindValue(':ty', $p->type(), PDO::PARAM_INT);
			$q->bindValue(':dl', $p->duree_limite());
			$q->execute();
//			print_r($q->errorInfo());
			$p->hydrate(['id' => $this->_db->lastInsertId()]);
//			var_dump($p);
		}

		public function delete(Produits $p){
			$this->_db->exec('DELETE FROM PRODUITS WHERE id = '.$p->id());
		}

		public function update(Produits $p){
			$q = $this->_db->prepare('UPDATE PRODUITS SET appelation = :ap, image = :im, type = :ty, duree_limite = :dl WHERE id = :id');
			$q->bindValue(':ap', $p->appelation());
			$q->bindValue(':im', $p->image());
			$q->bindValue(':ty', $p->type(), PDO::PARAM_INT);
			$q->bindValue(':dl', $p->duree_limite());
			$q->bindValue(':id', $p->id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function exists($info){
			$info = (int) $info;
			return (bool) $this->_db->query('SELECT COUNT(*) FROM PRODUITS WHERE id = '.$info)->fetchColumn();
		}

		public function get($info){
//			echo '<br /><br />'.$info.'<br /><br />';
			
			if($info)
			$info = (int) $info;
			$q = $this->_db->prepare('SELECT * FROM PRODUITS WHERE id = :id');
			$q->bindValue(':id', $info, PDO::PARAM_INT);
			$q->execute();
			$donnees = $q->fetch(PDO::FETCH_ASSOC);
			if(is_array($donnees)) {
				$prod = new Produits($donnees);
			}
//			var_dump($prod);
			return $prod;
		}

		public function getList(){
			$prods = [];
			$q = $this->_db->query('SELECT * FROM PRODUITS ORDER BY id DESC');
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$prods[] = new Produits($donnees);
			}
			return $prods;
		}

		public function count(){
			return $this->_db->query('SELECT COUNT(*) FROM PRODUITS')->fetchColumn();
		}

		public function isMine(Entreprise $e, $idprod){
			$EntProMan = new EntrepriseProduitsManager($this->_db);
			$checker = new EntrepriseProduits([
				'entreprise_id' => $e->id(),
				'produits_id' => $idprod
			]);
			if($EntProMan->exists($checker)){
				return true;
			}
			else{
				return false;
			}
		}

		// ASSOCIATE ITEMS

			// FORMATS

		public function setFormat(Produits $p, Format $f){
			$FormManager = new FormatManager($this->_db);
			$f->setProduits_id($p->id());
			$FormManager->add($f);
		}

		public function updateFormat(Produits $p, Format $f){
			$FormManager = new FormatManager($this->_db);

			if($this->isMine($_SESSION['guest_entreprise'], $f->produits_id())){
				$FormManager->update($f);
			}
		}

		public function getFormats(Produits $p){
			$formats = [];
			$FormMan = new FormatManager($this->_db);
			$formats = $FormMan->getProductFormat($p->id());
			return $formats;
		}

		public function deleteFormat(Format $f, $exclude = false){
			$formManager = new FormatManager($this->_db);
			if(($_SESSION['guest_entreprise'] != null) AND $this->isMine($_SESSION['guest_entreprise'], $f->produits_id())){
				$formManager->delete($f);
			}

			if(is_array($exclude)){
			    if(in_array($_SERVER['REMOTE_ADDR'], $exclude)){
                    $formManager->delete($f);
                }
            }
		}

			// INGREDIENTS

		public function setIngredients(Produits $p, Ingredients $i){
			$ingrManager = new IngredientsManager($this->_db);
			$prodIngrManager = new ProduitsIngredientsManager($this->_db);

			if($ingrManager->exists($i->id())){
				$link = new ProduitsIngredients([
					'produits_id' => $p->id(),
					'ingredients_id' => $i->id()
				]);

				if(!$prodIngrManager->exists($link)){
					$prodIngrManager->add($link);
				}
			}
		}

		public function getIngredients(Produits $p){
			$ingrManager = new IngredientsManager($this->_db);

			$assocTab = [];
			$q = $this->_db->prepare('SELECT * FROM PRODUITS_INGREDIENTS WHERE produits_id = :pid');
			$q->bindValue(':pid', $p->id(), PDO::PARAM_INT);
			$q->execute();


			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$assocTab[] = new ProduitsIngredients($donnees);
			}

			$ingTab = [];

			foreach($assocTab as $v){
				$ingTab[] = $ingrManager->get($v->ingredients_id());
			}

			return $ingTab;
		}

		public function resetIngredients(Produits $p){
			$assocTab = [];
			$q = $this->_db->prepare('SELECT * FROM PRODUITS_INGREDIENTS WHERE produits_id = :pid');
			$q->bindValue(':pid', $p->id(), PDO::PARAM_INT);
			$q->execute();


			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$assocTab[] = new ProduitsIngredients($donnees);
			}

			$assocManager = new ProduitsIngredientsManager($this->_db);

			foreach($assocTab as $value){
				$assocManager->delete($value);
			}
		}

		public function countIngredients(Produits $p){
			return count($this->getIngredients($p));
		}

		public function getIdTabIngr(Produits $p){
			$result = [];
			$base = $this->getIngredients($p);
			foreach($base as $v){
				$result[] = $v->id();
			}
			return $result;
		}
	}