<?php


    class LoginModel {
        private $pdo;
        
        public function __construct() {
            $conn = new Controller();
            $this->pdo = $conn->getConnection();
        }
    
        public function checkLogin($nom, $mtp) {
            $sql = "SELECT * FROM `login` WHERE `nom` = :nom AND `mtp` = :mtp";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':mtp', $mtp);
            $stmt->execute();
    
            return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
        }
    }


?>