<?php 
  include("Controller/con_conf.php");
  // count data in Admin table
  $sql = "SELECT * FROM Admin";
  $stmt = $bdd->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  $count = count($result);
  if (!$count == 0) {
    header('Location: view/login.php');
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="assets/bootstrap5/css/bootstrap.min.css">
    <script src="assets/bootstrap5/js/bootstrap.min.js" defer></script>
    <title>Gestionnaire UFR/SDS </title>
</head>
<body >
    <nav class="navbar row container-fluid">
      <div class="col-12">
        <a class="navbar-brand" href="#">
          <h1
            class="text-center text-success bg-light"
            style="font-size: 3.5rem"
          >
            <img
              src="assets/img/logo.png"
              alt=""
              style="height: 5rem"
              class="d-inline-block align-text-top"
            />Gestionnaire UFR/SDS
          </h1>
        </a>
      </div>
    </nav>
<section class="vh-80 bg-image">
  <div class="mask d-flex h-100 gradient-custom-3 ">
    <div class="container h-100">
      <div class="row d-flex justify-content-center
     h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card box" style="border-radius: 15px;" >
            <div class="card-body p-2">
              <h2 class="text-uppercase text-center mb-5">Creer un compte </h2>

              <form action="Controller/inscription.php" method="post">

                <div class="form-outline mb-1">
                  <input type="text" id="form3Example1cg" name="nom" class="form-control form-control-lg"
                  placeholder="Nom" />
                
                </div>

                <div class="form-outline mb-1">
                  <input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg" 
                  placeholder="Email" />
                
                </div>

                <div class="form-outline mb-1">
                  <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg"
                  placeholder="mot de passe" />
                </div>

                <div class="form-outline mb-1">
                  <input type="password" id="form3Example4cdg" name="password2" class="form-control form-control-lg" 
                  placeholder="repeter le mot de passe"/>
                </div>

              <?php
                if(isset($_GET['error'])){
                  echo '<div class="alert alert-danger" role="alert">
                  <strong>Erreur!</strong> '.$_GET['error'].'
                  </div>';}
              ?>
                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-light">Enregistrer</button>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>