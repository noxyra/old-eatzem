<?php
	class ConsommateurCritiqueEnseigneManager{

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

		public function add(ConsommateurCritiqueEnseigne $cce){
			$q = $this->_db->prepare('INSERT INTO CONSOMMATEUR_CRITIQUE_ENSEIGNE(consommateur_id, enseigne_id, note, commentaire, dateajout) VALUES(:cid, :eid, :not, :com, :daa)');
			$q->bindValue(':cid', $cce->consommateur_id(), PDO::PARAM_INT);
			$q->bindValue(':eid', $cce->enseigne_id(), PDO::PARAM_INT);
			$q->bindValue(':not', $cce->note(), PDO::PARAM_INT);
			$q->bindValue(':com', $cce->commentaire());
			$q->bindValue(':daa', $cce->dateajout());
			$q->execute();
		}

		public function update(ConsommateurCritiqueEnseigne $cce){
			$q = $this->_db->prepare('UPDATE CONSOMMATEUR_CRITIQUE_ENSEIGNE SET note = :not, commentaire = :com, dateajout = :daa WHERE consommateur_id = :cid AND enseigne_id = :eid');
			$q->bindValue(':not', $cce->note(), PDO::PARAM_INT);
			$q->bindValue(':com', $cce->commentaire());
			$q->bindValue(':daa', $cce->dateajout());
			$q->bindValue(':cid', $cce->consommateur_id(), PDO::PARAM_INT);
			$q->bindValue(':eid', $cce->enseigne_id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function delete(ConsommateurCritiqueEnseigne $cee){
			$q = $this->_db->prepare('DELETE FROM CONSOMMATEUR_CRITIQUE_ENSEIGNE WHERE enseigne_id = :eid AND consommateur_id = :cid');
			$q->bindValue(':eid', $cee->enseigne_id(), PDO::PARAM_INT);
			$q->bindValue(':cid', $cee->consommateur_id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function getDateLastPost($cons_is, $ens_id){
			$crits = [];

			$q = $this->_db->prepare('SELECT * FROM CONSOMMATEUR_CRITIQUE_ENSEIGNE WHERE enseigne_id = :eid AND consommateur_id = :cid ORDER BY dateajout DESC');
			$q->bindValue(':eid', $ens_id, PDO::PARAM_INT);
			$q->bindValue(':cid', $cons_is, PDO::PARAM_INT);
			$q->execute();

			$donnees = $q->fetch(PDO::FETCH_ASSOC);

			foreach ($donnees as $v){
				$crits[] = $v;
			}

			$lastPost = end($crits);

			$currentTime = time();

			return ($currentTime - $lastPost->dateajout());
		}

		public function exists(ConsommateurCritiqueEnseigne $cee){
			$q = $this->_db->prepare('SELECT COUNT(*) FROM CONSOMMATEUR_CRITIQUE_ENSEIGNE WHERE enseigne_id = ? AND consommateur_id = ?');
			$q->execute([
				$cee->enseigne_id(),
				$cee->consommateur_id()
			]);

			$donnees = $q->fetch();
			return (bool) $donnees[0];
		}
	}