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
        <a class="navbar-brand" href="#"><b>Modifier le patient</b></a>
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
                                ?>
                    <form action="/Projet_MVC/PatientController/updatePatient" method="post">
                    <div class="container col-md-10 mt-4">
                    <input type="hidden" name="id" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" value="<?=$PList['Id_Patients']?>">
                        <label  class="form-label">Nom</label>
                          <input name="Nom" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" value="<?=$PList['nom']?>">
                        <label class="form-label">Espece</label>
                        <input name="espece" id="inputPassword5" class="form-control" value="<?=$PList['espece']?>">
                        <label class="form-label">Race</label>
                        <input name="race" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" value="<?=$PList['race']?>">
                        <label class="form-label">Date_naissance</label>
                        <input name="date_naissance" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" value="<?=$PList['date_naissance']?>">
                        <label class="form-label">Antecedants medicaux</label>
                        <input name="antecedents_medicaux" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" value="<?=$PList['antecedents_medicaux']?>">
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
                        <?php
                      // Inclure le fichier contenant la fonction getConnection
                      // Établir la connexion à la base de données
                      $conn = new Controller();
                      $pdo = $conn->getConnection();

                      $vetoModel = new ProprietaireModel();
                      $prop = $vetoModel->getListPro();
                        ?>
                        <div class="form-group mt-2">
                          <label for="selectProprietaires">Propriétaires</label>
                          <select class="form-select" id="selectProprietaires" name="Id_Proprietaires">
                          
                            <?php foreach ($prop as $proprietaire) : ?>
                              <option value="<?php echo $proprietaire['Id_Proprietaires']; ?>">
                                <?php echo $proprietaire['nom']; ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                        </div> 
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                              <button class="btn btn-outline-success col-md-2 me-md-3" type="submit" name="save_patient">Valider</button>
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