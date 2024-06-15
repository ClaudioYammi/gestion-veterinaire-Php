<?php
    require_once 'autoload.php';
    

    class PatientModel {
        private $pdo;
        public function __construct() {
            $conn = new Controller();
            $this->pdo = $conn->getConnection();
        }
        
    // Méthode pour créer un nouveau vétérinaire
        public function createPt($data) {
            $query = "INSERT INTO Patients (nom, espece, race, date_naissance, sexe, antecedents_medicaux, Id_Proprietaires) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($query);
        
            // Convertir la valeur du sexe en une représentation appropriée
            $sexe = ($data['sexe'] === 'Male') ? 'Male' : 'Femelle';
        
            $stmt->execute([$data['nom'], $data['espece'], $data['race'], $data['date_naissance'], $sexe, $data['antecedents_medicaux'], $data['Id_Proprietaires']]);
        }

        public function deletePt($id) {
            $query = "DELETE FROM patients WHERE Id_Patients = :Id_Patients";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':Id_Patients', $id);
            $stmt->execute();

            if($stmt === true) {
                // include('Views/list-veterinary.php');
                return true;
            }else{
                // echo "un problème est survenue.";
                return false;
            }
        }

        public function updatePt($id, $data) {
            $query = "UPDATE patients SET nom = :Nom, espece = :espece, race = :race, date_naissance = :date_naissance, sexe =:sexe, antecedents_medicaux = :antecedents_medicaux, Id_Proprietaires = :Id_Proprietaires WHERE Id_Patients = :Id_Patients";
            $stmt = $this->pdo->prepare($query);
        
            $sexe = ($data['sexe'] === 'Homme') ? 'Homme' : 'Femme';

            $stmt->bindParam(':Id_Patients', $id);
            $stmt->bindParam(':Nom', $data['nom']);
            $stmt->bindParam(':espece', $data['espece']);
            $stmt->bindParam(':race', $data['race']);
            $stmt->bindParam(':date_naissance', $data['date_naissance']);
            $stmt->bindParam(':antecedents_medicaux', $data['antecedants_medicaux']);
            $stmt->bindParam(':sexe', $sexe);
            $stmt->bindParam(':Id_Proprietaires', $data['Id_Proprietaires']);
            // Convertir la valeur du sexe en une représentation correspondante dans la base de données
        
            $stmt->execute();
        }

        public function getByIdPt($id) {
            $query = "SELECT * FROM Patients WHERE Id_Patients = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getListPa(){
            $query = "SELECT * FROM patients";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        
    }