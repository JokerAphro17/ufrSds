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
    <nav class="navbar row">
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
              class="d-inline-block align-text-top"
            />Gestionnaire UFR/SDS
          </h1>
        </a>
      </div>
    </nav>
    <div class="row justify-content-between">
      <div class="col-md-4">
        <h1>Liste des Etudiants</h1>
      </div>
      <div class="col-md-2">
        <a class="btn btn-primary" href="inscription.html">
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
            echo " <button
              class='btn btn-warning text-light'
              data-bs-target='#voir'
              data-bs-toggle='modal'
              alt='infos du tuteur'
            >
              <i class='fa-solid fa-eye'></i>
            </button>
            <button
              class='btn btn-success'
              data-bs-target='#modification'
              data-bs-toggle='modal'
            >
              <i class='fa-solid fa-edit'></i>
            </button> 
            
            <button
              class='btn btn-danger'
              data-bs-toggle='modal'
              data-bs-target='#supprimer$i'
            >
              <i class='fa-solid fa-trash'>
                
              </i>
            </button>
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
    <?php $i=1;
              $req = $bdd->query('SELECT * FROM Etudiant');

              $req2 = $bdd->query('SELECT * FROM Tuteur');
              
    while($result = $req->fetch()){
     echo"
    <div
      class='modal fade'
      id='supprimer$i'
      data-bs-backdrop='static'
      data-bs-keyboard='false'
      tabindex='-1'
      aria-labelledby='staticBackdropLabel'
      aria-hidden='true'
    >
    <div class='modal-dialog'>
        <div class='modal-content border border-3 border-danger'>
          <div class='modal-header'>
            <h5 class='modal-title' id='staticBackdropLabel'>
              SUPPRESSION [$result[nom] $result[prenom]]
            </h5>
            <button
              type='button'
              class='btn-close'
              data-bs-dismiss='modal'
              aria-label='Close'
            ></button>
          </div>
          <div class='modal-body'>
            Voulez-vous vraiment supprimer cet etudiant ?
          </div>
          <div class='modal-footer'>
            <button
              type='button'
              class='btn btn-secondary'
              data-bs-dismiss='modal'
            >
              Annuler
            </button>
            <a href='../Controller/controlList.php?id=$result[numero]' class='btn btn-danger'>Supprimer</a>
          </div>
        </div>
      </div>
    </div>
    <!--fin  Modal  suppresion-->
    <!-- Modal modification -->
    <div
      class='modal fade'
      id='modification'
      data-bs-backdrop='static'
      data-bs-keyboard='false'
      tabindex='-1'
      aria-labelledby='staticBackdropLabel'
      aria-hidden='true'
    >
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='staticBackdropLabel1'>Modification d\'infos</h5>
            <button
              type='button'
              class='btn-close'
              data-bs-dismiss='modal'
              aria-label='Close'
            ></button>
          </div>
          <div class='modal-body'>
            <form action='controller/update.php' method='POST'>
            <div class='form-group mb-2'>
                  <input
                    type='text'
                    class='form-control'
                    name='nom'
                    id='exampleInputEmail1'
                    aria-describedby='emailHelp'
                    placeholder='Nom'
                  />
                </div>
                <div class='form-group mb-2'>
                  <input
                    type='text'
                    class='form-control'
                    name='prenom'
                    id='exampleInputEmail1'
                    aria-describedby='emailHelp'
                    placeholder='Prenom'
                  />
                </div>
                <div class='form-group mb-2'>
                  <input
                    type='date'
                    class='form-control'
                    name='date_n'
                    id='exampleInputEmail1'
                    aria-describedby='emailHelp'
                    placeholder='Date de naissance'
                  />
                </div>

                <div class='form-group mb-2'>
                  <input
                    type='email'
                    class='form-control'
                    name='email'
                    id='exampleInputEmail1'
                    aria-describedby='emailHelp'
                    placeholder='Email'
                  />
                </div>
                <div class='form-group mb-2'>
                  <input
                    type='text'
                    class='form-control'
                    name='telephone'
                    id='exampleInputEmail1'
                    aria-describedby='emailHelp'
                    placeholder='Telephone'
                  />
                </div>
          </div>
          <div class='modal-footer'>
            <button
              type='button'
              class='btn btn-secondary'
              data-bs-dismiss='modal'
            >
              fermé 
            </button>
            <button type='submit' class='btn btn-primary'>Enregistrer</button>
          </div>
          </form>
        </div>
      </div>
    </div>  
    <!--fin  Modal modification-->
    <!-- Modal voir -->
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
      class='modal fade'
      id='voir'
      tabindex='-1'
      aria-labelledby='exampleModalLabel'
      aria-hidden='true'
    >
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLabel'>
              $result[nom] $result[prenom]
            </h5>
            <button
              type='button'
              class='btn-close'
              data-bs-dismiss='modal'
              aria-label='Close'
            ></button>
          </div>
          <div class='modal-body'>";
          while($result2 = $req2->fetch()){
            if ($result['idTuteur']==$result2['numero'])
            echo"
            <h5>TUTEUR: $result2[nom] $result2[prenom]</h5>
            <h5>email:$result2[email]</h5>
            <h5>TELEPHONE : $result2[numero]</h5>
          </div>";
          else echo' h3>Aucun tuteur</h3>';
          }
          $req2->closeCursor();
          echo "
          <div class='modal-footer'>
            <button
              type='button'
              class='btn btn-secondary'
              data-bs-dismiss='modal'
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>";
    $i++;
    }
    ?>  



    
    <!--fin  Modal voir-->
  </body>
  <script>
    $(document).ready(function () {
      $("#myTable").DataTable();
    });
  </script>
</html>