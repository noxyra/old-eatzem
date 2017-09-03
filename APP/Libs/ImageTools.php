<?php
    class ImageTools{

        // ATTRIBUTS

        const ENSEIGNE = "Upload/Images/Enseignes/";
        const PRODUITS = "Upload/Images/Produits/";

        // METHODES

        public static function setEnseignePicture(Enseigne $e, array $file, PDO $db){
            if(!empty($file['logo']['tmp_name']) AND is_uploaded_file($file['logo']['tmp_name'])){
                if(filesize($file['logo']['tmp_name']) < 5097152){
                    list($largeur, $hauteur, $type, $attr) = getimagesize($file['logo']['tmp_name']);
                    if(($type === 2) OR ($type === 3) OR ($type === 6)){
                        if(!is_dir(self::ENSEIGNE)){
                            mkdir(self::ENSEIGNE,0777,true);
                        }

                        $fichier_pre = explode('.', basename($file['logo']['name']));
                        $fichier = $e->id() . '.' . end($fichier_pre);

                        if(move_uploaded_file($file['logo']['tmp_name'], self::ENSEIGNE . $fichier)){
                            $enseigneManager = new EnseigneManager($db);
                            $e->setLogo($fichier);
                            $enseigneManager->update($e);
                        }

                    }
                    else{
                        return 'le fichier n\'est pas du bon type';
                    }
                }
                else{
                    return 'Le fichier dépasse la taille maximale';
                }
            }
        }

        public static function pathEnseignePic(Enseigne $e){
            if(!empty($e->logo())){
                $prepare = self::ENSEIGNE . $e->logo();
            }
            else{
                $prepare = self::ENSEIGNE . "default.jpg";
            }
            return $prepare;
        }

        public static function setProduitsPicture(Produits $p, array $file, PDO $db){
            if(!empty($file['imageProduit']['tmp_name']) AND is_uploaded_file($file['imageProduit']['tmp_name'])){
                if(filesize($file['imageProduit']['tmp_name']) < 5097152){
                    list($largeur, $hauteur, $type, $attr) = getimagesize($file['imageProduit']['tmp_name']);
                    if(($type === 2) OR ($type === 3) OR ($type === 6)){
                        if(!is_dir(self::PRODUITS)){
                            mkdir(self::PRODUITS,0777,true);
                        }

                        $fichier_pre = explode('.', basename($file['imageProduit']['name']));
                        $fichier = $p->id() . '.' . end($fichier_pre);

                        if(move_uploaded_file($file['imageProduit']['tmp_name'], self::PRODUITS . $fichier)){
                            $produitsManager = new ProduitsManager($db);
                            $p->setImage($fichier);
                            $produitsManager->update($p);
                        }

                    }
                    else{
                        return 'le fichier n\'est pas du bon type';
                    }
                }
                else{
                    return 'Le fichier dépasse la taille maximale';
                }
            }
        }

        public static function pathProduitsPic(Produits $p){
            if(!empty($p->image())){
                $prepare = self::PRODUITS . $p->image();
            }
            else{
                $prepare = self::PRODUITS . "default.jpg";
            }
            return $prepare;
        }
    }