<?php 

	class EntrepriseManager{

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

		public function add(Entreprise $e){
			$q = $this->_db->prepare('INSERT INTO ENTREPRISE(nom, email, password, adresse, complement_adresse, cp, ville, telephone, etat_compte, abonnement, etat_abonnement, fin_abonnement, date_inscription, token, optin, beta, coins) VALUES(:nm, :em, :pw, :ad, :ca, :cp, :vl, :tl, :ec, :ab, :et, :fa, :di, :tk, :op, :bt, :co)');
			$q->bindValue(':nm', $e->nom());
			$q->bindValue(':em', $e->email());
			$q->bindValue(':pw', $e->password());
			$q->bindValue(':ad', $e->adresse());
			$q->bindValue(':ca', $e->complement_adresse());
			$q->bindValue(':cp', $e->cp());
			$q->bindValue(':vl', $e->ville());
			$q->bindValue(':tl', $e->telephone());
//			$q->bindValue(':si', $e->siret());
			$q->bindValue(':ec', $e->etat_compte(), PDO::PARAM_INT);
			$q->bindValue(':ab', $e->abonnement(), PDO::PARAM_INT);
			$q->bindValue(':et', $e->etat_abonnement(), PDO::PARAM_INT);
			$q->bindValue(':fa', $e->fin_abonnement());
			$q->bindValue(':di', $e->date_inscription());
			$q->bindValue(':tk', $e->token());
			$q->bindValue(':op', $e->optin(), PDO::PARAM_INT);
			$q->bindValue(':bt', $e->beta(), PDO::PARAM_INT);
			$q->bindValue(':co', $e->coins(), PDO::PARAM_INT);
			$q->execute();
			$e->hydrate(['id' => $this->_db->lastInsertId()]);
		}

		public function delete(Entreprise $e){
			$this->_db->exec('DELETE FROM ENTREPRISE WHERE id = '.$e->id());
		}

		public function update(Entreprise $e){
			$q = $this->_db->prepare('UPDATE ENTREPRISE SET nom = :nm, email = :em, password = :pw, adresse = :ad, complement_adresse = :ca, cp = :cp, ville = :vl, telephone = :tl, etat_compte = :ec, abonnement = :ab, etat_abonnement = :et, fin_abonnement = :fa, date_inscription = :di, token = :tk, optin = :op, beta = :bt, coins = :co WHERE id = :id');

			$q->bindValue(':nm', $e->nom());
			$q->bindValue(':em', $e->email());
			$q->bindValue(':pw', $e->password());
			$q->bindValue(':ad', $e->adresse());
			$q->bindValue(':ca', $e->complement_adresse());
			$q->bindValue(':cp', $e->cp());
			$q->bindValue(':vl', $e->ville());
			$q->bindValue(':tl', $e->telephone());
//			$q->bindValue(':si', $e->siret());
			$q->bindValue(':ec', $e->etat_compte(), PDO::PARAM_INT);
			$q->bindValue(':ab', $e->abonnement(), PDO::PARAM_INT);
			$q->bindValue(':et', $e->etat_abonnement(), PDO::PARAM_INT);
			$q->bindValue(':fa', $e->fin_abonnement());
			$q->bindValue(':di', $e->date_inscription());
			$q->bindValue(':tk', $e->token());
            $q->bindValue(':op', $e->optin(), PDO::PARAM_INT);
            $q->bindValue(':bt', $e->beta(), PDO::PARAM_INT);
            $q->bindValue(':co', $e->coins(), PDO::PARAM_INT);
			$q->bindValue(':id', $e->id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function exists($info){
			if(is_int($info)){
				return (bool) $this->_db->query('SELECT COUNT(*) FROM ENTREPRISE WHERE id = '.$info)->fetchColumn();
			}
			else{
				$q = $this->_db->prepare('SELECT * FROM ENTREPRISE WHERE email = :mail');
				$q->execute([':mail' => $info]);
				if(count($q->fetch(PDO::FETCH_ASSOC)) > 1){ // ERREUR ? METTRE 0 ? A VERIFIER
					return true;
				}
				else{
					return false;
				}
			}
		}

		public function get($info){
			if(is_int($info)){
				$q = $this->_db->query('SELECT * FROM ENTREPRISE WHERE id = '.$info);
				$donnees = $q->fetch(PDO::FETCH_ASSOC);
				return new Entreprise($donnees);
			}
			else{
				$q = $this->_db->prepare('SELECT * FROM ENTREPRISE WHERE email = :mail');
				$q->execute([':mail' => $info]);
				return new Entreprise($q->fetch(PDO::FETCH_ASSOC));
			}
		}

		public function getList(){
			$entreprises = [];
			$q = $this->_db->query('SELECT * FROM ENTREPRISE ORDER BY id DESC');
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$entreprises[] = new Entreprise($donnees);
			}
			return $entreprises;
		}

		public function count(){
			return $this->_db->query('SELECT COUNT(*) FROM ENTREPRISE')->fetchColumn();
		}

			// ASSOCIATE ITEMS

				// ENSEIGNE

		public function getEnseignes(Entreprise $e){
			$e_man = new EnseigneManager($this->_db);
			$enseignes = [];
			$q = $this->_db->prepare('SELECT * FROM ENTREPRISE_ENSEIGNE WHERE entreprise_id = :id');
			$q->bindValue(':id', $e->id(), PDO::PARAM_INT);
			$q->execute();

			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$link = new EntrepriseEnseigne($donnees);
				$enseignes[] = $e_man->get($link->enseigne_id());
			}

			return $enseignes;
		}

		public function countEnseignes(Entreprise $e){
            return $this->_db->query('SELECT COUNT(*) FROM ENTREPRISE_ENSEIGNE WHERE entreprise_id = '.$e->id())->fetchColumn();
		}

		public function countOnlineEnseigne(Entreprise $e){
			$cnt = 0;
			$tab = $this->getEnseignes($e);
			foreach ($tab as $v){
				if($v->online() == 1){
					$cnt = $cnt + 1;
				}
			}
			return $cnt;
		}

		public function setEnseigne(Entreprise $en, Enseigne $e){
			$e_man = new EnseigneManager($this->_db);
			$ee_man = new EntrepriseEnseigneManager($this->_db);
			
			$e_man->add($e);

			// CREATION DU LIEN

			$link = new EntrepriseEnseigne([
				'entreprise_id' => $en->id(),
				'enseigne_id' => $e->id()
			]);

			$ee_man->add($link);
		}

		public function updateEnseigne(Entreprise $en, Enseigne $e){
			$e_man = new EnseigneManager($this->_db);
			$ee_man = new EntrepriseEnseigneManager($this->_db);

			$checker = new EntrepriseEnseigne([
				'entreprise_id' => $en->id(),
				'enseigne_id' => $e->id()
				]);

			if($ee_man->exists($checker)){
				$e_man->update($e);
			}
		}

		public function deleteEnseigne(Entreprise $en, Enseigne $e){
			$e_man = new EnseigneManager($this->_db);
			$ee_man = new EntrepriseEnseigneManager($this->_db);
			$checker = new EntrepriseEnseigne([
				'entreprise_id' => $en->id(),
				'enseigne_id' => $e->id()
				]);

			if($ee_man->exists($checker)){
				// ON PEUT SUPPRIMER
				$e_man->delete($e);
			}
		}

			// HORAIRES

		public function getHoraires(Entreprise $e){
			$h_man = new HorairesManager($this->_db);

			$horaires = [];

			$q = $this->_db->prepare('SELECT * FROM ENTREPRISE_HORAIRES WHERE entreprise_id = :id');
			$q->bindValue(':id', $e->id(), PDO::PARAM_INT);
			$q->execute();

			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$link = new EntrepriseHoraires($donnees);
				$horaires[] = $h_man->get($link->horaires_id());
			}
			return $horaires;
		}

		public function setHoraires(Entreprise $e, Horaires $h){
			$h_man = new HorairesManager($this->_db);
			$eh_man = new EntrepriseHorairesManager($this->_db);

			$h_man->add($h);

			$link = new EntrepriseHoraires([
				'entreprise_id' => $e->id(),
				'horaires_id' => $h->id()
			]);

			$eh_man->add($link);
		}

		public function updateHoraires(Entreprise $e, Horaires $h){
			$h_man = new HorairesManager($this->_db);
			$eh_man = new EntrepriseHorairesManager($this->_db);

			$checker = new EntrepriseHoraires([
				'entreprise_id' => $e->id(),
				'horaires_id' => $h->id()
			]);

			if($eh_man->exists($checker)){
				$h_man->update($h);
			}
		}

		public function deleteHoraires(Entreprise $e, Horaires $h){
			$h_man = new HorairesManager($this->_db);
			$eh_man = new EntrepriseHorairesManager($this->_db);

			$checker = new EntrepriseHoraires([
				'entreprise_id' => $e->id(),
				'horaires_id' => $h->id()
			]);

			if($eh_man->exists($checker)){
				$h_man->delete($h);
			}
		}

		public function countHoraires(Entreprise $e){
			return $this->_db->query('SELECT COUNT(*) FROM ENTREPRISE_HORAIRES WHERE entreprise_id = '.$e->id())->fetchColumn();
		}

			// MODE PAIEMENT

		public function getModePaiement(Entreprise $e){
			$mp_man = new ModePaiementManager($this->_db);

			$mode = [];

			$q = $this->_db->prepare('SELECT * FROM ENTREPRISE_MODEPAIEMENT WHERE entreprise_id = :id');
			$q->bindValue(':id', $e->id(), PDO::PARAM_INT);
			$q->execute();

			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$link = new EntrepriseModePaiement($donnees);
				$mode[] = $mp_man->get($link->modepaiement_id());
			}
			return $mode;
		}

		public function setModePaiement(Entreprise $e, ModePaiement $m){
			$m_man = new ModePaiementManager($this->_db);
			$em_man = new EntrepriseModePaiementManager($this->_db);

			$m_man->add($m);

			$link = new EntrepriseModePaiement([
				'entreprise_id'=> $e->id(),
				'modepaiement_id' => $m->id()
			]);

			$em_man->add($link);
		}

		public function updateModePaiement(Entreprise $e, ModePaiement $m){
			$m_man = new ModePaiementManager($this->_db);
			$em_man = new EntrepriseModePaiementManager($this->_db);

			$checker = new EntrepriseModePaiement([
				'entreprise_id' => $e->id(),
				'modepaiement_id' => $m->id()
			]);

			if($em_man->exists($checker)){
				$m_man->update($m);
			}
		}

		public function deleteModePaiement(Entreprise $e, ModePaiement $m){
			$m_man = new ModePaiementManager($this->_db);
			$em_man = new EntrepriseModePaiementManager($this->_db);

			$checker = new EntrepriseModePaiement([
				'entreprise_id' => $e->id(),
				'modepaiement_id' => $m->id()
			]);

			if($em_man->exists($checker)){
				$m_man->delete($m);
			}
		}

		public function countModePaiement(Entreprise $e){
			return $this->_db->query('SELECT COUNT(*) FROM ENTREPRISE_MODEPAIEMENT WHERE entreprise_id = '.$e->id())->fetchColumn();
		}

			// PRODUITS

		public function getProduits(Entreprise $e){
			$p_man = new ProduitsManager($this->_db);

			$produits = [];

			$q = $this->_db->prepare('SELECT * FROM ENTREPRISE_PRODUITS WHERE entreprise_id = :id');
			$q->bindValue(':id', $e->id(), PDO::PARAM_INT);
			$q->execute();

			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$link = new EntrepriseProduits($donnees);
				$produits[] = $p_man->get($link->produits_id());
			}
			return $produits;
		}

		public function setProduits(Entreprise $e, Produits $p){
			$p_man = new ProduitsManager($this->_db);
			$ep_man = new EntrepriseProduitsManager($this->_db);
			$p_man->add($p);

			$link = new EntrepriseProduits([
				'entreprise_id' => $e->id(),
				'produits_id' => $p->id()
			]);

			$ep_man->add($link);
		}

		public function updateProduits(Entreprise $e, Produits $p){
			$p_man = new ProduitsManager($this->_db);
			$ep_man = new EntrepriseProduitsManager($this->_db);

			$checker = new EntrepriseProduits([
				'entreprise_id' => $e->id(),
				'produits_id' => $p->id()
			]);

			if($ep_man->exists($checker)){
				$p_man->update($p);
			}
		}

		public function deleteProduits(Entreprise $e, Produits $p){
			$p_man = new ProduitsManager($this->_db);
			$ep_man = new EntrepriseProduitsManager($this->_db);

			$checker = new EntrepriseProduits([
				'entreprise_id' => $e->id(),
				'produits_id' => $p->id()
			]);

			if($ep_man->exists($checker)){
				$p_man->delete($p);
			}
		}

		public function countProduits(Entreprise $e){
			return $this->_db->query('SELECT COUNT(*) FROM ENTREPRISE_PRODUITS WHERE entreprise_id = '.$e->id())->fetchColumn();
		}

			// MENU

		public function getMenus(Entreprise $e){
			$m_man = new MenuManager($this->_db);

			$menus = [];

			$q = $this->_db->prepare('SELECT * FROM ENTREPRISE_MENU WHERE entreprise_id = :id');
			$q->bindValue(':id', $e->id(), PDO::PARAM_INT);
			$q->execute();

			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$link = new EntrepriseMenu($donnees);
				$menus[] = $m_man->get($link->menu_id());
			}
			return $menus;
		}

		public function setMenus(Entreprise $e, Menu $m){
			$m_man = new MenuManager($this->_db);
			$em_man = new EntrepriseMenuManager($this->_db);

			$m_man->add($m);



			$link = new EntrepriseMenu([
				'entreprise_id' => $e->id(),
				'menu_id' => $m->id()
			]);


			$em_man->add($link);
		}

		public function updateMenu(Entreprise $e, Menu $m){
			$m_man = new MenuManager($this->_db);
			$em_man = new EntrepriseMenuManager($this->_db);

			$checker = new EntrepriseMenu([
				'entreprise_id' => $e->id(),
				'menu_id' => $m->id()
			]);

			if($em_man->exists($checker)){
				$m_man->update($m);
			}
		}

		public function deleteMenu(Entreprise $e, Menu $m){
			$m_man = new MenuManager($this->_db);
			$em_man = new EntrepriseMenuManager($this->_db);

			$checker = new EntrepriseMenu([
				'entreprise_id' => $e->id(),
				'menu_id' => $m->id()
			]);

			if($em_man->exists($checker)){
				$m_man->delete($m);
			}
		}

		public function countMenu(Entreprise $e){
			return $this->_db->query('SELECT COUNT(*) FROM ENTREPRISE_MENU WHERE entreprise_id = '.$e->id())->fetchColumn();
		}

			// FORMAT [GET ONLY]

		public function getFormatList(Entreprise $e){
			$ProdMan = new ProduitsManager($this->_db);
			$formats = [];
			$prod_list = $this->getProduits($e);
			foreach($prod_list as $v){
				$form_list = $ProdMan->getFormats($v);
				foreach($form_list as $va){
					$formats[] = $va;
				}
			}
			return $formats;
		}
	}
