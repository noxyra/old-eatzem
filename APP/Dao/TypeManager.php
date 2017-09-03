<?php
	class TypeManager{

		// ATTRIBUTS

		private $_db;

		// METHODE

		public function __construct($db){
			$this->setDb($db);
		}

		public function setDb(PDO $db){
			$this->_db = $db;
		}

		public function add(Type $t){
			$q = $this->_db->prepare('INSERT INTO TYPE(type) VALUES(:t)');
			$q->bindValue(':t', $t->type());
			$q->execute();
			$t->hydrate(['id' =>$this->_db->lastInsertId()]);
		}

		public function delete(Type $t){
			$this->_db->exec('DELETE FROM TYPE WHERE id = '.$t->id());
		}

		public function update(Type $t){
			$q = $this->_db->prepare('UPDATE TYPE SET type = :t WHERE id = :id');
			$q->bindValue(':t', $t->type());
			$q->bindValue(':id', $t->id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function exists($info){
			$info = (int) $info;
			return (bool) $this->_db->query('SELECT COUNT(*) FROM TYPE WHERE id = '. $info);
		}

		public function get($info){
			$info = (int) $info;
			$q = $this->_db->query('SELECT * FROM TYPE WHERE id = '.$info);
			$donnees = $q->fetch(PDO::FETCH_ASSOC);
			return new Type($donnees);
		}

		public function getList(){
			$typs = [];
			$q = $this->_db->query('SELECT * FROM TYPE ORDER BY id DESC');
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$typs[] = new Type($donnees);
			}
			return $typs;
		}

		public function count(){
			return $this->_db->query('SELECT COUNT(*) FROM TYPE')->fetchColumn();
		}
	}