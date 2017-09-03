<?php
	class MenuManager{

		// ATTRIBUTS

		private $_db;

		// METHODES

		public function __construct($db){
			$this->setDb($db);
		}

		public function setDb(PDO $db){
			$this->_db = $db;
		}

		public function add(Menu $m){
			$q = $this->_db->prepare('INSERT INTO MENU(nom, description, conditions, prix) VALUES(:nm, :des, :cond, :pr)');
			$q->bindValue(':nm', $m->nom());
			$q->bindValue(':des', $m->description());
			$q->bindValue(':cond', $m->conditions());
			$q->bindValue(':pr', $m->prix()); // ATTENTION FLOAT -> RISQUE D'ERREURS
			$q->execute();
			$m->hydrate(['id' => $this->_db->lastInsertId()]);
		}

		public function delete(Menu $m){
			$this->_db->exec('DELETE FROM MENU WHERE id = '.$m->id());
		}

		public function update(Menu $m){
			$q = $this->_db->prepare('UPDATE MENU SET nom = :nm, description = :des, conditions = :cond, prix = :pr WHERE id = :id');
			$q->bindValue(':nm', $m->nom());
			$q->bindValue(':des', $m->description());
			$q->bindValue(':cond', $m->conditions());
			$q->bindValue(':pr', $m->prix()); // ATTENTION FLOAT -> RISQUE D'ERREURS
			$q->bindValue(':id', $m->id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function exists($info){
			$info = (int) $info;
			return (bool) $this->_db->query('SELECT COUNT(*) FROM MENU WHERE id = '.$info)->fetchColumn();
		}

		public function get($info){
			$info = (int) $info;
			$q = $this->_db->prepare('SELECT * FROM MENU WHERE id = :id');
			$q->bindValue(':id', $info, PDO::PARAM_INT);
			$q->execute();
			$donnees = $q->fetch(PDO::FETCH_ASSOC);
//			var_dump($donnees);
			return new Menu($donnees);
		}

		public function getList(){
			$menus = [];
			$q = $this->_db->query('SELECT * FROM MENU ORDER BY id DESC');
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$menus[] = new Menu($donnees);
			}
			return $menus;
		}

		public function count(){
			return $this->_db->query('SELECT COUNT(*) FROM MENU')->fetchColumn();
		}

		public function isMine(Entreprise $e, $idmen){
			$EntMenMan = new EntrepriseMenuManager($this->_db);
			$checker = new EntrepriseMenu([
				'entreprise_id' => $e->id(),
				'menu_id' => $idmen
			]);
			if($EntMenMan->exists($checker)){
				return true;
			}
			else{
				return false;
			}
		}

		// ASSOC

		public function setFormat(Menu $m, $form_id){
			$assocMan = new MenuFormatManager($this->_db);
			$assoc = new MenuFormat([
				'menu_id' => $m->id(),
				'format_id' => $form_id
			]);

			if(!$assocMan->exists($assoc)){
				$assocMan->add($assoc);
			}
		}

		public function deleteFormat(Menu $m, $form_id){
			$assocMan = new MenuFormatManager($this->_db);
			$assoc = new MenuFormat([
				'menu_id' => $m->id(),
				'format_id' => $form_id
			]);

			if($assocMan->exists($assoc)){
				$assocMan->delete($assoc);
			}
		}

		public function getFormatsList(Menu $m){
			$fl = [];
			$q = $this->_db->prepare('SELECT * FROM MENU_FORMAT WHERE menu_id = :mid');
			$q->bindValue(':mid', $m->id(), PDO::PARAM_INT);
			$q->execute();
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$fl[] = new MenuFormat($donnees);
			}
			return $fl;
		}
	}