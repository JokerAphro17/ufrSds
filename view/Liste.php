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
    <?php if (isset($_GET['succes'])) { 
      echo "<div id = 'alert' class='alert alert-success text-center'>
      <strong>Succes!</strong> $_GET[succes]
      </div>";
    }
    ?>
    <div class="row justify-content-between">
      <div class="col-md-4">
        <h1>Liste des Etudiants</h1>
      </div>
      <div class="col-md-2">
        <a class="btn btn-primary" href="enregistrement.php">
          <i class="fas fa-plus"></i> Ajouter
        </a>
      </div>
    </div>
    <table
      id="myTable"
      class="table table-striped table-bordered"
      style="width: 100%"
    >
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Date_N</th>
          <th>Email</th>
          <th>Telephone</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        
          <?php 
          include ('../Controller/con_conf.php');
          $req = $bdd->query('SELECT * FROM Etudiant');
          $i=1;
          $nb_rows = $req->rowCount();
          while($result = $req->fetch()){
            echo "<tr>";
            echo "<td>".$result['nom']."</td>";
            echo "<td>".$result['prenom']."</td>";
            echo "<td>".$result['date_naiss']."</td>";
            echo "<td>".$result['email']."</td>";
            echo "<td>".$result['numero']."</td>";
            echo "<td>";
            echo " <a href='../view/info.php?id=$result[numero]'
              class='btn btn-warning text-light'
              
              alt='infos du tuteur'
            >
              <i class='fa-solid fa-eye'></i>
            </a>
            <a href='../Controller/update.php?id=$result[numero]'
              class='btn btn-success'
            
            >
              <i class='fa-solid fa-edit'></i>
            </a> 
            
            <a id=sup$i href='../Controller/delete.php?id=$result[numero]'
              class=' btn btn-danger'

            >
              <i class='fa-solid fa-trash'>
              </i>
            </a>
          </td>";
        $i++;}
         $req->closeCursor();
          
          ?>
       </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Date Naiss</th>
          <th>Email</th>
          <th>Telephone</th>
          <th>Action</th>
          </tr>
        </tfoot>
    </table>
    <!-- Button trigger modal -->

    <!-- Modal  suppresion-->
    
    
    <!--fin  Modal voir-->
  </body>
  <script>
    <?php 
    $a=1;
    for($a=1; $a<$i; $a++){
      echo "
    $('#sup$a').on('click', function(e) {
      e.preventDefault();
      var $"."this = $(this);
      var url = $"."this.attr('href');
      var choice = confirm('Voulez-vous vraiment supprimer cet Etudiant?');
      if (choice) {
        window.location.href = url;
      }
    });
    ";
  }
    ?>
    $(document).ready(function () {
      $("#myTable").DataTable();
    });
    $('#alert').delay(2000).fadeOut('slow');  
  </script>
</html>