<?php
    require_once 'autoload.php';
    class PatientController{
        function index(){
            include 'views/patient/index.php';
        }

        function edit($id){
            $vetoModel = new PatientModel();

            $PList = $vetoModel->getByIdPt($id);
            
            include 'views/patient/edit.php';
        }

        function view(){
            include 'views/patient/view.php';
        }

        function create(){
            $patientModel = new ProprietaireModel();
            include 'views/patient/create.php';
        }
   

        #boutton valider ------------------------------------------------------------------------------------------------
        function createPatient(){
            if (isset($_POST['save_patient'])) {
                $pdo = new PDO('mysql:host=localhost;dbname=veto', 'root', '');
            
                // Créer une instance de la classe
                $instance = new PatientModel();
            
                // Récupérer la valeur sélectionnée du champ "sexe"
                $sexe = ($_POST['sexe'] === 'Male') ? 'Homme' : 'Femme';
            
            
                // Appeler la fonction spécifique en utilisant les données du formulaire
                $data = [
                    'nom' => $_POST['Nom'],
                    'espece' => $_POST['espece'],
                    'race' => $_POST['race'],
                    'date_naissance' => $_POST['date_naissance'],
                    'sexe' => $sexe,
                    'antecedents_medicaux' => $_POST['antecedents_medicaux'],
                    'Id_Proprietaires' => $_POST['Id_Proprietaires']
                    
                ];
            
                // Appeler la fonction spécifique en utilisant les données du formulaire
                $instance->createPt($data);
            
                // Rediriger ou afficher un message de succès, etc.
                //require "insc";
                // ...
                PatientController::index();
            }
        }

        function updatePatient(){
            if (isset($_POST['save_patient'])) {
                $pdo = new PDO('mysql:host=localhost;dbname=veto', 'root', '');
            
                // Créer une instance de la classe
                $instance = new PatientModel();
                $id = $_POST['id'];
    
                // Récupérer la valeur sélectionnée du champ "sexe"
                $sexe = ($_POST['sexe'] === 'homme') ? 'Homme' : 'Femme';
            
            
                // Appeler la fonction spécifique en utilisant les données du formulaire
                $data = [
                    'nom' => $_POST['Nom'],
                    'prenom' => $_POST['espece'],
                    'adresse' => $_POST['race'],
                    'date_naissance' => $_POST['date_naissance'],
                    'antecedents_medicaux' => $_POST['antecedents_medicaux'],
                    'sexe' => $sexe,
                    'Id_Proprietaires' => $_POST['Id_Proprietaires']
                ];
            
                // Appeler la fonction spécifique en utilisant les données du formulaire
                $instance->updatePt($id, $data);
            
                // Rediriger ou afficher un message de succès, etc.
                //require "insc";
                // ...
                PatientController::index();
            }
        }

        function deletePtAction()
        {
            // if (isset($_POST['submit'])){
                $id = $_POST['Id_Patients'];
                $veto = new PatientModel();
                $result = $veto->deletePt($id);
                PatientController::index();
            // }
            
        }
   
    }