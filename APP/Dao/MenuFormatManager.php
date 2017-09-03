<?php
    class MenuFormatManager{

        // ATTRIBUTS

        private $_db;

        // METHODES

        public function __construct($db){
            $this->setDb($db);
        }

        public function setDb(PDO $db){
            $this->_db = $db;
        }

        public function add(MenuFormat $mf){
            $q = $this->_db->prepare('INSERT INTO MENU_FORMAT(menu_id, format_id) VALUES(:mid, :fid)');
            $q->bindValue(':mid', $mf->menu_id(), PDO::PARAM_INT);
            $q->bindValue(':fid', $mf->format_id(), PDO::PARAM_INT);
            $q->execute();
        }

        public function delete(MenuFormat $mf){
            $q = $this->_db->prepare('DELETE FROM MENU_FORMAT WHERE menu_id = :mid AND format_id = :fid');
            $q->bindValue(':mid', $mf->menu_id(), PDO::PARAM_INT);
            $q->bindValue(':fid', $mf->format_id(), PDO::PARAM_INT);
            $q->execute();
        }

        public function exists(MenuFormat $mf){
            $q = $this->_db->prepare('SELECT COUNT(*) FROM MENU_FORMAT WHERE menu_id = ? AND format_id = ?');
            $q->execute([$mf->menu_id(), $mf->format_id()]);
            $donnees = $q->fetch();
            return (bool) $donnees[0]; 
        }
    }