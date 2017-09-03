<?php 

	class EnseigneTypeManager{

		// ATTRIBUTS

		private $_db;

		// METHODES

		public function __construct($db){
			$this->setDb($db);
		}

		public function setDb(PDO $db){
			$this->_db = $db;
		}

			// CRDE

		public function add(EnseigneType $et){
			$q = $this->_db->prepare('INSERT INTO ENSEIGNE_TYPE(enseigne_id, type_id) VALUES(:eid, :tid)');
			$q->bindValue(':eid', $et->enseigne_id(), PDO::PARAM_INT);
			$q->bindValue(':tid', $et->type_id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function delete(EnseigneType $et){
			$q = $this->_db->prepare('DELETE FROM ENSEIGNE_TYPE WHERE enseigne_id = :eid AND type_id = :tid');
			$q->bindValue(':eid', $et->enseigne_id(), PDO::PARAM_INT);
			$q->bindValue(':tid', $et->type_id(), PDO::PARAM_INT);
			$q->execute();	
		}

		public function exists(EnseigneType $et){
			$q = $this->_db->prepare('SELECT COUNT(*) FROM ENSEIGNE_TYPE WHERE enseigne_id = ? AND type_id = ?');
			$q->execute([$et->enseigne_id(), $et->type_id()]);
			$donnees = $q->fetch();
			return (bool) $donnees[0];
		}
	}