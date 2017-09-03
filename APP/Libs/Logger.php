<?php
    class Logger{

        const SCR_PATH = "../../APP/Logs/";
        const STD_PATH = "APP/Logs/";

        public static function LogAction($content, $name = false, $scriptMode = false){
            if($scriptMode == true){
                $path = self::SCR_PATH;
            }
            else{
                $path = self::STD_PATH;
            }

            if($name == false){
                $name = 'other_' . date('Ymd') . '.log';
            }
            else{
                $name = $name . '_' . date('Ymd') . '.log';
            }

            // EXP Création du fichier avec l'option : w+
            $logFile = fopen($path . $name, 'w+');

            // EXP Insertion du contenu du log dans le fichier
            fputs($logFile, $content);

            // EXP Fermeture du fichier pour éviter tout problèmes de corruption
            fclose($logFile);

            // EXP On fait un retour console du log en question
            echo $content;
        }
    }

?>
