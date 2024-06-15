<!DOCTYPE html>
<html lang="en">
<?php 
  require_once 'autoload.php';
  $cont = new Controller();
  $cont->head();
?>
<head>
    <title>Inscription V</title>
</head>
<body>
<?php 
  $cont->sidebar();
?>
  <div class="col-md-10">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><b>Modifier le Veterinaire</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          </ul>
        </div>
      </div>
    </nav>

    <?php
                      // Inclure le fichier contenant la fonction getConnection
                      session_start();


                    // if(isset($_GET['Id_veterinaire'])){
                    //   $id_vete= $_GET['Id_Veterinaire'];
                      // $query = "SELECT * FROM veterinaire WHERE id=:Id_Veterinaire LIMIT 1";
                      // $statement = $pdo->prepare($query);
                      // $statement->bindParam(':Id_Veterinaire', $student_id);
                      // $statement->execute();
                      // $result = $statement->fetch(PDO::FETCH_ASSOC);
                    // }
                                ?>
                    <form action="/Projet_MVC/VeterinaryController/updateVeterinaire" method="post">
                    <div class="container col-md-10 mt-4">
                    <input type="hidden" name="id" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" value="<?=$veto['Id_Veterinaire']?>">
                        <label  class="form-label">Nom</label>
                          <input name="Nom" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" value="<?=$veto['Nom']?>">
                        <label class="form-label">Prenom</label>
                        <input name="Prenom" id="inputPassword5" class="form-control" value="<?=$veto['Prenom']?>">
                        <label class="form-label">Adresse</label>
                        <input name="adresse" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" value="<?=$veto['adresse']?>">
                        <label class="form-label">Numéro de Téléphone</label>
                        <input name="telephone" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" value="<?=$veto['telephone']?>">
                        <label  class="form-label">E-mail</label>
                        <input name="email" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" value="<?=$veto['email']?>">
                        <div class="container mt-3">
                          <label  class="form-label">Sexe</label>
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="sexe" id="flexRadioDefault1" value="Homme" >
                                <label class="form-check-label" for="flexRadioDefault1">
                                Homme
                                </label>
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="radio" name="sexe" id="flexRadioDefault2" value="Femme" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                Femme
                                </label>
                            </div>
                        </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                              <button class="btn btn-outline-success col-md-2 me-md-3" type="submit" name="save_veterinary">Valider</button>
                              </form>
                              <form action="/Projet_MVC/VeterinaryController/index" method="post">
                                <button class="btn btn-primary " type="submit">Retour</button>
                              </form>
                            </div>
                        </div>
  
  </div>
  </div>
</body>
</html>