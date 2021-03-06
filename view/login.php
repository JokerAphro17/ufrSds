<?php 
  include("../Controller/con_conf.php");
  // count data in Admin table
  $sql = "SELECT * FROM Admin";
  $stmt = $bdd->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  $count = count($result);
  if ($count == 0) {
    header('Location: ../index.php');
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../assets/bootstrap5/css/bootstrap.min.css">
    <script src="../assets/bootstrap5/js/bootstrap.min.js" defer></script>
    <script src="../assets/jquery-3.6.0.min.js"></script>

    <title>Gestionnaire UFR/SDS </title>
</head>
<body class="">
<nav class="navbar row ">
      <div class="col-12">
        <a class="navbar-brand" href="#">
          <h1
            class="text-center text-success bg-light"
            style="font-size: 3.5rem"
          >
            <img
              src="../assets/img/logo.png"
              alt=""
              style="height: 5rem"
              class="d-inline-block align-text-top "
            />Gestionnaire UFR/SDS
          </h1>
        </a>
      </div>
    </nav>
    <?php
      if (isset($_GET['success'])) {
        echo ' <div id="ale" class="alert alert-success text-center" role="alert">
        <strong>Success!</strong> Votre compte a été créé avec succès.
      </div>';
      }
    ?>
<section class="vh-80 ">
  <div class="container">
    <div class="row d-flex justify-content-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-success text-white" style="border-radius: 1rem;">
          <div class="card-body  text-center">

            <form action ="../Controller/authen.php" method="post">

              <h2 class="fw-bold mb-2 text-uppercase">Connexion</h2>
              <p class="text-white-50 ">Entrer votre Email et votre mot de passe </p>

              <div class="form-outline form-white ">
                <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg" />
                <label class="form-label" name ="email" for="typeEmailX">Email</label>
              </div>

              <div class="form-outline form-white ">
                <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg mt-3" />
                <label class="form-label" for="typePasswordX">Mot de passe</label>
              </div>

                <?php 
                  if(isset($_GET['error'])){
                    echo '<div  id="ale" class="alert alert-danger" role="alert">
                      <strong>Erreur!</strong>'.$_GET['error'].'
                    </div>';
                  }
                ?>
              <button class="btn btn-outline-light btn-lg " type="submit">Connecter-vous?</button>

        

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
<script>
  $(document).ready(function(){
    $("#ale").fadeTo(3000, 500).slideUp(1000, function(){
      $("#ale").slideUp(1000);
    });
  });
</script>
</html>