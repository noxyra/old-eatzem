<?php
	class ConsommateurManager{

		// ATTRIBUTS

		private $_db;

		// METHODES

			// CONSTRUCTION

		public function __construct($db){
			$this->setDb($db);
		}

		public function setDb(PDO $db){
			$this->_db = $db;
		}

			// CRUD

		public function add(Consommateur $c){
			$q = $this->_db->prepare('INSERT INTO CONSOMMATEUR(ip, pseudo) VALUES(:ip, :ps)');
			$q->bindValue(':ip', $c->ip());
			$q->bindValue(':ps', $c->pseudo());
			$q->execute();
			$c->hydrate(['id' => $this->_db->lastInsertId()]);
		}

		public function delete(Consommateur $c){
			$this->_db->exec('DELETE FROM CONSOMMATEUR WHERE id =' .$adm->id());
		}

		public function update(Consommateur $c){
			$q = $this->_db->prepare('UPDATE CONSOMMATEUR SET ip = :ip, pseudo = :ps WHERE id = :id');
			$q->bindValue(':ip', $c->ip());
			$q->bindValue(':ps', $c->pseudo());
			$q->bindValue(':id', $c->id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function exists($info){
			// TESTE SI L'IP OU L'ID EXISTENT
			$id = (bool) $this->_db->query('SELECT COUNT(*) FROM CONSOMMATEUR WHERE id =' .$info);
			$ip = (bool) $this->_db->query('SELECT COUNT(*) FROM CONSOMMATEUR WHERE ip =' .$info);
			if(($ip == true) OR ($id == true)){
				return true;
			}
			else{
				return false;
			}
		}

		public function get($info){
			// RECHERCHE SI LE CONSOMMATEUR EXISTE [MODIFIER LA FONCTION A 9.999.999 UTILISATEUR ... :)]
			if(StringToolBox::size($info, 0, 7)){
				$info = (int) $info;
				$q = $this->_db->query('SELECT * FROM CONSOMMATEUR WHERE id = ' .$info);
				$donnees = $q->fetch(PDO::FETCH_ASSOC);
				return new Consommateur($donnees);
			}
			else{
				$q = $this->_db->prepare('SELECT * FROM CONSOMMATEUR WHERE ip = :ip');
				$q->execute([':ip' => $info]);
				return new Consommateur($q->fetch(PDO::FETCH_ASSOC));
			}
		}

		public function getList(){
			$usrs = [];
			$q = $this->_db->query('SELECT * FROM CONSOMMATEUR ORDER BY id DESC');
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$usrs[] = new Consommateur($donnees);
			}
			return $usrs;
		}

		public function count(){
			return $this->_db->query('SELECT COUNT(*) FROM CONSOMMATEUR')->fetchColumn();
		}

			// ASSOCIATE ITEMS

		public function getCritiques(Consommateur $c){
			$crit = [];
			$q = $this->_db->prepare('SELECT * FROM CONSOMMATEUR_CRITIQUE_ENSEIGNE WHERE consommateur_id = :id');
			$q->bindValue(':id', $c->id(), PDO::PARAM_INT);
			$q->execute();
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$crit[] = new ConsommateurCritiqueEnseigne($donnees);
			}
			return $crit;
		}

		public function getCritiquedEnseignes(Consommateur $c){
			$e_man = new EnseigneManager($this->_db);
			$ens = [];
			$links = $this->getCritiques($c);
			foreach($links as $val){
				$ens[] = $e_man->get($val->enseigne_id());
			}
			return $ens;
		}

		public function setCritiqueEnseigne(Consommateur $c, ConsommateurCritiqueEnseigne $cce, Enseigne $e){
			$cce_man = new ConsommateurCritiqueEnseigneManager($this->_db);

			if($cce_man->exists($cce)){
				$testCrit = $cce_man->getDateLastPost($c->id(), $e->id());
				// SI LE COMMENTAIRE LE PLUS VIEUX EST AGE DE PLUS DE 3 MOIS ON ECRIT LE COMMENTAIRE
				if($testCrit > (86400 * 90)){
					$cce_man->add($cce);
				}
				else{
					return false;
				}
			}
			else{
				$cce_man->add($cce);
			}
		}
	}