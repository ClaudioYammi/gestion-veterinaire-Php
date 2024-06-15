<?php
require_once 'autoload.php';
class VeterinaryController{
    function index(){
        include 'views/veterinaire/index.php';
    }

    function edit($id){
        $vetoModel = new VeterinaireModel();
        $veto = $vetoModel->getByIdV($id);
        include 'views/veterinaire/edit.php';
    }

    function view($id){
        $vetoModel = new VeterinaireModel();
        $veto2 = $vetoModel->getByIdV($id);
        include 'views/veterinaire/view.php';
    }

    function create(){
        include 'views/veterinaire/create.php';
    }

    function home(){
        include 'views/dashboard.php';
    }

    #boutton valider ------------------------------------------------------------------------------------------------
    function createVeterinaire(){
        if (isset($_POST['save_veterinary'])) {
            $pdo = new PDO('mysql:host=localhost;dbname=veto', 'root', '');
        
            // Créer une instance de la classe
            $instance = new VeterinaireModel();
        
            // Récupérer la valeur sélectionnée du champ "sexe"
            $sexe = ($_POST['sexe'] === 'homme') ? 'Homme' : 'Femme';
        
        
            // Appeler la fonction spécifique en utilisant les données du formulaire
            $data = [
                'nom' => $_POST['Nom'],
                'prenom' => $_POST['Prenom'],
                'adresse' => $_POST['adresse'],
                'telephone' => $_POST['telephone'],
                'email' => $_POST['email'],
                'sexe' => $sexe
            ];
        
            // Appeler la fonction spécifique en utilisant les données du formulaire
            $instance->createV($data);
        
            // Rediriger ou afficher un message de succès, etc.
            //require "insc";
            // ...
            VeterinaryController::index();
        }
    }

    function updateVeterinaire(){
        if (isset($_POST['save_veterinary'])) {
            $pdo = new PDO('mysql:host=localhost;dbname=veto', 'root', '');
        
            // Créer une instance de la classe
            $instance = new VeterinaireModel();
            $id = $_POST['id'];

            // Récupérer la valeur sélectionnée du champ "sexe"
            $sexe = ($_POST['sexe'] === 'homme') ? 'Homme' : 'Femme';
        
        
            // Appeler la fonction spécifique en utilisant les données du formulaire
            $data = [
                'nom' => $_POST['Nom'],
                'prenom' => $_POST['Prenom'],
                'adresse' => $_POST['adresse'],
                'telephone' => $_POST['telephone'],
                'email' => $_POST['email'],
                'sexe' => $sexe
            ];
        
            // Appeler la fonction spécifique en utilisant les données du formulaire
            $instance->updateV($id, $data);
        
            // Rediriger ou afficher un message de succès, etc.
            //require "insc";
            // ...
            VeterinaryController::index();
        }
    }

    function deleteVAction()
    {
        // if (isset($_POST['submit'])){
            $id = $_POST['Id_Veterinaire'];
            $veto = new VeterinaireModel();
            $result = $veto->deleteV($id);
            VeterinaryController::index();
        // }
        
    }

}