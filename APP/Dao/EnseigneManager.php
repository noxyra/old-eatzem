<?php 

	class EnseigneManager{

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

		public function add(Enseigne $e)
		{
//			DebugToolBox::DUMP($e);

			$q = $this->_db->prepare('INSERT INTO ENSEIGNE(nom, description, adresse, complement_adresse, cp, ville, telephone_fixe, telephone_portable, livraison, rayon_livraison, sur_place, url, logo, online) VALUES(:nm, :de, :ad, :ca, :cp, :vi, :tf, :tp, :li, :rl, :sp, :ur, :lg, :onl)');
			$q->bindValue(':nm', $e->nom());
			$q->bindValue(':de', $e->description());
			$q->bindValue(':ad', $e->adresse());
			$q->bindValue(':ca', $e->complement_adresse());
			$q->bindValue(':cp', $e->cp());
			$q->bindValue(':vi', $e->ville());
			$q->bindValue(':tf', $e->telephone_fixe());
			$q->bindValue(':tp', $e->telephone_portable());
			$q->bindValue(':li', $e->livraison(), PDO::PARAM_INT);
			$q->bindValue(':rl', $e->rayon_livraison(), PDO::PARAM_INT);
			$q->bindValue(':sp', $e->sur_place(), PDO::PARAM_INT);
			$q->bindValue(':ur', $e->url());
			$q->bindValue(':lg', $e->logo());
//			$q->bindValue(':lh', $e->light());
//			$q->bindValue(':da', $e->dark());
//			$q->bindValue(':e1', $e->elem1());
//			$q->bindValue(':e2', $e->elem2());
//			$q->bindValue(':co', $e->contrast());
			$q->bindValue(':onl', $e->online(), PDO::PARAM_INT);
			$q->execute();
			$e->hydrate(['id' => $this->_db->lastInsertId()]);
		}

		public function delete(Enseigne $e){
			$this->_db->exec('DELETE FROM ENSEIGNE WHERE id = '.$e->id());
		}

		public function update(Enseigne $e){
//			var_dump($e);
			$q = $this->_db->prepare('UPDATE ENSEIGNE SET nom = :nm, description = :de, adresse = :ad, complement_adresse = :ca, cp = :cp, ville = :vi, telephone_fixe = :tf, telephone_portable = :tp, livraison = :li, rayon_livraison = :rl, sur_place = :sp, url = :ur, logo = :lg, online = :onl WHERE id = :id');
			$q->bindValue(':nm', $e->nom());
			$q->bindValue(':de', $e->description());
			$q->bindValue(':ad', $e->adresse());
			$q->bindValue(':ca', $e->complement_adresse());
			$q->bindValue(':cp', $e->cp());
			$q->bindValue(':vi', $e->ville());
			$q->bindValue(':tf', $e->telephone_fixe());
			$q->bindValue(':tp', $e->telephone_portable());
			$q->bindValue(':li', $e->livraison(), PDO::PARAM_INT);
			$q->bindValue(':rl', $e->rayon_livraison(), PDO::PARAM_INT);
			$q->bindValue(':sp', $e->sur_place(), PDO::PARAM_INT);
			$q->bindValue(':ur', $e->url());
			$q->bindValue(':lg', $e->logo());
//			$q->bindValue(':lh', $e->light());
//			$q->bindValue(':da', $e->dark());
//			$q->bindValue(':e1', $e->elem1());
//			$q->bindValue(':e2', $e->elem2());
//			$q->bindValue(':co', $e->contrast());
			$q->bindValue(':onl', $e->online(), PDO::PARAM_INT);
			$q->bindValue(':id', $e->id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function updateLocation(Enseigne $e){
//			var_dump($e);
			$lat = floatval($e->lat());
			$lon = floatval($e->lon());

			$q = $this->_db->prepare('UPDATE ENSEIGNE SET lat = :la, lon = :lo WHERE id = :id');
			$q->bindParam(':la', $lat, PDO::PARAM_STR);
			$q->bindParam(':lo', $lon, PDO::PARAM_STR);
			$q->bindParam(':id', $e->id(), PDO::PARAM_INT);
			$q->execute();
		}

		public function exists($info){
			// VOIR SI ON RAJOUTE UN AUTRE CRITERE DE SELECTION [ EX : NOM ? ]
			$info = (int) $info;
			return (bool) $this->_db->query('SELECT COUNT(*) FROM ENSEIGNE WHERE id = '.$info)->fetchColumn();
		}

		public function urlExists($url){
			$q = $this->_db->prepare('SELECT * FROM ENSEIGNE WHERE url = :url');
			$q->execute([':url' => $url]);
			if(count($q->fetch(PDO::FETCH_ASSOC)) > 1){ // ERREUR ? METTRE 0 ? A VERIFIER
				return true;
			}
			else{
				return false;
			}
		}

		public function getByUrl($url){
			$q = $this->_db->prepare('SELECT * FROM ENSEIGNE WHERE url = :url');
			$q->execute([':url' => $url]);

			return new Enseigne($q->fetch());
		}

		public function get($info){
			// VOIR SI ON RAJOUTE UN AUTRE CRITERE DE SELECTION [ EX : NOM ? ]
			if(is_int($info)){
				$info = (int) $info;
				$q = $this->_db->query('SELECT * FROM ENSEIGNE WHERE id = '.$info);
				$donnees = $q->fetch(PDO::FETCH_ASSOC);
				return new Enseigne($donnees);
			}
		}

		public function getList(){
			$ens = [];
			$q = $this->_db->query('SELECT * FROM ENSEIGNE ORDER BY id DESC');
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$ens[] = new Enseigne($donnees);
			}
			return $ens;
		}

		public function count(){
			return $this->_db->query('SELECT COUNT(*) FROM ENSEIGNE')->fetchColumn();
		}

		public function isMine(Entreprise $e, $idens){
			$EntEnsManager = new EntrepriseEnseigneManager($this->_db);
			$checker = new EntrepriseEnseigne([
				'entreprise_id' => $e->id(),
				'enseigne_id' => $idens
			]);
			if($EntEnsManager->exists($checker)){
				return true;
			}
			else{
				return false;
			}
		}

		public function getEntreprise(Enseigne $e){
			$e_man = new EntrepriseManager($this->_db);
			$q = $this->_db->prepare('SELECT * FROM ENTREPRISE_ENSEIGNE WHERE enseigne_id = :id');
			$q->bindValue(':id', $e->id(), PDO::PARAM_INT);
			$q->execute();
			$donnees = $q->fetch(PDO::FETCH_ASSOC);
			$link = new EntrepriseEnseigne($donnees);
			return $e_man->get($link->entreprise_id());
		}

				// HORAIRES CRUDGL [CREATE / UPDATE / DELETE / GET / LIST]

		public function setHoraires(Enseigne $e, $hor_id){
//			$h_man = new HorairesManager($this->_db);
			$eh_man = new EnseigneHorairesManager($this->_db);
//			$h_man->add($h);

			$link = new EnseigneHoraires(['enseigne_id' => $e->id(), 'horaires_id' => intval($hor_id)]);
			$eh_man->add($link);
			return true;
		}

		public function updateHoraires(Enseigne $e, Horaires $h){
			$h_man = new HorairesManager($this->_db);
			$eh_man = new EnseigneHorairesManager($this->_db);
			$checker = new EnseigneHoraires(['enseigne_id' => $e->id(), 'horaires_id' => $h->id()]);
			if($eh_man->exists($checker)){
				$h_man->update($h);
				return true;
			}
		}

		public function deleteHoraires(Enseigne $e, Horaires $h){
//			$h_man = new HorairesManager($this->_db);
			$eh_man = new EnseigneHorairesManager($this->_db);
			$checker = new EnseigneHoraires(['enseigne_id' => $e->id(), 'horaires_id' => $h->id()]);
			if($eh_man->exists($checker)){
//				$h_man->delete($h);
				$eh_man->delete($checker);
				return true;
			}
		}

		public function getHoraires(Enseigne $e, Horaires $h){
			$h_man = new HorairesManager($this->_db);
			$eh_man = new EnseigneHorairesManager($this->_db);
			$checker = new EnseigneHoraires(['enseigne_id' => $e->id(), 'horaires_id' => $h->id()]);
			if($eh_man->exists($checker)){
				return $h_man->get($checker->horaires_id());
			}
		}

		public function getHorairesList(Enseigne $e){
			$return = [];
			$h_man = new HorairesManager($this->_db);
			$q = $this->_db->query('SELECT * FROM ENSEIGNE_HORAIRES, HORAIRES WHERE ENSEIGNE_HORAIRES.horaires_id = HORAIRES.id AND ENSEIGNE_HORAIRES.enseigne_id = ' .$e->id());
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$return[] = new Horaires($donnees);
			}
			return $return;
		}

		public function getHorairesListByDay(Enseigne $e){
		    $base = $this->getHorairesList($e);
            $final = [];

            foreach($base as $horaire){
                if($horaire->jour() == "LUN"){
                    $final['Lundi'][] = $horaire;
                }
                elseif($horaire->jour() == "MAR"){
                    $final['Mardi'][] = $horaire;
                }
                elseif($horaire->jour() == "MER"){
                    $final['Mercredi'][] = $horaire;
                }
                elseif($horaire->jour() == "JEU"){
                    $final['Jeudi'][] = $horaire;
                }
                elseif($horaire->jour() == "VEN"){
                    $final['Vendredi'][] = $horaire;
                }
                elseif($horaire->jour() == "SAM"){
                    $final['Samedi'][] = $horaire;
                }
                elseif($horaire->jour() == "DIM"){
                    $final['Dimanche'][] = $horaire;
                }
                else{
                    $final['Bug'][] = $horaire;
                }
            }
            return $final;
        }

				// MODEPAIEMENT CRUDG [CREATE / UPDATE / DELETE / GET]

		public function setModePaiement(Enseigne $e, $paie_id){
//			$mp_man = new ModePaiementManager($this->_db);
			$emp_man = new EnseigneModePaiementManager($this->_db);

			$link = new EnseigneModePaiement(['enseigne_id' => $e->id(), 'modepaiement_id' => intval($paie_id)]);
			$emp_man->add($link);
			return true;

		}

		public function deleteModePaiement(Enseigne $e, ModePaiement $mp){
			$mp_man = new ModePaiementManager($this->_db);
			$emp_man = new EnseigneModePaiementManager($this->_db);
			$checker = new EnseigneModePaiement(['enseigne_id' => $e->id(), 'modepaiement_id' => $mp->id()]);
			if($emp_man->exists($checker)){
//				$mp_man->delete($mp);
				$emp_man->delete($checker);
				return true;
			}
		}

		public function getModePaiement(Enseigne $e, ModePaiement $mp){ // PAS SUR QUE CETTE FONCTION SOIT BIEN UTILE
			$mp_man = new ModePaiementManager($this->_db);
			$emp_man = new EnseigneModePaiementManager($this->_db);
			$checker = new EnseigneModePaiement(['enseigne_id' => $e->id(), 'modepaiement_id' => $mp->id()]);
			if($emp_man->exists($checker)){
				return $mp_man->get($checker->horaires_id());
			}
		}

		public function getModePaiementList(Enseigne $e){
			$mplist = [];
			$return = [];
			$mp_man = new ModePaiementManager($this->_db);
			$q = $this->_db->query('SELECT * FROM ENSEIGNE_MODEPAIEMENT WHERE enseigne_id = '.$e->id());
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$mplist[] = new EnseigneModePaiement($donnees);
			}
			foreach($mplist as $value){
				$return[] = $mp_man->get($value->modepaiement_id());
			}
			return $return;
		}
		
		public function setType(Enseigne $e, Type $t){
			$t_man = new TypeManager($this->_db);
			$et_man = new EnseigneTypeManager($this->_db);
			if($t_man->exists($t)){
				$link = new EnseigneType(['enseigne_id' => $e->id(), 'type_id' => $t->id()]);
				$et_man->add($link);
				return true;
			}
		}

		/*public function updateType(Enseigne $e, Type $t){
			$t_man = new TypeManager($this->_db);
			$et_man = new EnseigneTypeManager($this->_db);
			$checker = new EnseigneType(['enseigne_id' => $e->id(), 'type_id' => $t->id()]);
			if($et_man->exists($checker)){
				$t_man->update($t);
				return true;
			}
		}*/

		public function deleteType(Enseigne $e, Type $t){
			$t_man = new TypeManager($this->_db);
			$et_man = new EnseigneTypeManager($this->_db);
			$checker = new EnseigneType(['enseigne_id' => $e->id(), 'type_id' => $t->id()]);
			if($et_man->exists($checker)){
				// ON SUPPRIME UNIQUEMENT LE LIEN
				$et_man->delete($checker);
				return true;
			}
		}

		public function getType(Enseigne $e, Type $t){
			$t_man = new TypeManager($this->_db);
			$et_man = new EnseigneTypeManager($this->_db);
			$checker = new EnseigneType(['enseigne_id' => $e->id(), 'type_id' => $t->id()]);
			if($et_man->exists($checker)){
				return $t_man->get($checker->type_id());
			}
		}

		public function getTypeList(Enseigne $e){
			$tlist = [];
			$return = [];
			$t_man = new TypeManager($this->_db);
			$q = $this->_db->query('SELECT * FROM ENSEIGNE_TYPE WHERE enseigne_id = '.$e->id());
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$tlist[] = new EnseigneType($donnees);
			}
			foreach($tlist as $value){
				$return[] = $t_man->get($value->type_id());
			}
			return $return;
		}

				// MENU

		public function setMenu(Enseigne $e, $men_id){
//			$m_man = new MenuManager($this->_db);
			$em_man = new EnseigneMenuManager($this->_db);

			$link = new EnseigneMenu(['enseigne_id' => $e->id(), 'menu_id' => intval($men_id)]);
			$em_man->add($link);
			return true;
		}

		public function deleteMenu(Enseigne $e, Menu $m){
//			$m_man = new MenuManager($this->_db);
			$em_man = new EnseigneMenuManager($this->_db);
			$checker = new EnseigneMenu(['enseigne_id' => $e->id(), 'menu_id' => $m->id()]);
			if($em_man->exists($checker)){
				$em_man->delete($checker);
				return true;
			}


		}

		public function updateMenu(Enseigne $e, Menu $m){
			$m_man = new MenuManager($this->_db);
			if($e->id() == $m->enseigne_id()){
				$m_man->update($m);
				return true;
			}
			return false;
		}

		public function getMenu(Enseigne $e, $id){
			$m_man = new MenuManager($this->_db);
			$id = (int) $id;
			if($m_man->exists($id)){
				$m = $m_man->get($id);
			}
			else{
				return false;
			}
			if($e->id() == $m->enseigne_id()){
				return $m;
			}
			else{
				return false;
			}
		}

		public function getListMenu(Enseigne $e){
			$mlist = [];
			$return = [];
			$m_man = new MenuManager($this->_db);
			$q = $this->_db->query('SELECT * FROM ENSEIGNE_MENU WHERE enseigne_id = '.$e->id());
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$mlist[] = new EnseigneMenu($donnees);
			}
			foreach($mlist as $value){
				$return[] = $m_man->get($value->menu_id());
			}
			return $return;
		}

				// PRODUIT

		public function setProduits(Enseigne $e, $pro_id){
//			$p_man = new ProduitsManager($this->_db);
			$ep_man = new EnseigneProduitsManager($this->_db);

//			$p_man->add($p);

			$link = new EnseigneProduits(['enseigne_id' => $e->id(), 'produits_id' => $pro_id]);
			$ep_man->add($link);
			return true;
		}

		public function updateProduit(Enseigne $e, Produits $p){
			$p_man = new ProduitsManager($this->_db);
			$ep_man = new EnseigneProduitsManager($this->_db);
			$checker = new EnseigneProduits(['enseigne_id' => $e->id(), 'produits_id' => $p->id()]);
			if($ep_man->exists($checker)){
				$p_man->update($p);
				return true;
			}
		}

		public function deleteProduit(Enseigne $e, Produits $p){
//			$p_man = new ProduitsManager($this->_db);
			$ep_man = new EnseigneProduitsManager($this->_db);
			$checker = new EnseigneProduits(['enseigne_id' => $e->id(), 'produits_id' => $p->id()]);
			if($ep_man->exists($checker)){
//				$p_man->delete($p);
//				echo 'lol';
				$ep_man->delete($checker);
				return true;
			}
		}

		public function getProdList(Enseigne $e){
			$p_man = new ProduitsManager($this->_db);
			$pl = [];
			$q = $this->_db->query('SELECT * FROM ENSEIGNE_PRODUITS WHERE enseigne_id = '.$e->id());
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$pl[] = $p_man->get($donnees['produits_id']);
			}
			return $pl;
		}

				// INGREDIENTS [NECESSITE QUE LES PRODUITS SOIENT FAIT]

				// CRITIQUES

		public function getCritiques(Enseigne $e){
			$crit = [];
			$q = $this->_db->prepare('SELECT * FROM CONSOMMATEUR_CRITIQUE_ENSEIGNE WHERE enseigne_id = :id');
			$q->bindValue(':id', $e->id(), PDO::PARAM_INT);
			$q->execute();
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$crit[] = new ConsommateurCritiqueEnseigne($donnees);
			}
			return $crit;
		}

		public function getHavCritCons(Enseigne $e){
			$c_man = new ConsommateurManager($this->_db);
			$whos = [];
			$links = $this->getCritiques($e);
			foreach($links as $value){
				$whos[] = $c_man->get($value->consommateur_id());
			}
			return $whos;
		}

		public function getDataPrintCrits(Enseigne $e, $type){
			/**
			*	@type = 'json', 'std'
			*	Permet de retourner directement les valeurs au format json
			*/
			$c_man = new ConsommateurManager($this->_db);
			$return = [];
			$crits = $this->getCritiques($e);
			foreach($crits as $val){
				$us = $c_man->get($val->consommateur_id());
				$return[$val->id()] = [
					'consommateur_id' => $us->id(),
					'consommateur_pseudo' => $us->pseudo(),
					'note' => $val->note(),
					'commentaire' => $val->commentaire(),
					'date' => 'Le '.date('d/m/Y', $val->dateajout()).' à '.date('H:i:s', $val->dateajout())
				];
			}
			if($type == 'std'){
				return $return;
			}
			elseif($type == 'json'){
				return json_encode($return);
			}
			else{
				return false;
			}

		}

			// FONCTIONS VISITEURS

		public function getEnseignesAround($latitude, $longitude, $dist_km){
			/**
			 * ATTENTION LES FONCTIONS DE LOCALISATION NECESSITES L'UTILISATIION
			 * DE LA FONCTION MYSQL get_distance_metres(x,x,x,x)
			 * VOIR : http://www.phpsources.org/calcul-de-la-distance-entre-deux-coordonnees-gps-avec-mysql_101.html
			 * POUR LA RECREER EN CAS DE BESOIN
			 */
			$dist_m = $dist_km * 1000;

			$sql = "SELECT *, get_distance_metres($latitude, $longitude, lat, lon) AS dist FROM ENSEIGNE GROUP BY id ORDER BY dist <= $dist_m  ASC";

			$q = $this->_db->query($sql);
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$result[] = new Enseigne($donnees);
			}

			return $result;
		}

		public function getEnseignesByDist($latitude, $longitude, int $limit = 0){
			/**
			 * ATTENTION LES FONCTIONS DE LOCALISATION NECESSITES L'UTILISATIION
			 * DE LA FONCTION MYSQL get_distance_metres(x,x,x,x)
			 * VOIR : http://www.phpsources.org/calcul-de-la-distance-entre-deux-coordonnees-gps-avec-mysql_101.html
			 * POUR LA RECREER EN CAS DE BESOIN
			 */

			$sql = "SELECT *, get_distance_metres($latitude, $longitude, lat, lon) AS dist FROM ENSEIGNE WHERE online = 1 GROUP BY id ORDER BY dist ASC";

			if($limit != 0){
                $sql = $sql . " LIMIT 0," . $limit;
            }

//			$sql = "SELECT *, $formule AS dist FROM ENSEIGNE GROUP BY id ORDER BY dist ASC";
			$q = $this->_db->query($sql);
			while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$result[] = new Enseigne($donnees);
			}

			return $result;
		}

		public function hydrateDistEnseigne(Enseigne $e, $lat, $lon){
			$sql = "SELECT *, get_distance_metres($lat, $lon, lat, lon) AS dist FROM ENSEIGNE GROUP BY id ORDER BY dist ASC";
			$q = $this->_db->query($sql);

			$donnees = $q->fetch(PDO::FETCH_ASSOC);

//			var_dump($donnees);

			$e->setDist($donnees['dist']);

			var_dump($e);
		}

		public function getWithDist($info, $lat, $lon){
			// VOIR SI ON RAJOUTE UN AUTRE CRITERE DE SELECTION [ EX : NOM ? ]
			if(is_int($info)){
				$info = (int) $info;
				$q = $this->_db->query("SELECT *, get_distance_metres($lat, $lon, lat, lon) AS dist FROM ENSEIGNE WHERE id = ".$info);
				$donnees = $q->fetch(PDO::FETCH_ASSOC);
//				var_dump($donnees);
				return new Enseigne($donnees);
			}
		}

		public function getOneRandEnseignesByDistMax($latitude, $longitude, $dist_km){
			/**
			 * OPTIMISATION POSSIBLE
			 */$req_result = $this->getEnseignesAround($latitude,$longitude, $dist_km);

			$id_list = [];

			foreach($req_result as $v){
				$id_list[] = $v->id();
			}

			$boucle = true;

			while($boucle == true) {

				$min_rand = intval(min($id_list)) - 1;
				$max_rand = intval(max($id_list));

				$rand_return = rand($min_rand, $max_rand);

				if (in_array($rand_return, $id_list)) {
					foreach ($req_result as $ens) {
						if ($ens->id() == $rand_return) {
							$boucle = false;
							return $ens;
						}
					}
				}
			}
		}

		public function getOneRandEnseignes(){
			$req_result = $this->getList();
			$id_list = [];

			foreach($req_result as $v){
				$id_list[] = $v->id();
			}

			$boucle = true;

			while($boucle == true) {

				$min_rand = intval(min($id_list)) - 1;
				$max_rand = intval(max($id_list));

				$rand_return = rand($min_rand, $max_rand);

				if (in_array($rand_return, $id_list)) {
					foreach ($req_result as $ens) {
						if ($ens->id() == $rand_return) {
							$boucle = false;
							return $ens;
						}
					}
				}
			}
		}

		public function hydrateOpenEns(Enseigne $e){
			$day = DayToolBox::convertToFR(date('D'));

			$date = date('His') + 20000;

//			echo $date;

//			echo $day;

			$today = false;


			$horList = $this->getHorairesList($e);

			foreach ($horList as $v){
				$open = DateToolBox::convHorTime($v->heureO());
				$close = DateToolBox::convHorTime($v->heureF());

				if($v->jour() == $day){
					if(($date > $open) AND ($date < $close)){
						return "<span class='text-success'>Ouvert</span>";
					}

					$today = "<span class='text-warning'>Ouvert aujourd'hui</span>";
				}
			}

			if($today != false){
				return $today;
			}
			else{
				return "<span class='text-danger'>Fermé </span>";
			}
		}
	}