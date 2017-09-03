<?php 

	class EnseigneProduitsManager{

		// ATTRIBUTS

		private $_db;

		// METHODES

		public function __construct($db){
			$this->setDb($db);
		}

		public function setDb(PDO $db){
			$this->_db = $db;
		}

		public function add(EnseigneProduits $ep){
			$q = $this->_db->prepare('INSERT INTO ENSEIGNE_PRODUITS(enseigne_id, produits_id) VALUES(:eid, :pid)');
			$q->bindValue(':eid', $ep->enseigne_id(), PDO::PARAM_INT);
			$q->bindValue(':pid', $ep->produits_id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function delete(EnseigneProduits $ep){
			$q = $this->_db->prepare('DELETE FROM ENSEIGNE_PRODUITS WHERE enseigne_id = :eid AND produits_id = :pid');
			$q->bindValue(':eid', $ep->enseigne_id(), PDO::PARAM_INT);
			$q->bindValue(':pid', $ep->produits_id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function exists(EnseigneProduits $ep){
			$q = $this->_db->prepare('SELECT COUNT(*) FROM ENSEIGNE_PRODUITS WHERE enseigne_id = ? AND produits_id = ?');
			$q->execute([$ep->enseigne_id(), $ep->produits_id()]);
			$donnees = $q->fetch();
			return (bool) $donnees[0];
		}
	}