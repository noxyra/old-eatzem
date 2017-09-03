<?php 

	class EntrepriseEnseigneManager{

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

		public function add(EntrepriseEnseigne $ee){
			$q = $this->_db->prepare('INSERT INTO ENTREPRISE_ENSEIGNE(entreprise_id, enseigne_id) VALUES(:enid, :eid)');
			$q->bindValue(':enid', $ee->entreprise_id(), PDO::PARAM_INT);
			$q->bindValue(':eid', $ee->enseigne_id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function delete(EntrepriseEnseigne $ee){
			$q = $this->_db->prepare('DELETE FROM ENTREPRISE_ENSEIGNE WHERE entreprise_id = :enid AND enseigne_id = :eid');
			$q->bindValue(':enid', $ee->entreprise_id(), PDO::PARAM_INT);
			$q->bindValue(':eid', $ee->enseigne_id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function exists(EntrepriseEnseigne $ee){
			$q = $this->_db->prepare('SELECT COUNT(*) FROM ENTREPRISE_ENSEIGNE WHERE entreprise_id = ? AND enseigne_id = ?');
			$q->execute([$ee->entreprise_id(), $ee->enseigne_id()]);
			$donnees = $q->fetch();
			return (bool) $donnees[0];
		}
	}