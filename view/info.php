<?php 
session_start();
if(!isset($_SESSION['verify'])){
    header('Location: ../view/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../assets/bootstrap5/css/bootstrap.min.css" />
    <script src="../assets/bootstrap5/js/bootstrap.min.js" defer></script>
    <link rel="stylesheet" href="../assets/jquery.dataTables.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="../assets/jquery.dataTables.min.js" defer></script>
    <script src="../assets/jquery-3.6.0.min.js"></script>
    <title>Gestionnaire UFR/SDS</title>
  </head>
  <body class="container">
  <nav class="navbar row text-center bg-light h-10 mb-4">
      <div class="col-10">
        <a class="navbar-brand d-inline" href="#">
          <h1 
            class=" text-success bg-light "
            style="font-size: 3.5rem"
          >
            <img
              src="../assets/img/logo.png"
              alt=""
              style="height: 5rem"
              class="d-inline-block align-text-top"
            />Gestionnaire UFR/SDS

          </h1>
        </a>
      </div>
      <div class="col-1 bg-light">
        <a href="../Controller/logout.php" class="btn btn-danger">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </div>
    </nav>
<?php 
 include "../Controller/con_conf.php";
    $id = $_GET['id'];
    // use PDO to select inner join on table etudiant and table ufr
    $sql = "SELECT * FROM Etudiant INNER JOIN Tuteur ON Etudiant.idTuteur = Tuteur.numero WHERE Etudiant.numero = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$id]);
    $etudiant = $stmt->fetch();
    if($etudiant){
        echo " 
        <div class='form bg-light col-md-6 p-3 offset-3'>
        <h2 class='text-center text-success'>INFO COMPLET DE L'ETUDIANT</h2>
        <form action='../Controller/update.php' method='POST'>
        <input type='hidden' name='id' value='$id'>
        <div class='form-group'>
        <label for='nom'>Nom</label>
        <input type='text' name='nom' id='nom' class='form-control'  disabled='disabled' value='$etudiant[0]' required>
        </div>
        <div class='form-group'>
        <label for='prenom'>Prénom</label>
        <input type='text' name='prenom' id='prenom' class='form-control'  disabled='disabled' value='$etudiant[1]' required>
        </div>
        <div class='form-group'>
        <label for='ddn'>Date de naissance</label>
        <input type='date' name='ddn' id='ddn' class='form-control'  disabled='disabled' value='$etudiant[2]' required>
        </div>
        <div class='form-group'>
        <label for='telephone'>Email</label>
        <input type='email' name='email' id='email' class='form-control'  disabled='disabled' value='$etudiant[3]' required>
        </div>
        <div class='form-group'>
        <label for='adresse'>Numero</label>
        <input type='text' name='numero' id='adresse'  disabled='disabled' class='form-control' value='$etudiant[4]' required>
        </div>
        <div class='form-group'>
        <label for='nom'>Nom Tuteur</label>
        <input type='text' name='nomTuteur'  disabled='disabled' id='nom' class='form-control' value='$etudiant[nom]' required>
        </div>
        <div class='form-group'>
        <label for='prenom'>Prénom Tuteur</label>
        <input type='text' name='prenomTuteur'  disabled='disabled'  id='prenom' class='form-control' value='$etudiant[prenom]' required>
        </div>
        <div class='form-group'>
        <label for='ddn'>Email du Tuteur</label>
        <input type='email' name='ddnTuteur'  disabled='disabled'  id='ddn' class='form-control' value='$etudiant[email]' required>
        </div>
        <div class='form-group'>
        <label for='telephone'>Téléphone du tuteur</label>
        <input type='text' name='telephoneTuteur'  disabled='disabled id='telephone' class='form-control' value='$etudiant[numero]' required>
        </div> 
        <div class='form-group justify-content-center'>
        <a  href='Liste.php' class='btn btn-secondary' > retour</a>
        </div>
        </form>";

    }
    else {
      // select all from table etudiant
      $sql = "SELECT * FROM Etudiant where numero = ?";
      $stmt = $bdd->prepare($sql);
      $stmt->execute([$id]);
      $etudiant = $stmt->fetch();
      if($etudiant){
        echo " 
        <div class='form bg-light col-md-6 p-3 offset-3'>
        <h2 class='text-center text-success'>INFO COMPLET DE L'ETUDIANT</h2>
        <form action='../Controller/update.php' method='POST'>
        <input type='hidden' name='id' value='$id'>
        <div class='form-group'>
        <label for='nom'>Nom</label>
        <input type='text' name='nom' id='nom' class='form-control'  disabled='disabled' value='$etudiant[0]' required>
        </div>
        <div class='form-group'>
        <label for='prenom'>Prénom</label>
        <input type='text' name='prenom' id='prenom'  disabled='disabled' class='form-control' value='$etudiant[1]' required>
        </div>
        <div class='form-group'>
        <label for='ddn'>Date de naissance</label>
        <input type='date' name='ddn' id='ddn' class='form-control'  disabled='disabled' value='$etudiant[2]' required>
        </div>
        <div class='form-group'>
        <label for='telephone'>Email</label>
        <input type='email' name='email' id='email'  disabled='disabled' class='form-control' value='$etudiant[3]' required>
        </div>
        <div class='form-group'>
        <label for='adresse'>Numero</label>
        <input type='text' name='numero' id='adresse'  disabled='disabled' class='form-control' value='$etudiant[4]' required>
        </div>
        <a  href='Liste.php' class='btn btn-secondary' > retour</a>
        ";

      }
    }
?>