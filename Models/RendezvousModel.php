<?php
    class RendezvousModel {
        private $pdo;

        public function __construct() {
            $conn = new Controller();
            $this->pdo = $conn->getConnection();
        }

        public function createRdv($data) {
            $query = "INSERT INTO rendez_vous (date_heure, motif, observations, Id_Patients, Id_Veterinaire) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($query);
        
        
            $stmt->execute([$data['date_heure'], $data['motif'], $data['observations'], $data['Id_Patients'], $data['Id_Veterinaire']]);
        }

        public function deleteRdv($id) {
            $query = "DELETE FROM rendez_vous WHERE Id_Rendez_vous = :Id_Rendez_vous";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':Id_Rendez_vous', $id);
            $stmt->execute();
    
            if($stmt === true) {
                // include('Views/list-veterinary.php');
                return true;
            }else{
                // echo "un problème est survenue.";
                return false;
            }
        }

        public function getByIdRdv($id) {
            $query = "SELECT * FROM rendez_vous WHERE Id_rendez_vous = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

































    }
?>