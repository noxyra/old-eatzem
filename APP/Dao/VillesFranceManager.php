<?php
	class VillesFranceManager
	{

		// ATTRIBUTS

		private $_db;

		// METHODES

		public function __construct($db)
		{
			$this->setDb($db);
		}

		public function setDb(PDO $db){
			$this->_db = $db;
		}

		public function hydrate(PDO $db)
		{
			$this->_db = $db;
		}

		// GETTERS

		public function getList()
		{
			$vils = [];
			$q = $this->_db->query('SELECT * FROM VILLES_FR');
			while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
				$vils[] = new VillesFrance($donnees);
			}
			return $vils;
		}

		public function get($info)
		{
			if (is_int($info)) {
				$q = $this->_db->query('SELECT * FROM VILLES_FR WHERE id = ' . $info);
				$donnees = $q->fetch(PDO::FETCH_ASSOC);
				return new VillesFrance($donnees);
			} else {
				$q = $this->_db->prepare('SELECT * FROM VILLES_FR WHERE ville_nom = :vn');
				$q->execute([':vn' => $info]);
				return new VillesFrance($q->fetch(PDO::FETCH_ASSOC));
			}
		}

		public function exists($info)
		{
			if (is_int($info)) {
				return (bool)$this->_db->query('SELECT COUNT(*) FROM VILLES_FR WHERE id = ' . $info)->fetchColumn();
			} else {
				$q = $this->_db->prepare('SELECT * FROM VILLES_FR WHERE email = :mail');
				$q->execute([':mail' => $info]);
				if (count($q->fetch(PDO::FETCH_ASSOC)) > 1) { // ERREUR ? METTRE 0 ? A VERIFIER
					return true;
				} else {
					return false;
				}
			}
		}

		public function search($info)
		{
			$return = [];
			if (StringToolBox::size($info, 3, 45)) {
				$key = /*'%' . */
					$info . '%'; // RECHERCHE AU DEBUT DU NOM SEULEMENT
				$q = $this->_db->query('SELECT * FROM VILLES_FR WHERE ville_nom LIKE ' . $key . ' ORDER BY ville_nom');
				while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
					$return[] = [
						'id' => $donnees['ville_id'],
						'nom' => $donnees['ville_nom'],
						'cp' => $donnees['ville_code_postal'],
						'lat' => $donnees['ville_longitude_deg'],
						'long' => $donnees['ville_latitude_deg']
					];
				}
				$json_return = json_encode($return);
			}
			return $json_return;
		}

		public function getListCp($cp){
			$return = [];

			$q = $this->_db->prepare('SELECT * FROM VILLES_FR WHERE cp = :cp');
			$q->bindValue(':cp', $cp);
			$q->execute();
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$return[] = $donnees['nom'];
			}
			return $return;
		}
	}