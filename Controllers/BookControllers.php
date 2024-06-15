<?php
include 'Models/BookModel.php';


function deleteVAction()
{
    $pdo = getConnection();
    $id = $_GET['Id_Veterinaire'];
    $veto = new Veterinaire($pdo);
    $result = $veto->deleteV($id);

    if($result === true) {
        echo "Le book a bien été supprimé !";
    } else {
        echo "Un problème est survenu.";
    }
}


?>