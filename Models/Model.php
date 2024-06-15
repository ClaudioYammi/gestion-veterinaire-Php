<?php

    class Compter{
        private $pdo;
        public function __construct() {
            $conn = new Controller();
            $this->pdo = $conn->getConnection();
        }


        public function getCount(){
            $query = "SELECT COUNT(*) AS total FROM patients";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $result['total'];
            return $count;
        } 
    }

?>