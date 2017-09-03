<?php

	class FormatManager{

		// ATTRIBUTS

		private $_db;

		// METHODES

		public function __construct($db){
			$this->setDb($db);
		}

		public function setDb(PDO $db){
			$this->_db = $db;
		}

		// CRUD

		public function add(Format $f){
			$q = $this->_db->prepare('INSERT INTO FORMAT(produits_id, format, unite, prix, promotion, fin_promotion) VALUES(:pid, :fo, :un, :pr, :pro, :fpro)');
			$q->bindValue(':pid', $f->produits_id(), PDO::PARAM_INT);
			$q->bindValue(':fo', $f->format());
			$q->bindValue(':un', $f->unite(), PDO::PARAM_INT);
			$q->bindValue(':pr', $f->prix(), PDO::PARAM_STR); // ATTENTION FLOAT RISQUE DE BUGS
			$q->bindValue(':pro', $f->promotion(), PDO::PARAM_INT);
			$q->bindValue(':fpro', $f->fin_promotion()); // ATTENTION DATE ... VOIR CONVERSION TIMESTAMP
			$q->execute();
			$f->hydrate(['id' => $this->_db->lastInsertId()]);
		}

		public function update(Format $f){
			$q = $this->_db->prepare('UPDATE FORMAT SET produits_id = :pid, format = :fo, unite = :un, prix = :pr, promotion = :pro, fin_promotion = :fpro WHERE id = :id');
//			$q = $this->_db->prepare('INSERT INTO FORMAT(produits_id, format, unite, prix, promotion, fin_promotion) VALUES(:pid, :fo, :un, :pr, :pro, :fpro)');
			$q->bindValue(':pid', $f->produits_id(), PDO::PARAM_INT);
			$q->bindValue(':fo', $f->format());
			$q->bindValue(':un', $f->unite(), PDO::PARAM_INT);
			$q->bindValue(':pr', $f->prix()); // ATTENTION FLOAT RISQUE DE BUGS
			$q->bindValue(':pro', $f->promotion(), PDO::PARAM_INT);
			$q->bindValue(':fpro', $f->fin_promotion()); // ATTENTION DATE ... VOIR CONVERSION TIMESTAMP
			$q->bindValue(':id', $f->id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function get($info){
			$info = (int) $info;
			$q = $this->_db->query('SELECT * FROM FORMAT WHERE id = '.$info);
			$donnees = $q->fetch();
			return new Format($donnees);
		}

		public function delete(Format $f){
			$this->_db->exec('DELETE FROM FORMAT WHERE id = '.$f->id());
		}

		public function exists(Format $f){
			return (bool) $this->_db->query('SELECT COUNT(*) FROM FORMAT WHERE id = '.$f->id());
		}

		public function getList(){
			$forms = [];
			$q = $this->_db->query('SELECT * FROM FORMAT ORDER BY id DESC');
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$forms[] = new Format($donnees);
			}
			return $forms;
		}

		public function getProductFormat($id){
			$id = (int) $id;

			$formats = [];

			$q = $this->_db->prepare('SELECT * FROM FORMAT WHERE produits_id = :id ORDER BY prix');
			$q->bindValue(':id', $id, PDO::PARAM_INT);
			$q->execute();
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$formats[] = new Format($donnees);
			}
			return $formats;
		}
	}