<?php
require_once 'autoload.php';
class TraitementController{
    function index(){
        include 'views/traitement/index.php';
    }

    function edit(){
        include 'views/traitement/edit.php';
    }

    function view(){
        include 'views/traitement/view.php';
    }

    function create(){
        include 'views/traitement/create.php';
    }

}