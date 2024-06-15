<?php
require_once 'autoload.php';
class RendezvousController{
    function index(){
        include 'views/Rendez-vous/index.php';
    }

    function edit($id){
        $vetoModel = new RendezvousModel();
        $rdvP = $vetoModel->getByIdRdv($id);
        include 'views/Rendez-vous/edit.php';
    }

    function view(){
        include 'views/Rendez-vous/view.php';
        
    }

    function create(){
        $patientModel = new PatientModel();
        $pat = $patientModel->getListPa();

        $patientModel = new VeterinaireModel();
        $LVeto = $patientModel->getListVeto();

        include 'views/Rendez-vous/create.php';
    }

    function createRdv(){
        if (isset($_POST['save_rdv'])) {
            $pdo = new PDO('mysql:host=localhost;dbname=veto', 'root', '');
        
            // Créer une instance de la classe
            $instance = new RendezvousModel();
        
            // Appeler la fonction spécifique en utilisant les données du formulaire
            $data = [
                'date_heure' => $_POST['date_heure'],
                'motif' => $_POST['motif'],
                'observations' => $_POST['observations'],
                'Id_Patients' => $_POST['Id_Patients'],
                'Id_Veterinaire' => $_POST['Id_Veterinaire']
            ];
        
            // Appeler la fonction spécifique en utilisant les données du formulaire
            $instance->createRdv($data);
        
            // Rediriger ou afficher un message de succès, etc.
            // ...
            RendezvousController::index();
        }
    }

    function deleteRDVAction()
    {
        // if (isset($_POST['submit'])){
            $id = $_POST['Id_Rendez_vous'];
            $veto = new RendezvousModel();
            $result = $veto->deleteRdv($id);
            RendezvousController::index();
        // }
        
    }



}