<?php
	class EnseigneHorairesManager{

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

		public function add(EnseigneHoraires $eh){
			$q = $this->_db->prepare('INSERT INTO ENSEIGNE_HORAIRES(enseigne_id, horaires_id) VALUES(:eid, :hid)');
			$q->bindValue(':eid', $eh->enseigne_id(), PDO::PARAM_INT);
			$q->bindValue(':hid', $eh->horaires_id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function delete(EnseigneHoraires $eh){
			$q = $this->_db->prepare('DELETE FROM ENSEIGNE_HORAIRES WHERE enseigne_id = :eid AND horaires_id = :hid');
			$q->bindValue(':eid', $eh->enseigne_id(), PDO::PARAM_INT);
			$q->bindValue(':hid', $eh->horaires_id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function exists(EnseigneHoraires $eh){
			$q = $this->_db->prepare('SELECT COUNT(*) FROM ENSEIGNE_HORAIRES WHERE enseigne_id = ? AND horaires_id = ?');
			$q->execute([$eh->enseigne_id(), $eh->horaires_id()]);
			$donnees = $q->fetch();
			return (bool) $donnees[0];
		}
	}