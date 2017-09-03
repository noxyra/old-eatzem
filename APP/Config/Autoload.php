<?php
function ModeleLoader($classname){
    if(file_exists('APP/Dao/' . $classname . '.php')){
        require 'APP/Dao/' . $classname . '.php';
    }
    elseif(file_exists('APP/Entity/' . $classname . '.php')){
        require 'APP/Entity/' . $classname . '.php';
    }
    elseif(file_exists('APP/Libs/' . $classname . '.php')){
        require 'APP/Libs/' . $classname . '.php';
    }
}
spl_autoload_register('ModeleLoader');