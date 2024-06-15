<?php
require_once 'autoload.php';
class ProprietaireModel {
    private $pdo;

    public function __construct() {
        $conn = new Controller();
        $this->pdo = $conn->getConnection();
    }

    // Méthode pour créer un nouveau vétérinaire
    public function createP($data) {
        $query = "INSERT INTO Proprietaires (Nom, Prenom, adresse, telephone, email, Sexe) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($query);
        
        // Convertir la valeur du sexe en une représentation appropriée
        $sexe = ($data['sexe'] === 'Homme') ? 'Homme' : 'Femme';
    
        $stmt->execute([$data['nom'], $data['prenom'], $data['adresse'], $data['telephone'], $data['email'], $sexe]);
    }

    // Méthode pour récupérer un vétérinaire par son ID
    public function getByIdP($id) {
        $query = "SELECT * FROM Proprietaires WHERE Id_Proprietaires = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getListPro(){
        $query = "SELECT * FROM proprietaires";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour mettre à jour les informations d'un vétérinaire
    public function update($id, $data) {
        $query = "UPDATE prorpietaires SET Nom = ?, Prenom = ?, adresse = ?, telephone = ?, email = ?, Sexe = ? WHERE Id_Proprietaires = ?";
        $stmt = $this->pdo->prepare($query);
    
        // Convertir la valeur du sexe en une représentation correspondante dans la base de données
        $sexe = ($data['sexe'] === 'homme') ? 'M' : 'F';
    
        $stmt->execute([$data['nom'], $data['prenom'], $data['adresse'], $data['telephone'], $data['email'], $sexe, $id]);
    }

    public function updateP($id, $data) {
        $query = "UPDATE Proprietaires SET Nom = :Nom, Prenom = :Prenom, adresse = :adresse, telephone = :telephone, email = :email, Sexe = :Sexe WHERE Id_Proprietaires = :Id_Proprietaires";
        $stmt = $this->pdo->prepare($query);
    
        $sexe = ($data['sexe'] === 'Homme') ? 'Homme' : 'Femme';
        $stmt->bindParam(':Id_Proprietaires', $id);
        $stmt->bindParam(':Nom', $data['nom']);
        $stmt->bindParam(':Prenom', $data['prenom']);
        $stmt->bindParam(':adresse', $data['adresse']);
        $stmt->bindParam(':telephone', $data['telephone']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':Sexe', $sexe);
        // Convertir la valeur du sexe en une représentation correspondante dans la base de données
    
        $stmt->execute();
    }

    // Méthode pour supprimer un vétérinaire
    public function deleteP($id) {
        $query = "DELETE FROM proprietaires WHERE Id_Proprietaires = :Id_Proprietaires";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':Id_Proprietaires', $id);
        $stmt->execute();

        if($stmt === true) {
            // include('Views/list-veterinary.php');
            return true;
        }else{
            // echo "un problème est survenue.";
            return false;
        }
    }
    
}