<?php
	class ModePaiementManager{

		// ATTRIBUTS

		private $_db;

		// METHODES

		public function __construct($db){
			$this->setDb($db);
		}

		public function setDb(PDO $db){
			$this->_db = $db;
		}

		public function add(ModePaiement $mp){
			$q = $this->_db->prepare('INSERT INTO MODEPAIEMENT(mode) VALUES(:mod)');
			$q->bindValue(':mod', $mp->mode());
			$q->execute();
			$mp->hydrate(['id' => $this->_db->lastInsertId()]);
		}

		public function delete(ModePaiement $mp){
			$this->_db->exec('DELETE FROM MODEPAIEMENT WHERE id = '.$mp->id());
		}

		public function update(ModePaiement $mp){
			$q = $this->_db->prepare('UPDATE MODEPAIEMENT SET mode = :mod WHERE id = :id');
			$q->bindValue(':mod', $mp->mode());
			$q->bindValue(':id', $mp->id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function exists($info){
			$info = (int) $info;
			return (bool) $this->_db->quety('SELECT COUNT(*) FROM MODEPAIEMENT WHERE id = '.$info);
		}

		public function get($info){
			$info = (int) $info;
			$q = $this->_db->query('SELECT * FROM MODEPAIEMENT WHERE id = '.$info);
			$donnees = $q->fetch(PDO::FETCH_ASSOC);
			return new ModePaiement($donnees);
		}

		public function getList(){
			$mods = [];
			$q = $this->_db->query('SELECT * FROM MODEPAIEMENT ORDER BY id DESC');
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$mods[] = new ModePaiement($donnees);
			}
			return $mods;
		}

		public function count(){
			return $this->_db->query('SELECT COUNT(*) FROM MODEPAIEMENT')->fetchColumn();
		}

		public function isMine(Entreprise $e, $idmod){
			$EntModMan = new EntrepriseModePaiementManager($this->_db);
			$checker = new EntrepriseModePaiement([
				'entreprise_id' => $e->id(),
				'modepaiement_id' => $idmod
			]);
			if($EntModMan->exists($checker)){
				return true;
			}
			else{
				return false;
			}
		}
	}