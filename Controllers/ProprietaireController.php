<?php
require_once 'autoload.php';
class ProprietaireController{
    function index(){
        include 'views/proprietaire/index.php';
    }

    function edit($id){
        $proModel = new ProprietaireModel();
        $pro = $proModel->getByIdP($id);
        include 'views/proprietaire/edit.php';
    }

    function view($id){
        $proModel = new ProprietaireModel;
        $pro2 = $proModel->getByIdP($id);
        include 'views/proprietaire/view.php';
    }

    function create(){
        include 'views/proprietaire/create.php';
    }

    
    function deletePAction()
    {
        // if (isset($_POST['submit'])){
            $id = $_POST['Id_Proprietaires'];
            $veto = new ProprietaireModel();
            $result = $veto->deleteP($id);
            ProprietaireController::index();
        // }
        
    }

    function createProprietaire(){
        if (isset($_POST['save_proprietaire'])) {
            $pdo = new PDO('mysql:host=localhost;dbname=veto', 'root', '');
        
            // Créer une instance de la classe
            $instance = new ProprietaireModel();
        
            // Récupérer la valeur sélectionnée du champ "sexe"
            $sexe = ($_POST['sexe'] === 'Homme') ? 'Homme' : 'Femme';
        
        
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
            $instance->createP($data);
        
            // Rediriger ou afficher un message de succès, etc.
            //require "insc";
            // ...
            ProprietaireController::index();
        }
    }

    function updateProprietaire(){
        if (isset($_POST['save_proprietaire'])) {
            $pdo = new PDO('mysql:host=localhost;dbname=veto', 'root', '');
        
            // Créer une instance de la classe
            $instance = new ProprietaireModel();
            $id = $_POST['id'];

            // Récupérer la valeur sélectionnée du champ "sexe"
            $sexe = ($_POST['sexe'] === 'homme') ? 'Homme' : 'Femme';
        
        
            // Appeler la fonction spécifique en utilisant les données du formulaire
            $data = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'adresse' => $_POST['adresse'],
                'telephone' => $_POST['telephone'],
                'email' => $_POST['email'],
                'sexe' => $sexe
            ];
        
            // Appeler la fonction spécifique en utilisant les données du formulaire
            $instance->updateP($id, $data);
        
            // Rediriger ou afficher un message de succès, etc.
            //require "insc";
            // ...
            ProprietaireController::index();
        }
    }


}