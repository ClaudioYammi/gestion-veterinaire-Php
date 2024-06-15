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
        <a class="navbar-brand" href="#"><b>Information le Veterinaire</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-0 mb-lg-0 ">
            
          </ul>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <form action="/Projet_MVC/VeterinaryController/index" method="post">
              <button class="btn btn-primary" type="submit">Retour</button>
            </form>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="col-md-6">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <table class="table table-condensed">
          <thead>
            <tr>
              <th scope="col">ID</th>
                <td><?=$veto2['Id_Veterinaire']?></td>
              </tr>
              <tr>
                <th scope="col">Nom complet</th>
                <td><?=$veto2['Nom']?> <?=$veto2['Prenom']?></td>
              </tr>
              <tr>
                <th scope="col">Adresse</th>
                <td><?=$veto2['adresse']?></td>
              </tr>
              <tr>
                <th scope="col">Numero de telephone</th>
                <td><?=$veto2['telephone']?></td>
              </tr>
              <tr>
                <th scope="col">email</th>
                <td><?=$veto2['email']?></td>
              </tr>
              <tr>
                <th scope="col">Sexe</th>
                <td><?=$veto2['Sexe']?></td>
              </tr>
              
            </thead>
            <tbody>
              <tr>
                        
                  
              </tr>
            </tbody>
                </div>
            </div>
          </nav>
          
      </table>
      
      
</body>
</html>