<?php 

	class HorairesManager{

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

		public function add(Horaires $h){
			$q = $this->_db->prepare('INSERT INTO HORAIRES(jour, heureO, heureF) VALUES(:j, :o, :f)');
			$q->bindValue(':j', $h->jour());
			$q->bindValue(':o', $h->heureO());
			$q->bindValue(':f', $h->heureF());
			$q->execute();
			$h->hydrate(['id' => $this->_db->lastInsertId()]);
		}

		public function delete(Horaires $h){
			$this->_db->exec('DELETE FROM HORAIRES WHERE id = '.$h->id());
		}

		public function update(Horaires $h){
			$q = $this->_db->prepare('UPDATE HORAIRES SET jour = :j, heureO = :o, heureF = :f WHERE id = :id');
			$q->bindValue(':j', $h->jour());
			$q->bindValue(':o', $h->heureO());
			$q->bindValue(':f', $h->heureF());
			$q->bindValue(':id', $h->id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function exists($info){
			$info = (int) $info;
			return (bool) $this->_db->query('SELECT COUNT(*) FROM HORAIRES WHERE id = '.$info)->fetchColumn();
		}

		public function get($info){
			$info = (int) $info;
			$q = $this->_db->query('SELECT * FROM HORAIRES WHERE id = '.$info);
				$donnees = $q->fetch(PDO::FETCH_ASSOC);
				return new Horaires($donnees);
		}

		public function getList(){
			$hors = [];
			$q = $this->_db->query('SELECT * FROM HORAIRES ORDER BY id'); // NORMALEMENT C'EST DANS L'ORDRE
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$hors[] = new Horaires($donnees);
			}
			return $hors;
		}

		public function count(){
			return $this->_db->query('SELECT COUNT(*) FROM HORAIRES')->fetchColumn();
		}

		public function isMine(Entreprise $e, $idhor){
			$EntHorMan = new EntrepriseHorairesManager($this->_db);
			$checker = new EntrepriseHoraires([
				'entreprise_id' => $e->id(),
				'horaires_id' => $idhor
			]);
			if($EntHorMan->exists($checker)){
				return true;
			}
			else{
				return false;
			}
		}
	}