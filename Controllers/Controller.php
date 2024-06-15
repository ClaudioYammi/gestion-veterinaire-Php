<?php

class Controller{
    function index(){
        include 'views/dashboard.php';
    }

    function head(){
        include 'views/shared/head.php';
    }

    function sidebar(){
        include 'views/shared/sidebar.php';
    }

    

    function getConnection(){
        $user = "root";
        $pass = "";
    
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=veto', $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            
        } catch (Exception $e) {
            echo "connexion reussie ! <br>";
        }
    
        return $pdo;
    }


    public function affiche(){
        $PtAffiche = new Compter();
        $PtCount = $PtAffiche->getCount();
        include 'Views/dashboard.php';
    }
}