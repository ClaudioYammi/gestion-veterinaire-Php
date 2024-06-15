
<!DOCTYPE html>
<html lang="en">
<?php 
  require_once 'autoload.php';
  $cont = new Controller();
  $cont->head();
?>
<body>
<?php 
  $cont->sidebar();
?>
  <div class="col-md-10">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><b>LISTE des Patients</b> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>


  <div class="container col-md-12 mt-4">
    <div class="row">
      <div class="col-md-12">
          
              <div class="card-body">

                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Nom de l'animal</th>
                              <th>Espece </th>
                              <th>Race</th>
                              <th>Née</th>
                              <th>Sexe</th>
                              <th>antecedant Médicaux</th>
                              <th>Proprietaire</th>
                              <th>Paramètre</th>
                          </tr>
                      </thead>
                      <?php
                      // Tokony any amin'ny PatientController no misy instanciation, katramn $stmt = $pdo...
                      // Inclure le fichier contenant la fonction getConnection
                      require_once 'autoload.php';

                      // Établir la connexion à la base de données
                      $conn = new Controller();
                      $pdo = $conn->getConnection();
                         // Effectuer la requête de sélection
                            $query = "SELECT * FROM patients";
                            $stmt = $pdo->query($query);

                            if ($stmt->rowCount() > 0) {
                                while ($pt = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                              <tr>
                              <td><?=$pt['Id_Patients']?></td>
                              <td><?=$pt['nom']?></td>
                              <td><?=$pt['espece']?></td>
                              <td><?=$pt['race']?></td>
                              <td><?=$pt['date_naissance']?></td>
                              <td><?=$pt['sexe']?></td>
                              <td><?=$pt['antecedents_medicaux']?></td>
                              <td><?=$pt['Id_Proprietaires']?></td>
                              <td>
                              <form action="/Projet_MVC/PatientController/view/<?= $pt['Id_Patients'] ?>" method="get" style="display: inline-block;">
                                      <input type="hidden" name="Id_Patients" value="<?= $pt['Id_Patients'] ?>">
                                      <input type="submit" class="btn btn-primary btn-sm" value="Voir">
                                  </form>
                                  <form action="/Projet_MVC/PatientController/edit/<?= $pt['Id_Patients'] ?>" method="get" style="display: inline-block;">
                                      <input type="hidden" name="Id_Patients" value="<?= $pt['Id_Patients'] ?>">
                                      <input type="submit" class="btn btn-success btn-sm" value="Edit" >
                                  </form>
                                  <form action="/Projet_MVC/PatientController/deletePtAction/<?= $pt['Id_Patients'] ?>" method="POST" style="display: inline-block;">
                                      <input type="hidden" name="Id_Patients" value="<?= $pt['Id_Patients'] ?>">
                                      <input type="submit" class="btn btn-danger btn-sm " value="Delete" >
                                  </form>
                              </td>
                              </tr>
                            <?php
                            }
                                    } else {
                                        echo "<h5>Aucun enregistrement trouvé</h5>";
                                    }
                            ?>
                          </tbody>
                        
                  </table>
              </div>
          </div>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a href="/Projet_MVC/PatientController/create" class="btn btn-outline-success col-md-2 " type="submit" >Ajouter</a>
          </div>
  </div>
</div>

      
  </div>
  </div>
  
</body>
</html>