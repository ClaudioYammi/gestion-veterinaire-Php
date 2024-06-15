<?php

$url = $_SERVER['REQUEST_URI'];
//echo $url.'<br>';// miaficher anle chemin
$route = str_replace('/Projet_MVC','',$url);
//echo $route.'<br>'; // miafficher anle chemin
$string = explode('/',$route);
//echo $string[1]."<br>";//nom de la classe
//echo $string[2]."<br>";//nom methode

#echo __DIR__;

require_once __DIR__.'/Controllers/'.$string[1].'.php';
$controls = new $string[1]();
$method = $string[2];   
if(isset($string[3])){
    $controls->$method($string[3]);//attaquer methodes
} else {
    $controls->$method();
}

?>