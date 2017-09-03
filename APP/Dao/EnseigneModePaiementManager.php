<?php 

	class EnseigneModePaiementManager{

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

		public function add(EnseigneModePaiement $emp){
			$q = $this->_db->prepare('INSERT INTO ENSEIGNE_MODEPAIEMENT(enseigne_id, modepaiement_id) VALUES(:eid, :mpid)');
			$q->bindValue(':eid', $emp->enseigne_id(), PDO::PARAM_INT);
			$q->bindValue(':mpid', $emp->modepaiement_id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function delete(EnseigneModePaiement $emp){
			$q = $this->_db->prepare('DELETE FROM ENSEIGNE_MODEPAIEMENT WHERE enseigne_id = :eid AND modepaiement_id = :mpid');
			$q->bindValue(':eid', $emp->enseigne_id(), PDO::PARAM_INT);
			$q->bindValue(':mpid', $emp->modepaiement_id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function exists(EnseigneModePaiement $emp){
			$q = $this->_db->prepare('SELECT COUNT(*) FROM ENSEIGNE_MODEPAIEMENT WHERE enseigne_id = ? AND modepaiement_id = ?');
			$q->execute([$emp->enseigne_id(), $emp->modepaiement_id()]);
			$donnees = $q->fetch();
			return (bool) $donnees[0];
		}
	}