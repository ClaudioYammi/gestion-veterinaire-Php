<?php

    spl_autoload_register(function($classname){
        //chemin importation
        if(file_exists($classname.'.php')){
            require_once $classname.'.php';
        } else if(file_exists('Models/'.$classname.'.php')){
            require_once 'Models/'.$classname.'.php';
        } else if(file_exists('Controllers/'.$classname.'.php')){
            require_once 'Controllers/'.$classname.'.php';
        }
    });


?>