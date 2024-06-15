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
        <a class="navbar-brand" href="#"><b>INSCRIPTION RENDEZ-VOUS</b> </a>
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
  //Icl

  
  ?>
  <form action="/Projet_MVC/RendezvousController/createRdv" method="post">
  <div class="container col-md-10 mt-4">
      <label  class="form-label">Date de Rendez-vous</label>
        <input type="date" name="date_heure" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
      <label class="form-label">Motif</label>
      <input name="motif" id="inputPassword5" class="form-control" >
      <label class="form-label">Observations</label>
      <input name="observations" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
      <?php
                      // Inclure le fichier contenant la fonction getConnection
                      // Établir la connexion à la base de données
                      $conn = new Controller();
                      $pdo = $conn->getConnection();


            ?>
            <div class="form-group mt-2 d-flex">
  <div class="me-3 flex-grow-1">
    <label for="selectPatients">Patients</label>
    <select class="form-select" id="selectPatients" name="Id_Patients" style="width: 100%; background-color: skyblue;">
      <?php foreach ($pat as $rdvcreate) : ?>
        <option value="<?php echo $rdvcreate['Id_Patients']; ?>">
          <?php echo $rdvcreate['nom']; ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="flex-grow-1">
    <label for="selectVeterinaires">Veterinaires</label>
    <select class="form-select" id="selectVeterinaires" name="Id_Veterinaire" style="width: 100%; background-color: skyblue;">
      <?php foreach ($LVeto as $rdvveto) : ?>
        <option value="<?php echo $rdvveto['Id_Veterinaire']; ?>">
          <?php echo $rdvveto['Nom']; ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
      
          <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
            <button class="btn btn-outline-success col-md-2 me-md-3" type="submit" name="save_rdv">Valider</button>
              </form>
              <form action="/Projet_MVC/RendezvousController/index" method="post">
                <button type="submit" class="btn btn-primary " >Retour</button>
                    </div>
                </div>
              </form>
  </div>
  </div>
</body>
</html>